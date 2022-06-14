<?php

namespace App\Http\Controllers\LaravelLearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ChildClass {

    public $str ;
    public function __construct($str)
    {
        $this->str = $str;
    }
    public function sayHi(){
        return "Hi,".$this->str;
    }
}
class ServiceContainerController extends Controller
{
    protected ChildClass $child;


    public function __construct(ChildClass $child)
    {
        $this->child = $child;
    }
    public function index(Request $req){
        dd($req->pathContain('learning'));
        return $this->child->sayHi();

    }
}
