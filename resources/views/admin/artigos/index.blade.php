@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <!-- Componente PAINEL -->    
    <painel titulo="Lista de Artigos">

      @if($errors->all())       
      <!-- Erros de Validação -->    
        <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="">x</span>
        </button>
         @foreach($errors->all() as $key => $value)
         <li>{{$value}}</li>
         @endforeach
        </div>
      @endif 

        <breadcrumbs v-bind:lista="{{$listaBreadcrumbs}}"></breadcrumbs>
        <tabela-lista 
            v-bind:titulos="['#','Título','Descrição','Data']"
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
    <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}">
      
      <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Título:</label>      
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do Artigo" value="{{old('titulo')}}">  
      </div>      
      <div class="form-group">
        <label for="descricao" class="col-sm-2 control-label">Descrição:</label>      
          <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Artigo" value="{{old('descricao')}}">          
      </div>
      <div class="form-group">
        <label for="conteudo" class="col-sm-2 control-label">Conteúdo:</label>      
          <textarea id="conteudo" name="conteudo" class="form-control">{{old('titulo')}}</textarea>          
      </div> 
      <div class="form-group">
        <label for="data" class="col-sm-4 control-label">Criado em:</label>      
          <input type="datetime-local" class="form-control" id="data" name="data" value="{{old('data')}}">          
      </div>              
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
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
      <button form="formEditar" class="btn btn-default">Atualizar</button>
    </span>  
</modal>

<modal nome="detalhe" :titulo="$store.state.item.titulo">    
  <p>@{{$store.state.item.descricao}}</p>  
</modal>

@endsection
