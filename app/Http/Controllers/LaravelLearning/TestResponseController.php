<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestResponseController extends Controller
{
    public function text(Request $req){
        return response('Hello World', 200)->header('Content-Type','text/plain');
    }

    // return response with cookies
    public function withCookies(Request $req){
        return response('Hello World')->cookie(
            'test','cookie',1000
        );
    }
    // return without response instances
    public function withCookiesButResponse(Request $req){
        Cookie::queue('cookie_notRes','Hello',1000);
        return view('test');
    }
    // expire cookies early
    public function expireCookiesEarly(Request $req){
        Cookie::expire('test');
        return view('test');
    }
}
