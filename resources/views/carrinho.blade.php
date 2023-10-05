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

        
        @if(isset($cart) && count($cart) > 0)
        <div class="titulo-pedido">
            <p>Meu carrinho <i class='bx bxs-cart' ></i></p>
        </div>
        <div class="card-carrinho">
            <div class="card-body-carrinho">
            <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            
                        </div>
                        <div class="col">
                            <p>Nome</p>
                        </div>
                        <div class="col">
                            <p>Valor</p>
                        </div>
                
                        <div class="col">
                           
                        </div>
                    </div>
                    
                </div>
                @php $total = 0; @endphp
            @foreach($cart as $indice => $p)
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset($p->foto) }}" height="50">
                        </div>
                        <div class="col">
                            {{ $p->nome }}
                        </div>
                        <div class="col">
                            {{ $p->valor }}
                        </div>
                
                        <div class="col">
                            <a href="{{ route('carrinho_excluir', ['indice' => $indice]) }}"><i class='bx bxs-trash-alt'></i></a>
                        </div>
                    </div>
                </div>
                  @php $total += $p->valor;@endphp
                @endforeach
            </div>
        </div>
        <p class="total-carrinho">Total: R${{$total}}</p>
        <a href="{{ route('finalizarPedido') }}" class="carrinho-finalizar">Finalizar pedido</a>
                <a class="botao-continuar" href="{{ route('home') }}">Continuar comprando</a>
      
        @else 
        @php $total = 0; @endphp
    <p class="carrinho-vazio">Seu carrinho está vazio</p>
    <div class="botao-adicionar">
        <a href="{{ route('home') }}">Adicionar produtos</a>
    </div>
    
        
    @endif
        
        <!-- Footer-->
        <footer class="footer">
            <div class="container"><p class="m-0 text-center text-black">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
