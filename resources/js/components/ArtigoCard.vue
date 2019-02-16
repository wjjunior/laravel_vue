<template>
  <div v-bind:class="'col-sm-' + (sm || '6') + ' col-md-' + (md || '4')">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" :src="imagem" alt="Card image cap">
      <div class="card-body">
        <small>{{data | formataData}} - {{autor}}</small>
        <h5 class="card-title">{{titulo}}</h5>
        <p class="card-text">{{descricao}}</p>
        <a v-bind:href="link" class="btn btn-primary">Leia mais</a>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      props: ['titulo', 'descricao', 'link', 'imagem', 'data', 'autor', 'sm', 'md'],
      filters: {
        formataData: function(valor){
          if (!valor) return '';
          valor = valor.toString();
          if(valor.split('-').length == 3){
            valor = valor.split('-');
            return valor[2] + '/' + valor[1] + '/' + valor[0];
          }
          return valor;
        }
      }
    }
</script>
