<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Categoria;
use App\Produto;

class ControladorCategoria extends Controller
{

    public function index()
    {
        $cats = Categoria::all();
        
        return view('categorias', compact('cats'));
    }


    public function create()
    {
        return view('novacategoria');
    }


    public function store(Request $request)
    {
        $insert = Validator::make($request->all(), [
                        'nomeCategoria' => 'required', ]);

                if($insert->fails()){
                    return redirect('/categorias/novo')->with('alert', 'Favor, preecher o campo obrigatorio, antes de SALVAR!');
                }else{
                    $cat = new Categoria();
                    $cat->nome = $request->input('nomeCategoria');
                    $cat->save();

                    return redirect('/categorias');
                     }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cat = Categoria::find($id);
        if(isset($cat)) {
            return view('editarcategoria', compact('cat'));
        }
        return redirect('/categorias');
    }


    public function update(Request $request, $id)
    {
        $insert = Validator::make($request->all(), [
                        'nomeCategoria' => 'required' ]);

                if($insert->fails()){
                    return redirect('/categorias/editar/'.$id)->with('alert', 'Favor, preecher o campo obrigatorio, antes de SALVAR!');
                }else{
                    $cat = Categoria::find($id);
                    $cat->nome = $request->input('nomeCategoria');

                    $cat->save();

                    return redirect('/categorias');
                     }

        
    }


    public function destroy($id)
    {
        $cat = Categoria::find($id);

        if (isset($cat)) {
            try {

            $cat->delete();

            } catch (\Exception $e) {

               return redirect('/categorias')->with('alert', 'Favor, excluir primeiro o produto com esta categoria!');
            }
        }

        return  redirect('/categorias');
    }
}































