<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipos;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    //protected $tipos;

    public function __construct()
    {
    // $this->tipos = Tipos::with('produtos')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $produtos = Produtos::with('getTipo')->get();
         $tipos = Tipos::all();
         return view('produtos.index',['produtos'=> $produtos, 'tipos'=> $tipos]);
             
     }
    
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */

      public function create()
    {
        $tipos = Tipos::all();
        return view('produtos.create', compact('tipos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ProdutosRequest $request)
    {
        $input = $request->all();
        Produtos::create($input);
        return redirect()->back()->with('message', 'Produto Adicionado!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $produtos = Produtos::find($id);
        return view('produtos.show')->with('produtos', $produtos);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $produto = Produtos::find($id);
        $result = [
            'produto'=> $produto,
        ]; 
        return json_encode($result);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
         $input = $request->all();
         $id = $input['id'];
         $produtos = Produtos::find($id);
            
        if (empty($input['letra_numero'])) {
            return redirect("produtos/edit/{$id}")->with('message', 'O campo Categoria é obrigatório.');
        }
            
        if (empty($input['nome'])) {
            return redirect("produtos/edit/{$id}")->with('message', 'O campo Nome é obrigatório.');
        }

        if (empty($input['tipos_id'])) {
            return redirect("produtos/edit/{$id}")->with('message', 'O campo Tipo é obrigatório.');
        }

        if (empty($input['preco_compra'])) {
            return redirect("produtos/edit/{$id}")->with('message', 'O campo Preço de compra é obrigatório.');
        }

        if (empty($input['preco_venda'])) {
            return redirect("produtos/edit/{$id}")->with('message', 'O campo Preço Estimado de Venda é obrigatório.');
        }

        if (empty($input['estoque'])) {
            return redirect("produtos/edit/{$id}")->with('message', 'O campo Estoque é obrigatório.');
        }

        $produtos->update($input);
        return redirect('produtos')->with('message', 'Produto Atualizado!');
    }

    public function destroy($id)
    {
        Produtos::destroy($id);
        return redirect('produtos')->with('message','Produto deletado');
    }

    }