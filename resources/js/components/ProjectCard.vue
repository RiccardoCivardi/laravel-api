<script>

    import { textMaxLength } from '../data/data';

    import {truncateText, formatDate} from '../data/function';


    export default {

        name:'ProjectCard',

        props: {

        project: Object

        },

        data(){
            return{

            textMaxLength,
            truncateText,

            }
        },

        computed: {

            dateFormat(){
                return formatDate(this.project.updated_at);
            }
        }

    }

</script>


<template>

    <div class="card-wrapper">

        <div class="card h-100">
            <div class="card-body text-center">

                <h5 class="card-title">{{project.name}}</h5>
                <h5 v-if="project.type"><span class="badge text-bg-primary">{{project.type.name}}</span></h5>

                <div
                    v-if="project.technologies.length"
                    class="technologies mb-2 text-center">
                    <span
                        v-for="technology in project.technologies" :key="technology.id"
                        class="badge text-bg-warning me-2 ">{{technology.name}}
                    </span>
                </div>

                <p class="card-title">Aggiornato il: {{dateFormat}}</p>
                <div class="card-text" v-html="truncateText(project.summary, this.textMaxLength)"></div>
            </div>
        </div>

    </div>

</template>


<style lang="scss" scoped>

    .card-wrapper {
        width: calc(100% / 4);
        padding: 10px 10px;
    }

</style>
