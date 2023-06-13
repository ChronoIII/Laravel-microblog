import postService from '../services/postService';

export default {
    state: {
        posts: [],
    },

    mutations: {
        SET_ALL_POSTS({ state }, allPosts) {
            state.posts = allPosts;
        }
    },

    actions: {
        getAllFriendPost({ commit }) {
            postService.getAllFriendPost()
                .then(response => {
                    let oData = response.data.data;
                    commit('SET_ALL_POSTS', oData);
                });
        }
    },

    getters: {

    }
}
