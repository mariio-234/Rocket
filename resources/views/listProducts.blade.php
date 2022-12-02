@extends('layout')

    @section('title', 'Listado de productos')

    @section('container')
            
        <h1> Listado de Productos </h1>
        @foreach( $products as $product )
        <ul class="product">
            <h2> Producto: {{ $product -> id }}  </h2>
            <li> SKU del producto: {{ $product -> sku }} </li>
            <li> Tamaño: {{ $product -> size }} </li>
            <li> Activo: {{ $product -> active }} </li>
        </ul>
    @endforeach

 @endsection