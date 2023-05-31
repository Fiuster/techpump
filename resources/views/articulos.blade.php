@extends('welcome')

@section('contenido')

LISTADO DE ARTICULOS 
<hr>
<div class="row d-flex justify-content-center ">
    @foreach($products as $p)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Imagen{{ $p->productId}}">
        <div class="card-body">
        <h5 class="font-weight-bold "> {{ $p->name}}</h5>
        <p class="font-italic">Descripción: {{ $p->description}}</p>
        <p class="font-weight-bold"> Eur {{ $p->price}}</p>
        {{-- <form method="post" class="btn btn-primary" action="{{ route('addItem') }}" accept-charset="UTF-8">Agregar a carrito</form>  --}}
        <form method="POST" action="{{ route('addItem',  ['productId' => $p->productId])}}">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">
                Agregar al Carrito
            </button>
        </form>
        <form method="POST" action="{{ route('removeItem',  ['productId' => $p->productId])}}">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">
                Retirar del Carrito
            </button>
        </form>


        
        {{-- <a href="/cart" class="btn btn-primary">Agregar a carrito</a> --}}
        {{-- <a href="/eliminar" class="btn btn-danger">Eliminar de Carrito</a> --}}
        </div>
    </div>

    @endforeach
</div>
@yield('contenido3')

@endsection
