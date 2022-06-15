<?php

namespace App\Http\Controllers;

use App\Trait\Import\TestImport2Importer;
use Illuminate\Http\Request;

class TestImport2 extends Controller
{
    use TestImport2Importer;
    
    
    public function index(Request $req){
    }
}
