import {ref} from "vue";
import axios from "axios";
import {UserType} from "../../types/users/UserType";

export default function () {
    const errors = ref({});
    const user = ref<UserType>();

    const createUser = async (
        formData: any,
    ): Promise<void> => {
        await axios.post('/api/users', formData)
            .then((res) => {
                errors.value = {};
                window.location.href = '/';
            })
            .catch((err) => errors.value = err.response.data.errors);
    }

    const showUser = async (
        id: number,
    ): Promise<void> => {
        await axios.get(`/api/users/${id}`)
            .then((res) => console.log(res))
            .catch((err) => console.log(err));
    }

    return {
        errors,
        createUser,
        showUser
    }
}
