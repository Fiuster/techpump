<?php

namespace App\Infrastructure\Controllers;

use App\Application\Ports\ICartService;
use App\Infrastructure\Models\Cart;
use App\Infrastructure\Models\CartItem;
use App\Infrastructure\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    private ICartService $cartService;

    public function __construct(ICartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addItem(Request $request)
    {
        $product = Product::find($request->productId);
        
        $item = new CartItem();
        $item->product_id =     $product->id;
        $item->price =          $product->price;
        $item->quantity =       1;
        $item->cart_id =        auth()->user()->id;
        $item->save();


        return redirect()->route('catalog')
            ->with('mensaje','Item cargado al carrito correctamente!')
            ->with('exito',"Producto Nro $product->id cargado correctamente");
    }

    public function removeItem(Request $request)
    {
      
        $ItemABorrar = CartItem::where('product_id','=', $request->productId)
                                ->where('cart_id','=',auth()->user()->id)
                                ->first();
        if($ItemABorrar)
        {
            $ItemABorrar->delete();
            return redirect()->route('catalog')
                ->with('mensaje','Item descargado del carrito correctamente!')
                ->with('exito',"Producto Nro $request->productId descargado correctamente");
                
        }    
            
        return redirect()->route('catalog')
            ->with('mensaje','No se encontraba el Item en el carrito')
            ->with('danger',"El producto Nro $request->productId no se encuentra en carrito");

    }

    public function detail()
    {
      
        $user = auth()->user()->id;
          
        $sql="SELECT product_id, sum(quantity) as quantity, sum(price) as price 
        FROM `cart_items` WHERE cart_id = ";
        $sql.=$user;
        $sql.=" GROUP BY product_id";

        $Items = DB::select($sql); 

        $sql="SELECT sum(quantity) as totalQuantity, sum(price) as Totalprice 
        FROM `cart_items` WHERE cart_id = ";
        $sql.=$user;
        
        $totales = DB::select($sql);

                  
        if(Auth::check())
        $cantidadEnCarrito = CartItem::where('cart_id','=',auth()->user()->id)->count();
        else $cantidadEnCarrito = 0;

        return view('listar', compact('Items', 'cantidadEnCarrito','totales'));
    }

    public function checkout()
    {

        $order = CartItem::where('cart_id','=',auth()->user()->id)
                                ->get();
        

            //push order ....

            //Elimino articulos del carrito
            $i=0;
            foreach($order as $o){
                $o->delete();
                $i++;
            }
            if($i){
                return redirect()->route('catalog')
                    ->with('mensaje','La orden fue generada correctamente!')
                    ->with('exito',"Orden generada correctamente!  Gracias por su compra!!!");

            }
            else{

                return redirect()->route('catalog')
                    ->with('mensaje','No se encontraron artículos en el carrito')
                    ->with('danger',"No se encontraron artículos en el carrito");
            }
                
            
    }


}
