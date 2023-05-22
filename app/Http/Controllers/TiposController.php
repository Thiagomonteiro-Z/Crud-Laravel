<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipos;
use App\Models\Produtos;


class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipos::all();
        return view('tipos.index',['tipos'=> $tipos]);
        //return view('tipos.index')->with('Tipos', $tipos);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Tipos::create($input);
        return redirect('tipos')->with('flash_message', 'Adicionado com Sucesso!');  
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipos = Tipos::find($id);
        return view('tipos.show')->with('tipos', $tipos);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos = Tipos::find($id);
        return view('tipos.edit')->with('tipos', $tipos);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipos = Tipos::find($id);
        $input = $request->all();
        $tipos->update($input);
        return redirect('tipos')->with('flash_message', 'Atualizado com Sucesso!');  
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos = Tipos::findOrFail($id);
    
    if ($tipos->produtos->isEmpty()) {
        $tipos->delete();
        return redirect('tipos')->with('flash_message', 'Deletado com Sucesso!'); 
    } else {
        return redirect('tipos')->with('flash_message', 'Não é possível excluir este tipo, pois existem produtos cadastrados com esse Tipo.');
    } 
    }
}


