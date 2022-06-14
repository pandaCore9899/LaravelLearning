<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRequest;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(Request $req)
    {
        return view('validation.index');
    }

    public function import(ValidationRequest $req)
    {
        // get validated data 
        $validated = $req->validated();
        dump($validated);
        return "Import";
    }
}
