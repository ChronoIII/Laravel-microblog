import axios from 'axios';

const postBaseClient = axios.create({
    baseURL: 'api/admin/post',
    headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
});

postBaseClient.interceptors.response.use(
    response => response,
    error => {
        if (error.response.status === 401) {
            alert(error.response.message);
            localStorage.removeItem('token');
            location.replace('/');
        }
        return Promise.reject(error);
    }
);

export default {
    async getAllFriendPost() {
        return await postBaseClient.get('');
    }
}
