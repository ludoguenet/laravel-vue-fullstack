<template>
    <div class="flex space-x-5">
        <users-select
            v-if="users.length !== 0"

            :users="users"

            @update:modelValue="(id: number) => handleUpdateId(id)"
        />


        <a v-if="user" href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ user.name }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        </a>

    </div>
</template>

<script setup lang="ts">
    import {ref} from "vue";
    import useUser from "../../composables/users/useUser";

    const {
        user,
        showUser
    } = useUser();

    const users = ref([]);

    const loadFromServer = async () => {
        await axios.get('/api/users')
            .then((res) => users.value = res.data.data)
            .catch((err) => console.log(err));
    }

    loadFromServer();

    const handleUpdateId = async (
        id: number
    ): Promise<void> => {
        await showUser(id);
    }
</script>
