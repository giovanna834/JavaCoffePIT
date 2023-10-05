
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JavaCoffe</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
         <!-- Styles -->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Responsive navbar-->
        <div class="home">
         @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg ">
            <div class="container px-5">
                <a class="navbar-brand" aria-current="page" href="#!"><img src="{{ asset('imagens/logo2.png') }}" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">Sobre nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="#service">Seviço</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Cadastro</a></li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        @endif
        <br><br><br>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-5">
                    <h1 class="font-weight-light">JavaCoffe</h1>
                    <p>Somos apaixonados por café e sabemos que você também é. Faça seu pedido e permita-nos trazer o encanto da nossa cafeteria para o conforto da sua casa ou escritório.</p>
                    <a class="btn-botao-index" href="#!">Pedir agora</a>
                </div>
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('imagens/cafe-index.jpg') }}" alt="..." /></div>
            </div>
            <br><br><br><br><br><br>
        </div>
        <!-- Call to Action-->
        <div class="teste" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 align-items-center my-5">
                    <div class="col-lg-6"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('imagens/saiba-mais.jpg') }}" alt="..." /></div>
                        <div class="col-lg-6">
                            <span>Sobre nós</span>
                            <h2>Nosso objetivo é tornar seu dia mais especial</h2>
                            <p>Nossa equipe dedicada está pronta para atender aos seus desejos de café, desde o tradicional espresso até as inovações mais deliciosas. Além disso, oferecemos uma variedade de opções de lanches e doces para acompanhar seu café e tornar sua experiência ainda mais prazerosa.</p>
                            <a href="#" class="btn-saiba-mais">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>

            <br><br><br><br>
        <!-- Content Row-->
        <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5" id="service">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('imagens/pedido-index.png') }}" class="card-img-top" alt="...">
                            <h3>Pedido</h3>
                            <p>Aqui temos uma grande variedade de opções para todos os gostos, aproveite a oportunidade e faça seu pedido.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('imagens/entrega-index.png') }}" class="card-img-top" alt="...">
                            <h3>Entrega</h3>
                            <p>Entregamos o seu pedido o mais rápido possível para que ele possa chegar quentinho na sua residência.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('imagens/beber-index.png') }}" class="card-img-top" alt="...">
                            <h3>Aproveite</h3>
                            <p>Receba o seu pedido e aproveite o seu delicioso café feito com muito amor e carinho.</p>                        </div>
                    </div>
                </div>
        </div>
        </div>
        <br><br><br><br>
        <!-- Footer-->
        <footer class="py-5">
            <div class="container px-4 px-lg-5"><img src="{{ asset('imagens/logo2.png') }}" class="logo-footer"></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </div>
    </body>
</html>
