@extends('layouts.layout')

    @section('title', 'Listado de productos')

    @section('container')
    
    <form action="{{route('product.destroy', [$id])}}" method="POST">
    @csrf
    @method('delete')
            
        <h1> Listado de Producto {{ $id }}  </h1>
        <ul class="product">
            <li> SKU del producto: {{ $sku }} </li>
            <li> Tamaño: {{ $size }} </li>
            <li> Activo: {{ $active }} </li>
        </ul>

        <button type="submit" class="btn btn-primary">Eliminar</button>

    </form>

 @endsection