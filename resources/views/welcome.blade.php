@extends('layouts.app')

@section('content')
<div class="container">
    <div class="sticky-top bg-white row justify-content-center">
        <div class=" col-md-12">
 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('exito'))
                    <div class="alert alert-success">
                      <div class=" animate__animated animate__bounceInLeft ">
                        {{ session('exito')}}
                      </div>        
                    </div>
                    @php(Session::forget('exito'))
                  @endif
          
                  @if (session('danger'))
                    <div class="alert alert-danger">
                      <div class=" animate__animated animate__bounceInLeft ">
                        {{ session('danger')}}
                      </div>        
                    </div>
                  @endif
          
                  @if (session('warning'))
                    <div class="alert alert-warning">
                      <div class="  animate__animated animate__bounceInLeft ">
                        {{ session('warning') }}
                        @php(session()->forget('warning'))
                      </div>  
                    </div>
                  @endif

            @auth
                <div class="container row justify-content-center">
                    <div class="col-2 mt-1">
                        Artículos en Carrito: 

                    </div>
                    <h4 class="col-1">
                         {{ $cantidadEnCarrito }}

                    </h4>
                    <div class="col-4 mt-0">

                    <a href="{{ route('detail') }}" class="btn btn-secondary active mt-3">Ver detalle</a>

                    </div>
                </div>
            @endauth
                <hr>

        </div>
    </div>
    @yield('contenido')

</div>

@endsection

