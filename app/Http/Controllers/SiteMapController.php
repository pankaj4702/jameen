<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    // public function index(){
    //     $sitemap = Sitemap::create();
    //     foreach (Route::getRoutes() as $route) {
    //         $url = URL::to($route->uri);
    //         $sitemaps =  $sitemap->add($url);
    //     }
    //     $sitemaps->writeToFile(public_path('sitemaps/sitemap.xml'));
    //     $sitemapContent = File::get(public_path('sitemaps/sitemap.xml'));
    //     return view('sitemap', ['sitemapContent' => $sitemapContent]);
    // }
}
