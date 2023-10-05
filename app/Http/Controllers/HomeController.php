<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\ItensPedido;
use App\Services\Vendas;
use App\Models\Endereco;
use App\Models\User;
use App\Models\Cartao;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = [];

        $listaProdutos = Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }
    public function categoria($idcategoria = 0, Request $request)
    {
        $data = [];
        $listaCategorias = Categoria::all();
        $queryProduto = Produto::limit(12);

        if($idcategoria != 0){
            $queryProduto->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategoria"] = $listaCategorias;
        $data["idcategoria"] = $idcategoria;
        return view('categoria', $data);
    }

    public function adicionarCarrinho($idProduto = 0, Request $request){
        $prod = Produto::find($idProduto);

        if($prod){
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }

        return redirect()->route("home");
    }
    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];

        return view("carrinho", $data);
    }
    
    public function excluirCarrinho($indice, Request $request){
        $carrinho = session('cart', []);
        if (isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        session(["cart" => $carrinho]);
        return redirect()-> route("ver_carrinho");
    }


    public function finalizar(Request $request){

        $prods = session('cart', []);
        $vendaService = new Vendas();
        $result = $vendaService->finalizarVenda($prods, \Auth::user());

        // if($result["status"] == "ok"){ 
        //     $request()->session()->forget("ver_carrinho");
        // }
        session()->forget("cart");
        return redirect()->route("compra_historico");
    }

    public function historico(){
        $data = [];

        $idusuario = \Auth::user()->id;

        $listaPedido = Pedido::where("user_id", $idusuario)
                                ->orderBy("datapedido", "desc")
                                ->get();
        $data["lista"] = $listaPedido;

        return view("compras/historico", $data);
    }
    public function detalhes(Request $request){
        $idpedido = $request->input("idpedido");
        
        $listaItens = ItensPedido::join("produtos", "produtos.id", "=", "itens_pedidos.produto_id")
                            ->where("pedido_id", $idpedido)
                            ->get(['itens_pedidos.*', 'itens_pedidos.valor as valoritem', 'produtos.*']);
        $data = [];

        $data["listaItens"] = $listaItens;
        return view("compras/detalhes", $data);
    }
    public function endereco(Request $request){
        $data = [];
        return view("endereco", $data);
    }
    public function cadastrarEndereco(Request $request){
        $user = Auth::user();
        $endereco = new Endereco;
        
        $endereco-> logradouro = $request->logradouro;
        $endereco-> numero = $request->numero;
        $endereco-> cidade = $request->cidade;
        $endereco-> estado = $request->estado;
        $endereco-> cep = $request->cep;
        $endereco-> complemento = $request->complemento;
        $endereco-> user_id = $user->id;

        $endereco->save();
        
        return redirect()->route('verEnderecos');

    }
    public function verEndereco(){
        $idusuario = \Auth::user()->id;
        $enderecos = Endereco::get();
        $enderecos = Endereco::where("user_id", $idusuario)
                            ->orderBy("logradouro", "desc")
                            ->get();

       return view('verEnderecos', ['enderecos' => $enderecos]);
    }
    public function excluirEndereco($id){
        // $endereco->delete();

        // $data = session('ende', []);
        // $endereco = ['ende' -> $data];

        // if (isset($endereco[$indice])){
        //     unset($endereco[$indice]);
        // }
        // session(["ende" => $endereco]);
        // // return view("verEnderecos", ['enderecos' => $endereco] );
        Endereco::findOrFail($id)->delete();

        return redirect('/enderecos')->with('success', 'Endereço excluido com sucesso!');

    }
    public function cartao(Request $request){
        $data = [];
        return view("cartao", $data);
    }
    public function cadastrarCartao(Request $request){
        $user = Auth::user();
        $cartao = new Cartao;
        
        $cartao-> numero = $request->numero;
        $cartao-> nome = $request->nome;
        $cartao-> Data = $request->Data;
        $cartao-> CVV = $request->CVV;
        $cartao-> user_id = $user->id;

        $cartao->save();
        
        return redirect()->route("verCartoes");

    }
    public function verCartao(){
        $idusuario = \Auth::user()->id;
        $cartoes = Cartao::get();
        $cartoes = Cartao::where("user_id", $idusuario)
                            ->orderBy("numero", "desc")
                            ->get();

       return view('verCartoes', ['cartoes' => $cartoes]);
    }
    public function excluirCartao($id){
        // $endereco->delete();

        // $data = session('ende', []);
        // $endereco = ['ende' -> $data];

        // if (isset($endereco[$indice])){
        //     unset($endereco[$indice]);
        // }
        // session(["ende" => $endereco]);
        // // return view("verEnderecos", ['enderecos' => $endereco] );
        Cartao::findOrFail($id)->delete();

        return redirect('/cartoes')->with('success', 'Cartão excluido com sucesso!');

    }
    public function finalizarPedido(Request $request){
        $idusuario = \Auth::user()->id;
        $enderecos = Endereco::get();
        $enderecos = Endereco::where("user_id", $idusuario)
                            ->orderBy("logradouro", "desc")
                            ->get();
        $cartoes = Cartao::get();
        $cartoes = Cartao::where("user_id", $idusuario)
                    ->orderBy("numero", "desc")
                    ->get();
        $users = User::get();
        $users = User::where("id", $idusuario)
                    ->orderBy("name", "desc")
                    ->get();

        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];

        return view("finalizarPedido", $data, ['enderecos' => $enderecos, 'cartoes' => $cartoes, 'users'=>$users]);
    }
}
