@extends('layouts.app')
@section('content')
    <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-success float-right">Cadastrar Categoria</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}"
                           class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}"
                              method="post">
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
    {{$categories->links()}}
@endsection
