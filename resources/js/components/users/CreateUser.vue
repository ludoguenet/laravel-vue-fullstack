<template>
    <h1>Créer un utilisateur</h1>

    <form action="/users" method="POST">
        <label for="name">Nom</label>
        <input v-model="formData.name" type="text" id="name">

        <template
            v-if="errors.name"
        >
            <span
                v-text="errors.name[0]"
            />
        </template>

        <br>
        <label for="email">Email</label>
        <input v-model="formData.email" type="email" id="email">

        <template
            v-if="errors.email"
        >
            <span
                v-text="errors.email[0]"
            />
        </template>

        <br>
        <label for="password">Mot de passe</label>
        <input v-model="formData.password" type="password" id="password">

        <template
            v-if="errors.password"
        >
            <span
                v-text="errors.password[0]"
            />
        </template>

        <br>
        <label for="password_confirmation">Mot de passe à confirmer</label>
        <input v-model="formData.password_confirmation" type="password" id="password_confirmation">

        <br>

        <button
            v-on:click="storeUser"
            type="button"
        >
            Créer un utilisateur
        </button>
    </form>
</template>

<script setup>
import {ref} from "vue";
import axios from "axios";

const errors = ref({});

const formData = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const storeUser = () => {
    axios.post('/api/users', formData.value)
        .then((res) => {
            errors.value = {};
            console.log(res.data.user)
        })
        .catch((err) => {
            console.log(err.response)
            errors.value = err.response.data.errors;
        });
}
</script>
