@extends('layout')

    @section('title', 'Listado de productos')

    @section('container')
            
        <h1> Listado de Producto {{ $id }}  </h1>
        <ul class="product">
            <li> SKU del producto: {{ $sku }} </li>
            <li> Tamaño: {{ $size }} </li>
            <li> Activo: {{ $active }} </li>
        </ul>

 @endsection