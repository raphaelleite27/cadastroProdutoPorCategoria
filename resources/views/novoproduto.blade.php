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
        <form action="/produtos/novo" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome da Produto:</label>
                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto"><br>

                <label for="estoqueProduto">Quantia:</label>
                <input type="text" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="Quantia em Estoque"><br>

                <label for="valorProduto">Preço:</label>
                <input type="text" class="form-control" name="valorProduto" id="valorProduto" placeholder="Valor em R$"><br>

                <label for="catProduto">Categoria:</label>
                @if(count($cats) > 0)
                <select  id="catProduto" name="catProduto" class="form-control" placeholder="Categoria do Produto">
                    
                    @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->nome}}</option>
                    @endforeach
                </select>
                @endif
                <br>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href="/produtos" class="btn btn-danger btn-sm">Cancel</a>
        </form>
    </div>
</div>

@endsection