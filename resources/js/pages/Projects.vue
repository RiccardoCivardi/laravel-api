<script>

    import axios from 'axios';

    import ProjectCard from '../components/ProjectCard.vue';
    import Pagination from '../components/Pagination.vue';
    import FormSearch from '../components/FormSearch.vue';
    import AsideTypeTechnology from '../components/AsideTypeTechnology.vue';


    import {store} from '../data/store';
    import {baseUrl} from '../data/data';

    export default {

        name:'Projects',

        components: {

        ProjectCard,
        Pagination,
        FormSearch,
        AsideTypeTechnology

        },

        data(){
            return {

                store,
                baseUrl

            }
        },

        methods: {



            getApi(){

                let url = '';

                if(store.apiType == 'type' || store.apiType == 'tech') {
                    url = baseUrl + 'projects/'+ store.typeTechParam + '?page=' + store.pagination.current;;
                    console.log(url);
                } else if (store.apiType == 'search') {
                    url = baseUrl + store.searchParam + '&page=' + store.pagination.current;
                    console.log(url);
                } else if(store.apiType == 'project') {
                    url = baseUrl + 'projects?page=' + store.pagination.current;
                    console.log(url);
                }


                axios.get(url)
                .then(results => {

                    console.log(results.data);
                    store.projects = results.data.projects.data;

                    store.types = results.data.types;
                    store.thecnologies = results.data.technologies;

                    store.pagination.current = results.data.projects.current_page;
                    store.pagination.last = results.data.projects.last_page;


                    // console.log(results.data.projects);
                })

            }

        },

        mounted() {
            store.apiType = 'project';
            store.pagination.current = 1;

            this.getApi()

        }

    }

</script>


<template>

    <div class="container-fluid d-flex">

        <div class="container-fluid">

            <h1 class="my-5 text-center">{{store.main_title}}</h1>

            <FormSearch />

            <div class="container mt-5">

                <div class="row d-flex flex-wrap justify-content-center">

                    <ProjectCard v-for="project in store.projects" :key="'proj'+project.id" :project="project"/>

                </div>

            </div>

            <Pagination @pagination="getApi()"/>

        </div>

        <AsideTypeTechnology @getApi="getApi()"/>

    </div>

</template>


<style lang="scss" scoped>


</style>
