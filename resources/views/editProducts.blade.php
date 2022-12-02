@extends('layout')

    @section('title', 'Edición de productos')
    
@section('container')

    <form>
    <h1> FORMULARIO DE EDICION DE PRODUCTOS </h1>

    @csrf
        <div class="form-group">
            <label for="nombre">SKU del producto</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
        </div>
        <div class="form-group">
            <label for="size">Talla</label>
                <input type="text" class="form-control" id="talla" placeholder="Talla del producto">
        </div>
 
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection