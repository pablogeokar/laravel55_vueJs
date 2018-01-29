@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <!-- Componente PAINEL -->    
    <painel titulo="Lista de Usuários">

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
            v-bind:titulos="['#','Nome','E-mail']"
            v-bind:itens="{{json_encode($listaModelo)}}"
            ordem="asc" ordemcol="0"
            criar="#criar"            
            editar="/admin/usuarios/"
            deletar="/admin/usuarios/"
            token="{{csrf_token()}}"
            modal="sim"
        ></tabela-lista>
        <!-- Paginação -->
        <div align="center">{{$listaModelo->links()}}</div>     
    </painel> 
</pagina>

<modal nome="adicionar" titulo="Adicionar">    
    <formulario id="formAdicionar" css="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{csrf_token()}}">
      
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nome:</label>      
        <input type="text" class="form-control" id="name" name="name" placeholder="nome de usuário" value="{{old('name')}}">  
      </div>      
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">e-mail:</label>      
          <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">          
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Senha:</label>      
          <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="{{old('password')}}">          
      </div>       
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
    </span>
   
</modal>

<modal nome="editar">    
  <formulario id="formEditar" css="" :action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{csrf_token()}}">

      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nome:</label>      
        <input type="text" class="form-control" id="name" name="name" placeholder="nome de usuário" v-model="$store.state.item.name">  
      </div>      
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">e-mail:</label>      
          <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" v-model="$store.state.item.email">          
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Senha:</label>      
          <input type="password" class="form-control" id="password" name="password" placeholder="Senha" v-model="$store.state.item.password">          
      </div>             
      
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-default">Atualizar</button>
    </span>  
</modal>

@endsection
