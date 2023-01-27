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

                axios.get(this.baseUrl + 'projects', {
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
                .catch(error => {

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

    <div class="container d-flex flex-wrap">

        <div class="row">

            <ProjectCard v-for="project in store.projects" :key="project.id" :project="project"/>

        </div>

    </div>

    <Pagination @pagination="getApi()"/>

</template>


<style lang="scss" scoped>


</style>
