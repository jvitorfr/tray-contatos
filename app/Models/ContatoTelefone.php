<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContatoTelefone extends Model {


    protected $table = 'tray01_contatotelefone';
    public $timestamps = false;

    protected $fillable = ['numero', 'idContato', 'idTipoTelefone'];

    public function tipo(){
        return $this->belongsTo('App\Models\TipoTelefone', 'idTipoTelefone' );
    }

    public function contatos(){
        return $this->belongsTo('App\Models\Contato');
    }

}
