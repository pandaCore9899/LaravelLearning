<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $req){
        // get uri 
        dump($req->path());
        dump($req->url());
        dump($req->fullUrlWithQuery(['test' => 2]));// ?test = 2
        dump($req->method());
        dump($req->isMethod('GET'));
        //input
        $input = $req->all();
        // get all input as a collection
        $input  = $req->collect();
        // retrive a subset of incoming request as a collection
        // $req->collect('users')->each(function($user){

        // });
        dump($input);
        // retrive an input value
        $test  = $req->input('test');
        $test = $req->get('test');
        dump($test);
        dump($req->has('test'));
        // retriving input frm query string
        $test = $req->query('test');
        dump($test);


        
    }
}
