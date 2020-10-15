@extends('layouts.app')
@section('content')
    <h1>Atualizar Loja</h1>
    <form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="{{$store->name}}">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea rows="10" cols="20" name="description" class="form-control">"{{$store->description}}"</textarea>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
        </div>
        <div class="form-group">
            <label>Celular/Whatsapp</label>
            <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{$store->slug}}">
        </div>
        <div>
            <button class="btn btn-lg btn-success" type="submit">Atualizar Loja</button>
        </div>
    </form>
@endsection
