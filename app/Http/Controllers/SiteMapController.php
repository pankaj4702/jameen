<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Sitemap\Sitemap;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class SiteMapController extends Controller
{
    public function index(){
        $sitemap = Sitemap::create();
        foreach (Route::getRoutes() as $route) {
            $url = URL::to($route->uri);
            $sitemaps =  $sitemap->add($url);
        }
        $sitemaps->writeToFile(public_path('sitemaps/sitemap.xml'));
        $sitemapContent = File::get(public_path('sitemaps/sitemap.xml'));
        return view('sitemap', ['sitemapContent' => $sitemapContent]);
    }
}
