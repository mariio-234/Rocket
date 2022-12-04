@extends('layouts.layout')

@section('title', 'Edición de productos')
    
@section('container')

<form action="{{route('product.update', [$id])}}" method="POST">
    @csrf
    @method('PUT')
    <h1> FORMULARIO DE EDICIÓN DE PRODUCTOS </h1>

     @if ($errors->any())
        <ul>
            @foreach ( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

        <div class="form-group">
            <label for="sku">SKU del producto</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU del producto" value={{$sku}}>
        </div>
        <div class="form-group">
            <label for="size">Talla</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="Talla del producto" value={{$size}}>
        </div>

        <div class="form-group">
            <label for="model_id">id del modelo</label>
                <input type="number" class="form-control" id="model_id" name="model_id" placeholder="Identificador del modelo" value={{$model_id}}>
        </div>

        <div class="form-group">
            <label for="active">Activo</label>
                <input type="checkbox" class="form-control" id="active" name="active" value={{$active}}>
        </div>
 
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection