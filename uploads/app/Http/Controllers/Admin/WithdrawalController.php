<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Models\Investment_Packages;
use App\Models\Withdrawal_Methods;
use App\Models\WithdrawalRequests;
use Mail;
use Carbon\Carbon;
use App\Models\UserInfo;
use App\Mail\UserRegisteredMail;
use App\Models\Activities;
use GuzzleHttp\Client;

class WithdrawalController extends Controller
{
    public function index(){
        $withdrawals = User::join('withdrawal_requests', 'withdrawal_requests.user_id', '=', 'users.id')
        ->join('withdrawal_methods', 'withdrawal_methods.id', '=', 'withdrawal_requests.withdrawal_methods_id')
        ->where('withdrawal_requests.approved',false)
        ->orderBy('withdrawal_requests.id','DESC')
        ->get(['users.name as username','users.email','users.id as user_id','withdrawal_requests.id as request_id', 'withdrawal_methods.name as methodname',
            'withdrawal_methods.currency_code','withdrawal_requests.amount_paid','withdrawal_requests.created_at as date',
            'withdrawal_requests.amount_credited','withdrawal_requests.charge', 'withdrawal_requests.wallet_address', 'withdrawal_requests.wallet_type', 'withdrawal_requests.approved', ]);
        return view('admin.withdrawal.w-request',
        [
        'withdrawals'=>$withdrawals,
        'page_title'=>"Pending Withdrawal"
    ]);
    }


    public function update(Request $req, $id){
        function getWalletType($data)
            {
                switch ($data) {
                    case 'main_wallet':
                        return "Portfolio Balance";
                        break;
                    case 'compound_wallet':
                        return "Compounding Dividends";
                    break;

                }
            }

            $wallet_type=getWalletType($req['wallet_type']);

        try {


                $wRequest=WithdrawalRequests::findOrFail($id);
                $wRequest->approved=true;
                $wRequest->update();

                //Reduce Wallet amount
                $userInfo=UserInfo::where('user_id', $req['user_id'])->firstOrFail();

                if($req['wallet_type']=="main_wallet"){
                    $userInfo->main_wallet= $userInfo->main_wallet - $req['amount_paid'];
                    $userInfo->update();
                }else{
                    if($userInfo->compound_wallet < $req['amount_paid']){
                        $req->session()->flash('error','Amount requested is higher than you compound wallet balance');
                        return  redirect('user/withdrawal-request');
                    }else{
                        $userInfo->compound_wallet=$userInfo->compound_wallet -  $req['amount_paid'];
                        $userInfo->update();
                    }
                }

                $activity=new Activities;
                $activity->title="Withdrawal Approved";
                $activity->user_id=$req['user_id'];
                $activity->category="withdrawals";
                $activity->date=Carbon::now()->toDayDateTimeString();
                $activity->amount=$req['amount_credited'];
                $activity->descp="Your request of {$req['amount_credited']} made from  $wallet_type has been approved ";
                $activity->save();

                $user = DB::table('users')
                ->join('user_infos','users.id',"=", 'user_infos.user_id')
                ->where('users.id',$req['user_id'])
                ->get()->first();

            Mail::to($user->email)->send(new UserRegisteredMail([
                'subject'=>'Withdrawal Successful',
                'title' => "Hi {$user->name} {$user->last_name}",
                'url' => "{$req->getSchemeAndHttpHost()}/user/withdrawal-history",
                'descp' => "You've successfully withdrawn {$req['amount_credited']}{$req['currency_code']} from your  $wallet_type to the Wallet Address....... {$req['wallet_address']} ............  If you don't recognize this activity, please contact us immediately at our customer fulfilment centre. ",
                'action-text'=>'Client Access',
                'img'=>'assets/images/emails/withdrawal-banner.jpg'
            ]));

            $req->session()->flash('success','Withdrawal approved');

            } catch (\Exception $e) {
                //dd($e);
                $req->session()->flash('error','An error occured');
                return  redirect('admin/withdrawal-request');
            }

         return  redirect('admin/withdrawal-request');

    }

    public function destroy(Request $request,$id)
    {
        WithdrawalRequests::destroy($id);
        $request->session()->flash('success','Request deleted!');
        return  redirect('admin/withdrawal-request');
    }

    public function paginate($items, $perPage = 10, $page = null )
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url('admin/users')]);
    }
}
