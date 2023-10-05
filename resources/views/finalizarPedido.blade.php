<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>JavaCoffe</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/homePage.css') }}" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg">
            <div class="container px-4 px-lg-5">
            <a class="navbar-brand" aria-current="page" href="#!"><img src="{{ asset('imagens/logo2.png') }}" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Sobre nós</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('categoria')}}">Categorias</a></li>
                        

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('verEnderecos') }}"><i class='bx bx-location-plus'></i> Endereço</a>  
                                    <a class="dropdown-item" href="{{ route('compra_historico') }}"><i class='bx bx-food-menu'></i> Pedidos</a>  
                                    <a class="dropdown-item" href="{{ route('verCartoes') }}"><i class='bx bx-wallet' ></i> Pagamento</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class='bx bx-exit' ></i> {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                    </ul>
                        <a class="nav-link" aria-current="page" href="{{ route('ver_carrinho') }}"><i class="bi-cart-fill me-1"></i></a>
                </div>
            </div>
        </nav>
 
 
       


    @foreach($users as $user)
    <div class="row g-0 finalizar-pedido">
        <div class="col-sm-6 col-md-7 coluna-esquerda">
            <div class="coluna1">
                <p class="titulo-finalizar">Dados pessoais</p>
                <form  action="" method="post" class="row g-4">
                @csrf
                <div class="col-md-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="{{$user->name}}">
                </div>
                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" name="celular" placeholder="">
                </div>
                <div class="col-md-12">
                <p class="titulo-finalizar">Forma de pagamento</p>
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02">
                            <option value="1">Dinheiro</option>
                            <option value="2">PIX</option>
                            @foreach($cartoes as $cartao)
                            <option value="3">Cartão - {{$cartao->nome}}  <br>({{$cartao->numero}})</option>
                            @endforeach
                        </select>
                    </div>
                        <a href="{{route('cartao')}}" class="link-cartao">Adicionar cartão</a>
                </div>
                <div class="col-md-12">
                <p class="titulo-finalizar">Endereço</p>
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02">
                        @foreach($enderecos as $endereco)
                        <option value="1">{{$endereco->logradouro}}, {{$endereco->numero}}<br>{{$endereco->cep}}, {{$endereco->cidade}} - {{$endereco->estado}} ({{$endereco->complemento}})</option>
                        @endforeach
                        </select>
                    </div>
                    <a href="{{route('endereco')}}" class="link-cartao">Adicionar endereço</a>
                </div>
                <div class="col-md-12">
                    <p class="titulo-finalizar">Informações de contato</p>
                    <p class="texto-email">{{$user->email}}</p> 
                </div>  
            </div>
        </div>
        </form> 
        <div class="col-6 col-md-4 coluna-direita">
            <div class="coluna2">
            <p class="titulo-finalizar-carrinho">Carrinho</p>
            @if(isset($cart) && count($cart) > 0)
            @php $total = 0; @endphp
            @foreach($cart as $carro)
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset($carro->foto) }}" height="50">
                        </div>
                        <div class="col">
                            {{ $carro->nome }} <br>{{ $carro->valor }}
                        </div>
                    </div>
                </div>
                @php $total += $carro->valor;@endphp
            @endforeach
            <p class="total-carrinho">Total: R${{$total}}</p>
            </div>
            <div>
                <form method="post" action="{{ route('carrinho_finalizar') }}">
                    @csrf
                    <input type="submit" value="Finalizar Compra" class="botao-finalizar-pedido">
                </form>
                @endif
            </div>
            <div>
                <a class="botao-continuar" href="{{ route('home') }}">Continuar comprando</a>
            </div>
        </div>
    </div>
    @endforeach
 <!-- Footer-->
        <footer class="footer">
            <div class="container"><p class="m-0 text-center text-black">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
    </body>
</html>