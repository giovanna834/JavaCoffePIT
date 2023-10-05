<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JavaCoffe</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/homePage.css') }}" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      -->

    </head>

    <body>
    <script>
    $(function(){
        $(".infocompra").on('click', function(){

            let id = $(this).attr("data-value")
            $.post('{{ route("compra_detalhes") }}', { idpedido: id }, (result) => {
                $("#conteudopedido").html(result)
            })
        })
    })
</script>
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

        <div class="titulo-pedido">
            <p>Meus pedidos <i class='bx bx-food-menu'></i></p>
        </div>


        <div class="card-carrinho2">
            <div class="card-body-carrinho">
            <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p class="titulo">Data pedido</p>
                        </div>
                        <div class="col">
                            <p class="titulo">Situação</p>
                        </div>
                        <div class="col">
                            <p class="titulo">Visualizar pedido</p>  
                        </div>
                    </div>    
                </div>
                @foreach($lista as $ped)
                <div class="container text-center">
                    <div class="teste">
                    <div class="row">
                        <div class="col">
                        <p>{{ $ped->datapedido->format("d/m/Y H:i") }}</p>
                        </div>
                        <div class="col">
                        <p>{{ $ped->statusDesc() }}</p>
                        </div>
                        <div class="col">
                        <a href="#" class="visualizar infocompra" data-value="{{ $ped->id }}" data-toggle="modal" data-target="#modalcompra">
                                <i class='bx bxs-search-alt-2'></i>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

            <div class="modal fade" id="modalcompra">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detalhes da compra</h5>
                        </div>
                        <div class="modal-body">
                            <div id="conteudopedido"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Footer-->
            <footer class="footer">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        

    </body>
</html>