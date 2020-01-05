@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/checkout.css')}}">
@section('content')

<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div class="card" style="background-color:#F8F5F0">
                <div class="card-header" style="background-color:#F8F5F0">
                {{ Auth::user()->name }}, hvala Vam što kupujete kod nas! <br><br> Ukupno za platiti: <strong class="text-success">{{ $total }} KM</strong>
                </div>
            <form action="{{url('/checkout')}}" method="POST" id="payment-form">
                    <div class="card-body" style="background-color:#F8F5F0">
                        <div class="form-row inline">
                            <div class="col">
                                    <br>
                                <input id="name" type="text" class="StripeElement"  name="name" placeholder="Ime" required>
                            </div>
                            <div class="col" style="margin-top:20px">
                                    <br>
                                <input id="email" type="email" class="StripeElement" name="email" placeholder="Email" required>
                            </div>
                        </div>                    
                        <div class="form-rows">
                            <br>
                        <label for="card-element" style="margin-bottom:20px;">
                            Kreditna ili debitna kartica
                        </label>
                        <div id="card-element">
                            <!-- Stripe element ce biti ubacen ovdje. -->
                        </div>
            
                        <!-- Koristi se za prikazivanje errora. -->
                        <div id="card-errors" role="alert">

                        </div>
                    </div>
                <br>
                <hr>
                <button id="card-button" class="btn btn-success">Potvrdi kupovinu</button>
                {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<br>
<br>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection