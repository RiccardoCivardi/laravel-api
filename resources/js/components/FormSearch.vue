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

            getApi(){
                axios.get(baseUrl + 'projects/search', {
                    params:{
                        tosearch: this.tosearch
                    }
                })
                    .then(result => {
                        this.tosearch = '';
                        store.projects = result.data.data;
                        store.pagination.current = result.data.current_page;
                        store.pagination.last = result.data.last_page;
                        // console.log(result.data);
                    })

            }
        }
    }

</script>


<template>

    <div class="container d-flex justify-content-center">

        <input v-model.trim="tosearch" @keyup.enter="getApi" class="form-control me-3 w-25" type="text" placeholder="Cerca">
        <button @click="getApi" class="btn btn-light">Invia</button>

    </div>

</template>


<style lang="scss" scoped>

</style>
