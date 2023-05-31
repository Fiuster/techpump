<?php

namespace App\Infrastructure\Controllers;

use App\Application\Ports\ICatalogService;
use App\Application\Queries\GetAllProductsQuery;
use App\Infrastructure\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{

    private ICatalogService $catalogService;

    public function __construct(ICatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }

    public function list(Request $request)
    {
        $getAllProductsQuery = new GetAllProductsQuery(0);
        $products = $this->catalogService->getAllProducts($getAllProductsQuery);

        if(Auth::check())
            $cantidadEnCarrito = CartItem::where('cart_id','=',auth()->user()->id)->count();
        else $cantidadEnCarrito = 0;

        return view('articulos', compact('products', 'cantidadEnCarrito'));
        //return response()->json($products, 200);
    }
}
