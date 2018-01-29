<template>
<div>   
    <div class="form-inline">
        <a v-if="criar && !modal" :href="criar">Criar</a>
        <modallink v-if="criar && modal" tipo="button" nome="adicionar" titulo="Criar" css="btn btn-success" icone="glyphicon glyphicon-plus"></modallink>
    
        <div class="form-group pull-right">
            <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">            
        </div>          
        <table v-if="lista.length > 0" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" @click="ordenaColuna(index)" v-for="(titulo, index) in titulos" :key="index">{{titulo}}</th>
                     <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in lista" :key="index">
                    <td v-for="(i, index) in item" :key="index">{{i}}</td>
                    <td v-if="detalhe || editar || deletar">
                        <form :id="index" v-if="deletar && token" :action="deletar+item.id" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="token">
                            
                            <a v-if="detalhe && !modal" :href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal" :item="item" :url="detalhe" tipo="button" nome="detalhe" css="btn btn-info btn-xs" icone="glyphicon glyphicon-info-sign"></modallink>

                            <a v-if="editar && !modal" :href="editar">Editar |</a>
                            <modallink v-if="editar && modal" :item="item" :url="editar" tipo="button" nome="editar" css="btn btn-warning btn-xs" icone="glyphicon glyphicon-pencil"></modallink>                                          
                            <a href="#" @click="executaForm(index)" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                              
                            </a>
                        </form>
                        <span v-if="!token">
                            
                            <a v-if="detalhe && !modal" :href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal" :item="item" tipo="button" nome="detalhe" titulo="Detalhe" css="btn btn-info btn-xs" icone="glyphicon glyphicon-info-sign"></modallink>

                            <a v-if="editar" :href="editar">Editar |</a>
                            <a v-if="deletar" :href="deletar">Deletar</a>
                        </span>                        
                        <span v-if="token && !deletar">
                            <a v-if="detalhe && !modal" :href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal" :item="item" tipo="button" nome="detalhe" titulo="Detalhe" css="btn btn-info btn-xs" icone="glyphicon glyphicon-info-sign"></modallink>

                            <a v-if="editar && !modal" :href="editar">Editar |</a>
                            <modallink v-if="editar && modal" :item="item" :url="editar" tipo="button" nome="editar" titulo="Editar" css="btn btn-warning btn-xs" icone="glyphicon glyphicon-pencil"></modallink>               
                        </span> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>        
</template>

<script>
export default {
  props: [
    "titulos",
    "itens",
    "criar",
    "detalhe",
    "editar",
    "deletar",
    "token",
    "ordem",
    "ordemcol",
    "modal"
  ],
  data() {
    return {
      buscar: "",
      ordemAux: this.ordem || "asc",
      ordemAuxCol: this.ordemCol || 0
    };
  },
  methods: {
    executaForm(index) {
      document.getElementById(index).submit();
    },
    ordenaColuna(coluna) {
      this.ordemAuxCol = coluna;
      if (this.ordemAux.toLowerCase() == "asc") {
        this.ordemAux = "desc";
      } else {
        this.ordemAux = "asc";
      }
    }
  },
  computed: {
    lista: function() {
      let listar = this.itens.data;
      let ordem = this.ordemAux;
      let ordemCol = this.ordemAuxCol;
      ordem = ordem.toLowerCase();
      ordemCol = parseInt(ordemCol);

      if (ordem == "asc") {
        listar.sort(function(a, b) {
          if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return 1;}
          if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return -1; }
          return 0;
        });
      } else {
        listar.sort(function(a, b) {
          if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return 1; }
          if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return -1;}
          return 0;
        });
      }

      if (this.buscar) {
        return listar.filter(res => {
          //Coverte o res (array) para objeto para poder ser tratado como objeto json
          res = Object.values(res);
          for (let i = 0; i < res.length; i++) {              
            //A concatenação (res[i] + "") serve para garantir caso exista um campo do tipo inteiro para ser tratado como string
            if ((res[i] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0 ) {              
              return true;              
            }
          }          
          return false;
        });    
      }
      return listar;
    }
  }
};
</script>
