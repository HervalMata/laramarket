@extends('layouts.app')
@section('content')
    <h1>Criar Categoria</h1>
    <form action="{{route('admin.categories.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('name') is-invalid @enderror"
                   value="{{old('description')}}">
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control @error('name') is-invalid @enderror"
                   value="{{old('slug')}}">
            @error('slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <button class="btn btn-lg btn-success" type="submit">Criar Categoria</button>
        </div>
    </form>
@endsection
