<x-mail::message>
    # Pedido Completado
    
    ¡¡Tu Pedido {{$id_unique}}se ha completado. En breves, lo recibiras.

    Pago: {{$payment_method}}
    @foreach($products as $product){
    <ul>
    Productos:
    <li> Nombre: {{$product->size}};</li>
    @endforeach
}
    </ul>
  


    Precio: {{$total_price}} €

    Thanks, Prueba
    
 </x-mail::message>

Copyright{{date('Y')}}

