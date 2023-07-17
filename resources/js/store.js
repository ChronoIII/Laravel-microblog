import { createStore } from 'vuex';

import authStore from './stores/auth';
import userStore from './stores/user';
import postStore from './stores/post';

export default createStore({
    modules: {
        authStore,
        userStore,
        postStore,
    }
});
