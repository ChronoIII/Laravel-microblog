import { createStore } from 'vuex';

import authStore from './stores/auth';
import postStore from './stores/post';

export default createStore({
    modules: {
        authStore,
        postStore,
    }
});
