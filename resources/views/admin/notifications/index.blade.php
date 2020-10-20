@extends('layouts.app')
@section('content')
    <div class="col-12">
        <a href="{{route('admin.notifications.read.all')}}" class="btn btn-sm btn-success float-right">Marcar Todas como
            lidas</a>
        <hr>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Notificação</th>
            <th>Criada em</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @forelse($unreadNotifications as $n)
            <tr>
                <td>{{gettype($n->data['message'])}}</td>
                <td>{{$n->created_at->locale('pt')->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.notifications.read', ['notification' => $n->id])}}"
                           class="btn btn-sm btn-warning">Marcar como lida</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">
                    <div class="alert alert-warning">Nenhuma notificação encontrad.</div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection
