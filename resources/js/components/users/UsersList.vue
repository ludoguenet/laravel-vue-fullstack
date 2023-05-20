<template>
    <users-select
        v-if="users.length !== 0"

        :users="users"
    />
</template>

<script setup>
    import {ref} from "vue";

    const users = ref([]);

    const loadFromServer = async () => {
        await axios.get('/api/users')
            .then((res) => users.value = res.data.data)
            .catch((err) => console.log(err));
    }

    loadFromServer();
</script>
