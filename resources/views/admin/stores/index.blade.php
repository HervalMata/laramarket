@extends('layouts.app')
@section('content')
    @if(!$store)
        <a href="{{route('admin.stores.create')}}" class="btn btn-sm btn-success float-right">Cadastrar Loja</a>
    @else
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de Produtos</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}"
                           class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$stores->links()}}
    @endif
@endsection
