<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral' ]);
        $cat->save();

        $prod = new \App\Models\Produto(['nome' => 'Café preto', 'valor' => 5, 'foto' => 'imagens/cafe-preto.jpg', 'categoria_id' => $cat->id]); 
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome' => 'Brigadeiro', 'valor' => 4, 'foto' => 'imagens/brigadeiro.jpg', 'categoria_id' => $cat->id]); 
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome' => 'Latte', 'valor' => 8, 'foto' => 'imagens/latte.jpg', 'categoria_id' => $cat->id]); 
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'Bolo de chocolate', 'valor' => 7, 'foto' => 'imagens/bolo.jpg', 'categoria_id' => $cat->id]); 
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome' => 'Frappe caramelo', 'valor' => 13, 'foto' => 'imagens/frappe.jpg', 'categoria_id' => $cat->id]); 
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome' => 'Donut', 'valor' => 10, 'foto' => 'imagens/donut.jpg', 'categoria_id' => $cat->id]); 
        $prod6->save();

        $prod7 = new \App\Models\Produto(['nome' => 'Capuccino', 'valor' => 9, 'foto' => 'imagens/capuccino.jpg', 'categoria_id' => $cat->id]); 
        $prod7->save();

        $prod8 = new \App\Models\Produto(['nome' => 'Pão de queijo', 'valor' => 5, 'foto' => 'imagens/pao-queijo.jpg', 'categoria_id' => $cat->id]); 
        $prod8->save();

        $prod9 = new \App\Models\Produto(['nome' => 'Croissant', 'valor' => 12, 'foto' => 'imagens/croissant.jpg', 'categoria_id' => $cat->id]); 
        $prod9->save();

        $prod10 = new \App\Models\Produto(['nome' => 'Milk shake morango', 'valor' => 15, 'foto' => 'imagens/milkshake.jpg', 'categoria_id' => $cat->id]); 
        $prod10->save();

        $prod11 = new \App\Models\Produto(['nome' => 'Coxinha', 'valor' => 6, 'foto' => 'imagens/coxinha.jpg', 'categoria_id' => $cat->id]); 
        $prod11->save();

        $prod12 = new \App\Models\Produto(['nome' => 'Empadinha', 'valor' => 5, 'foto' => 'imagens/empada.jpg', 'categoria_id' => $cat->id]); 
        $prod12->save();
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
