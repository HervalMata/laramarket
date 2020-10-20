<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laços da Cris - Admin</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Laços da Cris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                    <a class="nav-link" href="{{route('admin.orders.my')}}">Meus Pedidos </a>
                </li>
                <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                    <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                    <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                </li>
                <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                    <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{route('admin.notifications.index')}}" class="nav-link">
                        <span class="badge badge-danger">{{auth()->user()->unreadNotifications->count()}}</span>
                        <i class="fa fa-bell"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                    <form action="{{route('logout')}}" class="logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
    </div>
    @endauth
    </div>
</nav>
<div class="container">
    @include('flash::message')
    @yield('content')
</div>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>
