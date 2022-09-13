<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productsController extends Controller
{
    public function index (){
        $user="user";
        $product =[
            "big tasty",
            "big mac"
        ];
        $age=17;
        $language = request("language");

        return view('shop',['user' => $user, 'product' => $product, 'age'=>$age, 'language' => $language] );
    }

    public function show($product_id){
        return view('/details', ['product_id' => $product_id]);
    }

    public function create(){
        return view('create');
    }

    public function store(){
        //salva datele din formular
        $product = new Product();
        $product -> title = request('title'); //title din baza de date/input
        $product -> description = request('description');
        $product -> price = request('price');

        $product -> save(); //putem salva elementul de mai sus

        return redirect('/shop');

    }
}
