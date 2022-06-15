<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestMixController extends Controller
{
    public function index(){
        Log::channel('slack')->info('Hello');
        Log::channel('slack')->info('Something happened!');
        return view('test');
    }
}
