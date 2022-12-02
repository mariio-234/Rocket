@extends('layout')

@section('title', 'Creación de productos')
    
@section('container')

    <form>
    <h1> FORMULARIO DE CREACION DE PRODUCTOS </h1>

    @csrf
        <div class="form-group">
            <label for="nombre">SKU del producto</label>
                <input type="text" class="form-control" id="nombre" placeholder="SKU del producto">
        </div>
        <div class="form-group">
            <label for="size">Talla</label>
                <input type="text" class="form-control" id="size" placeholder="Talla del producto">
        </div>
 
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection