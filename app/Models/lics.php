<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;

class lics extends Model
{
    use HasFactory, SoftDeletes; 
    protected $fillable = ['id','nu_fase','nu_edital','modalidade','data_abertura','nome_licitador','cnpj_licitador','prioridade','objeto','created_at','updated_at','deleted_at'];
}
