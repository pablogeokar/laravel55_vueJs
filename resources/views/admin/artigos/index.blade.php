@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <!-- Componente PAINEL -->    
    <painel titulo="Lista de Artigos">
        <tabela-lista 
            v-bind:titulos="['#','Título','Descrição']"
            v-bind:itens="[['1','PHP OO','Curso de PHP OO'],['2','VueJS','Curso de VueJs']]"
            criar="#criar"
            detalhe="#detalhe"
            editar="#editar"
            deletar="#deletar"
            token="123456789123"
        ></tabela-lista>     
    </painel> 
</pagina>
@endsection
