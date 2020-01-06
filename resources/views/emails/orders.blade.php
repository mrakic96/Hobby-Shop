@component('mail::message')
# Narudžba primljena

Hvala na vašoj narudžbi.

**ID narudžbe:** {{ $order->id }}

**Email narudžbe:** {{ $order->billing_email }}

**Ime narudžbe:** {{ $order->billing_name }}

**Ukupno:** {{ $order->billing_total }} KM

**Proizvodi**

{{-- @foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: ${{ round($product->price / 100, 2)}} <br>
Quantity: {{ $product->pivot->quantity }} <br>
@endforeach --}}

Možete dobiti više informacija na našoj stranici.

@component('mail::button', ['url' => config('app.url'), 'color' => 'blue'])
Idi na stranicu
@endcomponent

Hvala na vašem povjerenju.

Sve najbolje,<br>
Hobby Shop
@endcomponent