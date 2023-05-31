<?php

namespace App\Http\Controllers;

use App\Infrastructure\Models\Product;
use App\Models\Articulo;
use Database\Seeders\ArticuloSeeder;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('articulos', compact('products'));
    }
    public function art1()
    {
        $products = Product::all();
        return view('articulos', compact('products'));
    }

}
