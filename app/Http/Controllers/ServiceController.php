<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{AssetManagement,Commercial,Holiday_Homes,Service};


class ServiceController extends Controller
{
    public function getAsset(){
        $assets =  Service::where('category', 1)
        ->get();
        $services =$services = Service::where('category', 7)->get();
      return view('frontend.services.asset',compact('assets','services'));
    }

    public function getHolidayHomes(){
        $assets = Service::where('category', 2)
        ->get();
        $services = Service::where('category',7)->get();
        return view('frontend.services.holidayHomes',compact('assets','services'));
    }

    public function getCommercial(){
               $assets = service::where('category', 3)
               ->get();
        return view('frontend.services.commercial',compact('assets'));
    }

    public function investAdvisory(){
        $services = Service::where('category', 4)
        ->get();
        return view('frontend.services.InvestAdvisory',compact('services'));
    }

    public function conveyance(){
        $services = Service::where('category', 5)
        ->get();
        return view('frontend.services.conveyance',compact('services'));
    }

    public function valuation(){
        $services = Service::where('category', 6)
        ->get();
        return view('frontend.services.propertyValuation',compact('services'));
    }


}
