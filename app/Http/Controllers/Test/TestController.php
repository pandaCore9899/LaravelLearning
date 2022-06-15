<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use {{ namespacedModel}};

class TestController extends Controller
{
    protected $model = {{model}};

    public function index(Request $req){
    }
}
