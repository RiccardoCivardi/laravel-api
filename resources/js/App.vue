<script>

    import Header from './partials/Header.vue';

    export default {

        name:'App',

        components: {

            Header

        }

    }

</script>


<template>

    <div class="main-wrapper">

        <Header></Header>

        <main>

            <router-view></router-view>

        </main>

    </div>

</template>


<style lang="scss">

    @use '../scss/appVue.scss';

</style>
