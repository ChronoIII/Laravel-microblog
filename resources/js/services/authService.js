import axios from 'axios';

const baseClient = axios.create({
    baseURL: '/api/admin',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
});

export default {
    async loginUser(aParameters) {
        return await baseClient.post('login', aParameters);
    },

    async registerUser(aParameters) {
        return await baseClient.post('register', aParameters);
    }
}
