<?php

namespace App\Models;


class Cartao extends RModel
{
    protected $table = "cartaos";
    protected $fillable = ['numero', 'nome', 'Data', 'CVV'];
}