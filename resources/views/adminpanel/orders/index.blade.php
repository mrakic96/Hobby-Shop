@extends('layouts.adminpanellayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
                  <!-- search -->
{{-- <form action="{{route('adminpanel.users.search')}}" methog="GET" class="search-form">
<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
       <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" name="query" id="query" style="width: 250px;border-radius:8px 0px 0px 8px; margin:0px 0px 0px 205px;" value="{{ request()-> input('query')}}" class="form-control" placeholder="Pretraga">
                    <a href="{{route('search')}}"><button class="btn btn-outline-secondary" style="border-left:0px; margin-bottom:0px; height:54px; border-radius:0px 8px 8px 0px; border-color:#ced4da" value="{{ request()-> input('query')}}"><i class="fas fa-search" style="color:#ced4da"></i></button></a>
                </div>
        </div>
          </div>
    </div>  
</div>
</form> --}}

            <div class="card" style="margin:40px 0px 0px 200px">
                <br>
                <div class="card-header" style="font-size:26px;">Transakcije</div>
                <br>
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID transakcije</th>
                            <th scope="col">Ukupna cijena</th>
                            <th scope="col">Ukupna količina</th>
                            <th scope="col">ID korisnika</th>
                            <th scope="col">Ime kupca</th>
                            <th scope="col">Adresa</th>
                            <th scope="col">Grad</th>
                            @can('delete-users')
                            <th scope="col">Opcije</th>
                            @endcan
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                            <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->billing_total }} KM</td>
                                <td>{{ $order->cart->totalQty }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->billing_name }}</td>
                                <td>{{ $order->billing_address }}</td>
                                <td>{{ $order->billing_city }}</td>
                                <td>
                                    @can('delete-users')
                                    <form action="{{ route('adminpanel.orders.destroy', $order) }}" method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-warning">Izbriši</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-12 d-flex justify-content-center pt4" style="margin-left:270px;">
      {{ $users->links() }}
    </div>
</div> --}}
@endsection
