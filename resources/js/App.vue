<script>

  import axios from 'axios';

  import ProjectsCard from './components/ProjectsCard.vue';
  import Pagination from './components/Pagination.vue'


  import {store} from './data/store';

  export default {

    name:'App',

    components: {

      ProjectsCard,
      Pagination

    },

    data(){
      return {

        store

      }
    },

    methods: {

      getApi(){

        axios.get(this.store.baseUrl + 'projects', {
          params: {
            page: this.store.pagination.current
          }
        })
          .then(results => {

            this.store.projects = results.data.projects.data;

            this.store.pagination.current = results.data.projects.current_page;
            this.store.pagination.last = results.data.projects.last_page;

            console.log(results.data.projects);
          })

      }

    },

    mounted() {
      this.getApi()
    }

  }

</script>


<template>

  <h1 class="mt-5 text-center">BENTORNATO VUE &hearts;</h1>
  <h2 class="mt-3 text-center"> CARD DEI PROGETTI</h2>

  <div class="container d-flex flex-wrap ">

    <ProjectsCard v-for="project in store.projects" :key="project.id" :project="project"/>

  </div>

  <Pagination @pagination="getApi()"/>

</template>


<style lang="scss">

@use '../scss/appVue.scss';

</style>
