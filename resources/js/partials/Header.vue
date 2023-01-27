<script>

    export default {

        name: 'Header'

    }

</script>


<template>

    <header class="d-flex align-items-center justify-content-center">

        <ul class="d-flex justify-content-center">
            <li>
                <router-link :to="{name: 'home'}">HOME</router-link>
            </li>
            <li>
                <router-link :to="{name: 'projects'}">PROGETTI</router-link>
            </li>
            <li>
                <router-link :to="{name: 'about'}">CHI SIAMO</router-link>
            </li>
            <li>
                <router-link :to="{name: 'contacts'}">CONTATTI</router-link>
            </li>
        </ul>

    </header>

</template>


<style lang="scss" scoped>

    @use '../../scss/partialsVue/vars' as *;

    header{
        height: $header-height;
        background-color: orange;
        ul{
            li{
                a{
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: white;
                    margin-right: 15px;
                    &:hover,
                    &.active{
                        color: black
                    }
                    &.active{
                        text-decoration: underline;
                    }
                }
            }
        }
    }

</style>
