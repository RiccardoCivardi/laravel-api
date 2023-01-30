<script>

    import axios from 'axios';

    import ProjectCard from '../components/ProjectCard.vue';
    import Pagination from '../components/Pagination.vue'


    import {store} from '../data/store';
    import {baseUrl} from '../data/data';

    export default {

        name:'Projects',

        components: {

        ProjectCard,
        Pagination

        },

        data(){
            return {

                store,
                baseUrl

            }
        },

        methods: {

            getApi(){

                axios.get(baseUrl + 'projects', {
                params: {
                    page: store.pagination.current
                }
                })
                .then(results => {

                    if(results.data.projects){

                        store.projects = results.data.projects.data;

                        store.pagination.current = results.data.projects.current_page;
                        store.pagination.last = results.data.projects.last_page;

                    }else {

                        this.$router.push({ name: 'not-found'});

                    }

                // console.log(results.data.projects);
                })

            }

        },

        mounted() {
            this.getApi()
        }

    }

</script>


<template>

    <h1 class="my-5 text-center"> PROGETTI BOOLEAN</h1>

    <div class="container">

        <div class="row d-flex flex-wrap justify-content-center">

            <ProjectCard v-for="project in store.projects" :key="project.id" :project="project"/>

        </div>

    </div>

    <Pagination @pagination="getApi()"/>

</template>


<style lang="scss" scoped>


</style>
