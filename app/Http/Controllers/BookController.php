<?php

namespace App\Http\Controllers;

use Illuminate\Http\redirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Models\ModelBook;
use App\Models\User;
use App\Models\Escola;
use App\Models\Municipio;


class BookController extends Controller
{
private $objUser;
private $objBook;
private $objEscola;


public function __construct(){

$this->objUser = new User();
$this->objBook = new ModelBook();
$this->objEscola = new Escola();
}

   public function index()
    {
//
    } 

    public function searchMunicipio(Request $request)
    {  
        $cidades = Municipio::all();  
        $search = Escola::all();  
        $search_municipio = request('search_name');         
       if (!empty( $search_municipio)){
            $search = Escola::where('municipio', 'like', "%$search_municipio%")->get();     
       }   

            return view('index', compact('search', 'cidades'));
    }
}
