<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItensEstoque extends Model
{
    protected $table = 'itensestoque';

    protected $fillable = [
    
    'Nome', 
    'Categoria', 
    'Preco', 
    'Descricao', 
    'Quantidade'
];
   
}
