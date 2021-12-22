<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Carbon\Carbon;

class CreateActivities extends Controller
{
    public function index()
    {
        $startDate = new \DateTime('2019-10-01 2:11 AM');
        $endDate = new \DateTime('2019-10-12 2:11 AM');

        for($date = $startDate; $date <= $endDate; $date->modify('+1 day')){
            //$date->format('Y M d, h:m:s')

            $day= date("D",strtotime(Carbon::parse($date)->toDayDateTimeString()));
            if ($day=="Sat" || $day=="Sun") {
                echo "Has Sat or Sun";
            }else{
                // dd($date->format('D-M-Y H:i:s' ));
                //Save Activity
                $activity=new Activities;
                $activity->title="Daily Earning";
                $activity->user_id=75;
                $activity->user_investments_id=11;
                $activity->investment_packages_id=1;
                $activity->category="earning";
                $activity->date= Carbon::parse($date)->toDayDateTimeString();;
                $activity->amount=415.00;
                $activity->descp="Credited $415.00 interest for  Balanced Growth Fund";
                $activity->save();
            }
        }
        echo "done";
    }
}
