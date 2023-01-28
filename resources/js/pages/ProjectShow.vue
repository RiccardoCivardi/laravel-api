<script>

    import axios from 'axios';

    import {baseUrl} from '../data/data';
    import {formatDate, toUpperCase} from '../data/function';

    export default {

        name: 'ProjectShow',

        data(){
            return{

                baseUrl,
                project : {},
                formatDate,
                toUpperCase

            }
        },

        methods: {

            getApi() {

                axios.get(this.baseUrl +'projects/' + this.$route.params.slug)
                    .then(results => {

                        if(Object.keys(results.data).length){

                            this.project = results.data
                            // console.log(this.project);

                        } else {

                            this.$router.push({name: 'not-found'});
                        }

                    })


            }

        },

        computed: {

            dateFormat(){
                return formatDate(this.project.updated_at);
            },

            upperCase(){
                return toUpperCase(this.project.name);
            }

        },

        beforeMount(){

            this.getApi();

        }

    }

</script>


<template>

    <div class="d-flex justify-content-center ">

        <div class="card w-50 my-5">

            <img
                v-if="project.cover_image"
                :src="project.cover_image" class="card-img-top" :alt="project.name">

            <div class="card-body text-center">

                <h1
                    v-if="project.name"
                    class="card-title me-3">
                    {{upperCase}}
                </h1>


                <h3 v-if="project.type"><span class="badge text-bg-primary">{{project.type.name}}</span></h3>

                <div
                    v-if="project.technologies"
                    class="technologies mb-2 text-center">
                    <span
                        v-for="technology in project.technologies" :key="technology.id"
                        class="badge text-bg-warning me-2 ">{{technology.name}}
                    </span>
                </div>

                <p
                    v-if="project.updated_at"
                    class="card-title">
                    Aggiornato il: {{dateFormat}}
                </p>
                <div
                    v-if="project.summary"
                    class="card-text" v-html="project.summary"></div>

            </div>
        </div>

    </div>

</template>


<style lang="scss" scoped>

</style>
