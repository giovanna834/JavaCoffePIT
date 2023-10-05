<?php

namespace App\Services;
use Log;
use App\Models\User;
use App\Models\Pedido;
use App\Models\ItensPedido;
 
class Vendas{

    public function finalizarVenda($prods = [], User $user){
        try{
            \DB::beginTransaction();
            $dtHoje = new \DateTime();

            $pedido = new Pedido();

            $pedido->datapedido = $dtHoje->format("Y-m-d H:i:s");
            $pedido->status = "APR";
            $pedido->user_id = $user->id;

            $pedido->save();
            foreach($prods as $p){
                $itens = new ItensPedido();

                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->dt_item = $dtHoje->format("Y-m-d H:i:s");
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }

            \DB::commit();
            return [ 'status' => 'ok', 'message' => 'Venda finalizada com sucesso']; 
        }catch(\Exception $e){
            \DB::rollback();
            Log::error("ERRO:VENDA SERVICE", ['message' => $e->getMessage()]);
            return [ 'status' => 'err', 'message' => 'Venda não pode ser finalizada'];
        }
    }

}