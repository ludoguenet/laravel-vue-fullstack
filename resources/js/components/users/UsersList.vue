<template>
    <users-select
        v-if="users.length !== 0"

        :users="users"

        @update:modelValue="(id: number) => handleUpdateId(id)"
    />
</template>

<script setup lang="ts">
    import {ref} from "vue";

    const users = ref([]);

    const loadFromServer = async () => {
        await axios.get('/api/users')
            .then((res) => users.value = res.data.data)
            .catch((err) => console.log(err));
    }

    loadFromServer();

    const handleUpdateId = (
        id: number
    ): void => {
        console.log(id);
    }
</script>
