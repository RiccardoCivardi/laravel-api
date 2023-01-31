<script>

    import axios from 'axios';
    import { baseUrl } from '../data/data';

    export default {

        name : 'ContactForm',

        data(){
            return{

                name: '',
                email: '',
                message: '',
                errors: {},
                loading: false,
                showForm: true

            }
        },

        methods: {

            sendForm(){
                this.loading = true;
                // console.log('form inviato')

                const data = {
                    name: this.name,
                    email: this.email,
                    message: this.message
                }

                // console.log(data);

                axios.post(`${baseUrl}contacts`, data)
                    .then(result => {
                        this.loading = false;
                        this.showForm = false;
                        // console.log(result.data);
                        // controllo se mi arrivano errori
                        if(!result.data.success){
                            this.errors = result.data.errors
                            // console.log(this.errors);
                        }else{
                            // ripulisco il form
                            this.name = '';
                            this.email = '';
                            this.message = '';
                            this.errors = {};
                        }
                    })
            }

        }

    }

</script>


<template>

    <form v-if="showForm"  @submit.prevent="sendForm()">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input v-model.trim="name" type="text" :class="['form-control', {'is-invalid': errors.name}]" id="name" placeholder="inserisci il nome">
            <p v-for="(error, index) in errors.name" :key="'name'+index" :class="{'invalid-feedback': errors.name}">{{error}}</p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input v-model.trim="email" type="text" :class="['form-control', {'is-invalid': errors.email}]" id="email" placeholder="Inserisci email">
            <p v-for="(error, index) in errors.email" :key="'email'+index" :class="{'invalid-feedback': errors.email}">{{error}}</p>
        </div>
        <div class="form-floating mb-3">
            <textarea v-model.trim="message" :class="['form-control', {'is-invalid': errors.message}]" placeholder="Messaggio" id="message" style="height: 100px"></textarea>
            <label for="message">Messaggio</label>
            <p v-for="(error, index) in errors.message" :key="'message'+index" :class="{'invalid-feedback': errors.message}">{{error}}</p>
        </div>
        <button type="submit" class="btn btn-light" :disabled="loading">{{ loading ? 'Invio in corso...' : 'Invia' }}</button>
    </form>

    <h3 v-else> Email inviata correttamente </h3>

</template>


<style>

</style>
