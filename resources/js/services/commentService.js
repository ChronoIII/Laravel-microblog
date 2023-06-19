import axios from 'axios';

const commentBaseClient = axios.create({
    baseURL: 'api/admin/comment',
    headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    }
});

commentBaseClient.interceptors.response.use(
    response => response,
    error => {
        if (error.response.status === 401) {
            localStorage.removeItem('token');
            location.replace('/');
            alert('Unathorized access');
        }
        return Promise.reject(error);
    }
);

export default {
    async storeComment(aParameter) {
        return await commentBaseClient.post('', aParameter);
    }
}
