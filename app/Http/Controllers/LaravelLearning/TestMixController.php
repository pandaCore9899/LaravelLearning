<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestMixController extends Controller
{
    public function index(){
        return view('test');
    }
}
