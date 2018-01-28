@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <!-- Componente PAINEL -->    
    <painel titulo="Lista de Artigos">         
        <breadcrumbs v-bind:lista="{{$listaBreadcrumbs}}"></breadcrumbs>
        <tabela-lista 
            v-bind:titulos="['#','Título','Descrição']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="asc" ordemcol="0"
            criar="#criar"
            detalhe="#detalhe"
            editar="#editar"
            deletar="#deletar"
            token="123456789123"
            modal="sim"
        ></tabela-lista>     
    </painel> 
</pagina>

<modal nome="adicionar" titulo="Adicionar">    
    <formulario id="formAdicionar" css="" action="#" method="post" enctype="multipart/form-data" token="1234567">
      
      <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Título</label>      
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do Artigo">  
      </div>      
      <div class="form-group">
        <label for="descricao" class="col-sm-2 control-label">Descrição</label>      
          <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Artigo">          
      </div>     

    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" type="submit" class="btn btn-primary">Adicionar</button>
    </span>
</modal>

<modal nome="editar">    
  <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="1234567">
      
      <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Título</label>      
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do Artigo" v-model="$store.state.item.titulo">  
      </div>      
      <div class="form-group">
        <label for="descricao" class="col-sm-2 control-label">Descrição</label>      
          <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Artigo" v-model="$store.state.item.descricao">          
      </div>     

    </formulario>
    <span slot="botoes">
      <button form="formEditar" type="submit" class="btn btn-default">Atualizar</button>
    </span>  
</modal>

<modal nome="detalhe" :titulo="$store.state.item.titulo">    
  <p>@{{$store.state.item.descricao}}</p>  
</modal>

@endsection
