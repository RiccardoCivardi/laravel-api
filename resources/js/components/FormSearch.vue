<script>

    import axios from 'axios';
    import {baseUrl} from '../data/data'
    import {store} from '../data/store'

    export default {

        name:'FormSearch',

        data(){
            return{

                tosearch: '',
                store

            }
        },

        methods:{

            getApi(string){

                store.pagination.current = 1;

                axios.get(baseUrl + 'projects/search', {
                    params:{
                        tosearch: this.tosearch
                    }

                })
                    .then(result => {

                        // console.log(result.data);
                        store.projects = result.data.projects.data;
                        store.pagination.current = result.data.projects.current_page;
                        store.pagination.last = result.data.projects.last_page;
                        // console.log(result.data);
                        store.apiType = string;
                        store.searchParam = 'projects/search?tosearch='+this.tosearch;
                        this.tosearch = '';



                    })


            }
        }
    }

</script>


<template>

    <div class="container d-flex justify-content-center">

        <input v-model.trim="tosearch" @keyup.enter="getApi('search')" class="form-control me-3 w-25" type="text" placeholder="Cerca">
        <button @click="getApi('search')" class="btn btn-light">Invia</button>

    </div>

</template>


<style lang="scss" scoped>

</style>
