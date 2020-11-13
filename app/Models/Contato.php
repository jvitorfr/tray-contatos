<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

    protected $table = 'tray01_contatos';
    public $timestamps = false;

    protected $fillable = ['nome', 'email', 'linkedin', 'facebook'];

    public function contatoTelefones(){
        return $this->hasMany('App\Models\ContatoTelefone');
    }
}
