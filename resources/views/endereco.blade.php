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
        <link href="{{ asset('css/cadastro.css') }}" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
    </head>
    <body>
       

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
   

    <div class="cadastro">
    <form  action="{{route('cadastrar_endereco')}}" method="post" class="row g-4">
        @csrf
  <div class="col-md-10">
    <label for="logradouro" class="form-label">Endereço</label>
    <input type="text" class="form-control" name="logradouro" required>
  </div>
  <div class="col-md-2">
    <label for="numero" class="form-label">Número</label>
    <input type="text" class="form-control" name="numero" required>
  </div>
  <div class="col-6">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" name="cidade" required >
  </div>
  <div class="col-6">
    <label for="estado" class="form-label">Estado</label>
    <input type="text" class="form-control" name="estado" required>
  </div>
  <div class="col-md-10">
    <label for="complemento" class="form-label">Complemento</label>
    <input type="text" class="form-control" name="complemento" required>
  </div>
  <div class="col-md-2">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" name="cep"required >
  </div>
  
  <div class="col-12">
    <button type="submit" class="botao-endereco">Cadastrar</button>
  </div>
</form>
</div>

        <!-- Footer-->
        <footer class="footer">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        

    </body>
</html>