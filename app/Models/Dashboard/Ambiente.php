<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\TipoAmbiente;
use App\Models\Painel\Setore;

class Ambiente extends Model{
    protected $fillable = ['nome', 'capacidade', 'imagem', 'descricao', 'tipo_ambientes_id', 'setores_id'];
    // protected $guarded = [];

    public $rules = [
        'nome'                => 'required|unique:estados,nome,id|min:4|max:20',
        'capacidade'          => 'required',
        'imagem'              => 'max:100',
        'descricao'           => 'required|min:4|max:200',
        'tipo_ambientes_id'   => 'required',
        'setores_id'          => 'required',
    ];

    public $msg = [
        'nome.required'              => 'O campo nome precisa ser preenchido!',
        'nome.unique'                => 'Este nome de estado já está cadastrado no sistema!',
        'nome.min'                   => 'O campo nome deve ter no mínimo 4 caracteres.',
        'nome.max'                   => 'O campo nome deve ter no máximo 20 caracteres.',
        'capacidade.required'        => 'O campo capacidade deve ser preenchido!',
        'imagem.max'                 => 'Imagem muito grande',
        'descricao.required'         => 'O campo descrição deve ser preenchido.',
        'descricao.min'              => 'O campo descrição deve ter no mínimo 4 caracteres',
        'descricao.max'              => 'O campo descrição deve ter no máximo 200 caracteres',
        'tipo_ambientes_id.required' => 'O Tipo do Ambiente deve ser selecionado',
        'setores_id.required'        => 'O Setor em que o ambiente está vinculado deve ser selecionado',
    ];

    public function tipoAmbiente(){
        return $this->belongsTo(TipoAmbiente::class);
    }

    public function setor(){
        return $this->belongsTo(Setore::class);
    }
}
