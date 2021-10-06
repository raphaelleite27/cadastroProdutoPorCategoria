@extends('layout.app', ["current" => "produtos"])

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
        if(exist){
                  alert(msg);
                }
</script>

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/produtos/{{$pod->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome da Produto</label>
                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto" value="{{$pod->nome}}"><br>

                <label for="estoqueProduto">Quantia:</label>
                <input type="text" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="Quantia em Estoque" value="{{$pod->estoque}}"><br>

                <label for="valorProduto">Preço:</label>
                <input type="text" class="form-control" name="valorProduto" id="valorProduto" placeholder="Valor em R$" value="{{$pod->preco}}"><br>

                <label for="catProduto">Categoria:</label>
                
                <select  id="catProduto" name="catProduto" class="form-control" placeholder="Categoria do Produto">
                    
                    @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->nome}}</option>
                    @endforeach
                </select>
                
                <br>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection