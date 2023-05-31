@extends('resumenTabla')

@section('contenidoEspacioResumen')
  Resumen de productos en Carrito.  
@endsection

@section('espacioResumen')
  {{-- @include('crm.plantillas.espacioResumen') --}}
@endsection


@section('tituloTabla')
    Listado de productos - Artículos: {{ $cantidadEnCarrito }} - Total a abonar: Eur {{ $totales[0]->Totalprice }}
    <form method="POST" action="{{ route('checkout')}}">
      @csrf
      <button type="submit" class="btn btn-sm btn-danger">
          Realizar el pago
      </button>
  </form>
@endsection

@section('tabla')
  
  <thead>
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio total</th>

      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody>
    
    @php($j=0)
    @foreach($Items as $i)
    <tr>
      <td>{{ $i->product_id}} </td>
      <td>{{ $i->quantity }}</td>
      <td>{{ $i->price }}</td>

      <td>
        <form method="POST" action="{{ route('addItem',  ['productId' => $i->product_id])}}">
          @csrf
          <button type="submit" class="btn btn-sm btn-primary">
              Agregar
          </button>
      </form>
      
      </td>
      <td>
        <form method="POST" action="{{ route('removeItem',  ['productId' => $i->product_id])}}">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger">
              Retirar del Carrito
          </button>
      </form>
      </td>
      <td>
        <a href="{{ route('catalog') }}" class="btn btn-block btn-secondary">Seguir Comprando</a>
      </td>                                  
    </tr>
    @endforeach
  </tbody>

@endsection




