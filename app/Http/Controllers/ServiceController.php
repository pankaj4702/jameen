<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{AssetManagement,Commercial,Holiday_Homes,Service,Faq};


class ServiceController extends Controller
{
    public function getAsset(){
        $assets =  Service::where('category', 1)
        ->get();
        $services =$services = Service::where('category', 7)->get();
        $faqs = Faq::where('service_category', 1)->take(5)->get();
      return view('frontend.services.asset',compact('assets','services','faqs'));
    }

    public function getHolidayHomes(){
        $assets = Service::where('category', 2)
        ->get();
        $services = Service::where('category',7)->get();
        $faqs = Faq::where('service_category', 2)->take(5)->get();
        return view('frontend.services.holidayHomes',compact('assets','services','faqs'));
    }

    public function getCommercial(){
               $assets = service::where('category', 3)->get();
        $faqs = Faq::where('service_category', 3)->take(5)->get();

        return view('frontend.services.commercial',compact('assets','faqs'));
    }

    public function investAdvisory(){
        $services = Service::where('category', 4)
        ->get();
        $faqs = Faq::where('service_category', 4)->take(5)->get();
        return view('frontend.services.InvestAdvisory',compact('services','faqs'));
    }

    public function conveyance(){
        $services = Service::where('category', 5)
        ->get();
        $faqs = Faq::where('service_category', 5)->take(5)->get();
        return view('frontend.services.conveyance',compact('services','faqs'));
    }

    public function valuation(){
        $services = Service::where('category', 6)
        ->get();
        $faqs = Faq::where('service_category', 6)->take(5)->get();
        return view('frontend.services.propertyValuation',compact('services','faqs'));
    }


}
