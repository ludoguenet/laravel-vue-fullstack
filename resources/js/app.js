import './bootstrap';
import { createApp } from "vue";
import UsersList from "./components/users/UsersList.vue";

const app = createApp({});

app.component('usersList', UsersList);

app.mount('#app');
