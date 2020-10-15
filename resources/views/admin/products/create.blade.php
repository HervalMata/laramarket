@extends('layouts.app')
@section('content')
    <h1>Criar Produto</h1>
    <form action="{{route('admin.products.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>Conteúdo</label>
            <textarea rows="10" cols="20" name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label>Loja</label>
            <select name="store" class="form-control">
                @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-lg btn-success" type="submit">Criar Produto</button>
        </div>
    </form>
@endsection
