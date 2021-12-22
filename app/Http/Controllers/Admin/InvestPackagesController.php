<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Investment_Packages;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class InvestPackagesController extends Controller
{
    public function index(){
        $packages = Investment_Packages::all();

        
        return view('admin.invest.invest-packages',
        ['packages'=>$packages,
        'page_title'=>"Investment Packages"]);
    }

    public function store(Request $req){

       $invest=new Investment_Packages;

       $invest->name=$req['name'];
       $invest->min_amt=$req['min_amt'];
       $invest->max_amt=$req['max_amt'];
       $invest->min_percent=$req['min_percent'];
       $invest->max_percent=$req['max_percent'];
       $invest->compound_duration=$req['compound_duration'];
       $invest->compound_percent=$req['compound_percent'];
       $invest->duration=$req['duration'];
       $invest->info_head_1=$req['info_head_1'];
       $invest->info_detail_1=$req['info_detail_1'];
       $invest->info_head_2=$req['info_head_2'];
       $invest->info_detail_2=$req['info_detail_2'];
       $invest->info_head_3=$req['info_head_3'];
       $invest->info_detail_3=$req['info_detail_3'];
       $invest->info_head_4=$req['info_head_4'];
       $invest->info_detail_4=$req['info_detail_4'];
       $invest->info_head_5=$req['info_head_5'];
       $invest->info_detail_5=$req['info_detail_5'];
       $invest->category_name=$req['category_name'];


       $invest->save();
       $req->session()->flash('success','Package added successfully');
       return  redirect('admin/investment-packages');

    }
    public function update(Request $req, $id){
        $invest=Investment_Packages::findOrFail($id);
        if(!$invest){
            $req->session()->flash('error','Could not find package');
            return  redirect('admin/investment-packages');
        }

        $invest->name=$req['name'];
        $invest->min_amt=$req['min_amt'];
        $invest->max_amt=$req['max_amt'];
        $invest->min_percent=$req['min_percent'];
        $invest->max_percent=$req['max_percent'];
        $invest->compound_duration=$req['compound_duration'];
        $invest->compound_percent=$req['compound_percent'];
        $invest->duration=$req['duration'];
        $invest->info_head_1=$req['info_head_1'];
        $invest->info_detail_1=$req['info_detail_1'];
        $invest->info_head_2=$req['info_head_2'];
        $invest->info_detail_2=$req['info_detail_2'];
        $invest->info_head_3=$req['info_head_3'];
        $invest->info_detail_3=$req['info_detail_3'];
        $invest->info_head_4=$req['info_head_4'];
        $invest->info_detail_4=$req['info_detail_4'];
        $invest->info_head_5=$req['info_head_5'];
        $invest->info_detail_5=$req['info_detail_5'];
        $invest->category_name=$req['category_name'];
        $invest->update();
       $req->session()->flash('success','Package Updated successfully');
       return  redirect('admin/investment-packages');
    }

    public function destroy(Request $request,$id)
    {
        Investment_Packages::destroy($id);
        $request->session()->flash('success','You have deleted a package');
        return  redirect('admin/investment-packages');
    }

}
