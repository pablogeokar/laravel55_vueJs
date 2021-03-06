@extends('layouts.app')

@section('content')

<pagina tamanho="10">
    <!-- Componente PAINEL -->    
    <painel titulo="Dashboard">
        <!-- Componente Breadcrumbs -->
        <breadcrumbs v-bind:lista="{{$listaBreadcrumbs}}"></breadcrumbs>
        <!-- Componente CAIXA -->
        <div class="col-md-4">        
            <caixa titulo="Artigos" qtd="80" cor="#2980b9" url="{{route('artigos.index')}}" icone="ion ion-pie-graph"></caixa>
        </div>
        <!-- Componente CAIXA -->
        <div class="col-md-4">        
            <caixa titulo="Usuários" qtd="1500" cor="#16a085" url="{{route('usuarios.index')}}" icone="ion ion-person-stalker"></caixa>
        </div>
        <!-- Componente CAIXA -->
        <div class="col-md-4">        
            <caixa titulo="Autores" qtd="3" cor="#8e44ad" url="#" icone="ion ion-person"></caixa>
        </div>
    </painel> 
</pagina>

@endsection
