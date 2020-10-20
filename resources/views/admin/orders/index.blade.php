@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Pedidos Recebidos</h2>
            <hr>
        </div>
    </div>
    <div class="col-12">
        <div class="accordion" id="accordionExample">
            @forelse($orders as $key => $order)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapse{{$key}}" aria-expanded="true">
                                Pedido nº: {{$order->reference}}
                            </button>
                        </h2>
                    </div>
                    <div class="collapse @if($key == 0) show @endif" id="collapse{{$key}}" aria-labelledby="headingOne"
                         data-parent="accordionExample">
                        <div class="card-body">
                            <ul>
                                @php $items = unserialize($order->items); @endphp
                                @foreach(filterItemsByStoreId($items, auth()->user()->store->id) as $item)
                                    <li>{{$item['name']}} |
                                        R$ {{number_format($item['price'] * $item['amount'], 2, ',', '.')}}</li>
                                    <br>
                                    Quantidade pedida: {{$item['amount']}}
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">Nenhum pedsido recebido!</div>
            @endforelse
        </div>
        <div class="col-12">
            <hr>
            {{$orders->links()}}
        </div>
    </div>
@endsection
