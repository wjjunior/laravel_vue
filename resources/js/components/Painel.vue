<template>
  <div class="card">
    <div v-if="titulo" v-bind:class="defineCor">{{titulo}}</div>

    <div class="card-body">
      <slot></slot>
    </div>
  </div>

</template>

<script>
export default {
  props:['titulo', 'cor'],
  computed:{
    defineCor: function(){
      return "card-header "+ (this.cor || "");
    }
  }
}
</script>

<style media="screen">
.blue {
  color: white;
  background-color: #0d4a96 !important;
}

</style>
