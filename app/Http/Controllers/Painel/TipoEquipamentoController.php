<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\TipoEquipamento;

class TipoEquipamentoController extends Controller{

    private $tipoEquipamento;

    public function __construct(TipoEquipamento $tipoEquipamento){
      $this->tipoEquipamento = $tipoEquipamento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TipoEquipamento $tipo){
        $tipos = $tipo->all();
        return view('painel.tipo-equipamento.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TipoEquipamento $tipo){
        $tipos = $tipo->all();
        return view('painel.tipo-equipamento.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $dataForm = $request->all();

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }

        $this->validate($request, $this->tipoEquipamento->rules, $this->tipoEquipamento->msg);

        $insert = $this->tipoEquipamento->create($dataForm);

        if($insert){
            return redirect('/configuracoes/tipos-equipamentos');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $tipo = $this->tipoEquipamento->find($id);

        return view('painel.tipo-equipamento.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $dataForm = $request->all();

        $tipo = $this->tipoEquipamento->find($id);

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }

        $this->validate($request, $this->tipoEquipamento->rules, $this->tipoEquipamento->msg);

        $update = $tipo->update($dataForm);

        if($update){
          return redirect('/configuracoes/tipos-equipamentos');
        }else{
          return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
