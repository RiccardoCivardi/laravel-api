<script>

    import axios from 'axios';
    import {baseUrl} from '../data/data'
    import {store} from '../data/store'

    export default {

        name: 'AsideTypeTechnology',

        data(){
            return{

                store

            }
        },

        methods:{

            getApiByTypeThecnology(uri,id){
                // console.log(`${baseUrl}projects/${uri}/${id}`);
                axios.get(`${baseUrl}projects/${uri}/${id}`)
                    .then( result => {
                        // console.log(result.data);
                        store.projects = result.data.data;
                        // mettere paginazione in base a come scende il dato
                        store.pagination.current = result.data.current_page;
                        store.pagination.last = result.data.last_page;
                    })
            },

            setMainTitle(title){
                store.main_title = title;
            }
        }
    }
</script>


<template>
<aside>
            <div class="categories mt-5">

                <h2 class="mb-3">Tipologie</h2>
                <button v-for="item in store.types" :key="'type'+item.id" class="btn btn-light btn-sm mb-2"
                    @click="getApiByTypeThecnology('project-type',item.id); setMainTitle('Elenco progetti per tipologia '+ item.name)"
                 >
                    {{item.name}}
                </button>

                <h2 class="mb-3 mt-3">Tecnologie</h2>
                <button v-for="tech in store.thecnologies" :key="'tech'+tech.id" class="btn btn-light btn-sm mb-2"
                    @click="getApiByTypeThecnology('project-thecnology',tech.id); setMainTitle('Elenco post per tag '+tech.name)"
                 >
                    {{tech.name}}
                </button>

                <button class="btn btn-light btn-sm mt-4"
                    @click="$emit('getApi')"
                >
                   Tutti i progetti
                </button>
            </div>
        </aside>
</template>


<style lang="scss" scoped>
.categories{
        padding-left: 90px;
        button{
            display: block;
            margin: 20px 0;
            padding: 5px 10px;
        }
    }
</style>
