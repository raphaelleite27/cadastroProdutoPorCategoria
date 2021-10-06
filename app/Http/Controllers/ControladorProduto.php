<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Produto;
use App\Categoria;

class ControladorProduto extends Controller
{

    public function index()
    {
        $pods = Produto::all();
        $cats = Categoria::all();
        /**return view('produtos', compact('pods'));*/
        return view('produtos')->with('pods', $pods)->with('cats', $cats);

    }

   
        public function create()
        {
            $cats = Categoria::all();
            return view('novoproduto', compact('cats'));
        }

        public function store(Request $request)
        {
            $insert = Validator::make($request->all(), [
                'nomeProduto' => 'required',
                'estoqueProduto' => 'required',
                'valorProduto' => 'required',
                'catProduto' => 'required',

            ]);

            if($insert->fails()){
                return redirect('/produtos/novo')->with('alert', 'Favor, preecher todos os campos obrigatorios, antes de SALVAR!');
            }else{
                $pod = new Produto();
                $pod->nome= $request->input('nomeProduto');
                $pod->estoque = $request->input('estoqueProduto');
                $pod->preco = $request->input('valorProduto');                    
                $pod->categoria_id = $request->input('catProduto');

                $pod->save();

                return redirect('/produtos');
            }
        }


        public function show($id)
        {
            //
        }

        public function edit($id)
        {
            $cats = Categoria::all();
            $pod = Produto::find($id);
           
           if(isset($pod)) {
                return view('editarproduto', compact('pod') , compact('cats'));
           }
           return redirect('/produtos');

        }

     
        public function update(Request $request, $id)
        {
            

              $insert = Validator::make($request->all(), [
                        'nomeProduto' => 'required',
                        'estoqueProduto' => 'required',
                        'valorProduto' => 'required',
                        'catProduto' => 'required',  ]);

                if($insert->fails()){
                    return redirect('/produtos/editar/'.$id)->with('alert', 'Favor, preecher todos os campos obrigatorios, antes de SALVAR!');
                }else{
                    $pod = Produto::find($id);
                    $pod->nome= $request->input('nomeProduto');
                    $pod->estoque = $request->input('estoqueProduto');
                    $pod->preco = $request->input('valorProduto');                    
                    $pod->categoria_id = $request->input('catProduto');

                    $pod->save();

                    return redirect('/produtos');
                     }
        }


        public function destroy($id)
        {
            $pod = Produto::find($id);
            if(isset($pod)){
                $pod->delete();
            }
            return redirect('/produtos');
        }
}
