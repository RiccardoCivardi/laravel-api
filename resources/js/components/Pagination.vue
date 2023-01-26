<script>

import {store} from '../data/store';

export default {

  name:'Pagination',

  data(){
    return{

      store

    }
  }

}
</script>

<template>

  <div class="d-flex justify-content-center pagination mb-5">

    <button
      @click="store.pagination.current = 1; $emit('pagination')" 
      :disabled="store.pagination.current === 1"
      class="btn btn-secondary me-2">|&lt; </button>

    <button 
      @click="store.pagination.current--; $emit('pagination')"
      :disabled="store.pagination.current === 1"
      class="btn btn-secondary me-2">
      &larr;</button>
    
    <button 
      v-for="i in store.pagination.last" :key="i"
      @click="store.pagination.current = i; $emit('pagination')"
      :disabled="store.pagination.current === i"
      class="btn btn-secondary me-2">
      {{ i }}</button>
    
    <button
      @click="store.pagination.current++; $emit('pagination')"
      :disabled="store.pagination.current === store.pagination.last"
      class="btn btn-secondary me-2">
      &rarr;</button>
    
    <button 
      @click="store.pagination.current = store.pagination.last; $emit('pagination')"
      :disabled="store.pagination.current === store.pagination.last"
      class="btn btn-secondary me-2">
      >|</button>

  </div>
  
</template>

<style lang="scss" scoped>

</style>