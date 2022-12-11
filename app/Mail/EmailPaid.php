<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartLine;
use App\Models\Product;
use App\Models\TheModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailPaid extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
        $this->cart=Cart::query()->where('order_id', $this->order->id)->get()->first();
        $this->cartLines= CartLine::query()->where('cart_id', $this->cart->id)->get();
        $products=[];
        foreach($this->cartLines as $cartline){
            $product=Product::query()->where('id', $cartline->product_id)->get()->first();
            $product->total_price=$cartline->total_price;
            array_push($products,$product);
        }

        foreach($products as $product){
            $model=TheModel::query()->where('id', $product->the_model_id)->get()->first();
            $product->model=$model;
        }
        $this->products=$products;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Pedido Completado',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'email.Paid',
            with: [
                'id_unique' => $this->order->id_unique,
                'payment_method' => $this->order->payment_method,
                'total_price' => $this->order->total_price,
                'products' => $this->products,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
