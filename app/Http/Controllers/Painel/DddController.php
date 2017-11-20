<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Ddd;

class DddController extends Controller{

    private $ddd;

    public function __construct(Ddd $ddd){
        $this->ddd = $ddd;
    }



    public function index(Ddd $ddd){
        $ddds = $ddd->all();
        return view('painel.ddd.index', compact('ddds'));
    }



    public function create(Ddd $ddd){
        $ddds = $ddd->all();
        return view('painel.ddd.create', compact('ddds'));
    }



    public function store(Request $request){
        $dataForm = $request->all();

        $this->validate($request, $this->ddd->rules, $this->ddd->msg);
        $insert = $this->ddd->create($dataForm);

        if($insert){
            return redirect('/configuracoes/ddds');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){
    }



    public function edit($id){
        $ddd = $this->ddd->find($id);
        return view('painel.ddd.edit', compact('ddd'));
    }



    public function update(Request $request, $id){
        $dataForm = $request->all();
        $ddd = $this->ddd->find($id);

        $this->validate($request, $this->ddd->rules, $this->ddd->msg);
        $update = $ddd->update($dataForm);

        if($update){
          return redirect('/configuracoes/ddds');
        }else{
          return redirect()->back();
        }
    }



    public function destroy($id){
        $ddd = $this->ddd->find($id);

        $delete = $ddd->delete();

        if($delete){
          return redirect()->route('ddds.index');
        }else{
          return redirect()->route('ddds.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
