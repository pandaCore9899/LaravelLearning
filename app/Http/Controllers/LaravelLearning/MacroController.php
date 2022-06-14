<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MacroController extends Controller
{
    public function index(){

    }
    
    public function create(){

    }
    public function store(){

    }

    public function update(){

    }

    public function delete(){

    }

    public function importMethod(){
        return "Import Method";
    }

    public function import(Request $req){
        if($req->method() == 'POST'){
            return $this->importMethod();
        }
        return "Hello";

    }
}
