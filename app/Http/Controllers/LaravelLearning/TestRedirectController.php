<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestRedirectController extends Controller
{
    // global redirect 
    public function global(Request $req){
        return redirect('test/mix');
    }
    // redirect with flash data 
    public function globalWithInput(Request $req){
        return back()->withInput([
            'test' => 'Hello'
        ]);
    }
}
