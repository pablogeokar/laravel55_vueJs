@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <!-- Componente PAINEL -->    
    <painel titulo="Lista de Artigos"> 
        <modallink tipo="button" nome="teste" titulo="Criar" css="btn btn-success"></modallink>               
        <breadcrumbs v-bind:lista="{{$listaBreadcrumbs}}"></breadcrumbs>
        <tabela-lista 
            v-bind:titulos="['#','Título','Descrição']"
            v-bind:itens="[['1','PHP OO','Curso de PHP OO'],['2','VueJS','Curso de VueJs']]"
            ordem="asc" ordemcol="0"
            criar="#criar"
            detalhe="#detalhe"
            editar="#editar"
            deletar="#deletar"
            token="123456789123"
        ></tabela-lista>     
    </painel> 
</pagina>
<modal nome="teste">    
        <painel titulo="Cadastro de Artigos">
        <formulario css="" action="#" method="post" enctype="" token="1234567">
             <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
        </formulario>
        </painel>
</modal>
@endsection
