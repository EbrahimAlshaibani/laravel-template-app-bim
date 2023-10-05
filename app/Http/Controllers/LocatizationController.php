<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocatizationController extends Controller
{
    public function setLang($lang){
        
        
        
        // $url = parse_url(URL::previous());
        // // $url_path = $url['path'];
        // $url['path'][1] = App::getLocale()[0];
        // $url['path'][2] = App::getLocale()[1];
        // $url_res = $url['scheme'] . '://' . $url['host'] . ':' . $url['port'] . $url['path'];
        // $previousUrl = parse_url(URL::previous());
        // $previousUrl['path'][1] = $url['path'][1];
        // $previousUrl['path'][2] = $url['path'][2];

        // dd($previousUrl);
        // return Redirect::to($url);
        App::setLocale($lang);
        Session::put('locale', $lang);
        LaravelLocalization::setLocale($lang);
        $url = LaravelLocalization::getLocalizedURL(App::getLocale(), URL::previous());
        return Redirect::to($url);
    }
}
