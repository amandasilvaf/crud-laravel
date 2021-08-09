<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        // aqui é o /produtos
        return view('produtos');
    }

    public function index(){
        // aqui é o /api/produtos
        $prods = Produto::orderBy('id')->get();
        return $prods->toJson();
        // ou return json_encode($prods); -> são a mesma coisa 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        // dd($request);

        $prod->nome = $request->input('nome');
        $prod->estoque = $request->input('estoque');
        $prod->valor_atual = $request->input('valor_atual');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();
        return json_encode($prod); // ou poderia ser $prod->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)){
            return json_encode($prod);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $prod = Produto::find($id);
        if(isset($prod)){
            $prod->nome = $request->input('nome');
            $prod->estoque = $request->input('estoque');
            $prod->valor_atual = $request->input('valor_atual');
            $prod->categoria_id = $request->input('categoria_id');
            $prod->save();
            return json_encode($prod);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            $prod->delete();
            return response('Ok', 200);
        }
        return response('Produto não encontrado', 404);
            
    }
}
