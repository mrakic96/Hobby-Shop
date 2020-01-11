@component('mail::message')
# Narudžba primljena

Hvala na vašoj narudžbi.

**ID narudžbe:** {{ $order->id }}

**Email narudžbe:** {{ $order->billing_email }}

**Ime narudžbe:** {{ $order->billing_name }}

**Ukupno:** {{ $order->billing_total }} KM

**Proizvodi**

@foreach ($order->cart->items as $item)
Ime: {{ $item['item']['name'] }} <br>
Cijena: {{ $item['price'] }} KM <br>
Količina: {{ $item['qty'] }} <br>
<br>
@endforeach 

Možete dobiti više informacija na našoj stranici.

@component('mail::button', ['url' => 'studenti.sum.ba/projekti/fsre/2019/g16', 'color' => 'blue'])
Idi na stranicu
@endcomponent

Hvala na vašem povjerenju.

Sve najbolje,<br>
Hobby Shop
@endcomponent