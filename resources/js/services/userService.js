import axios from 'axios';

const userBaseClient = axios.create({
    baseURL: 'api/admin/user',
    headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
});

export default {
    async getUserData() {
        return await userBaseClient.get('');
    }
}
