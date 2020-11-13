<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class TipoTelefone extends Model {

    public $timestamps = false;
    protected $table = 'tray01_tipotelefone';

    protected $fillable = ['tipo'];

    public function contatosTelefone(){
        return $this->hasMany('App\Models\ContatoTelefone');
    }

}
