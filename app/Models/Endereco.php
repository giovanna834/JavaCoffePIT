<?php

namespace App\Models;


class Endereco extends RModel
{
    protected $table = "enderecos";
    protected $fillable = ['logradouro', 'numero', 'cidade', 'estado', 'cep', 'complemento']; 
}
