import postService from '../services/postService';

export default {
    state: {
        posts: [],
    },

    mutations: {
        SET_ALL_POSTS(state, allPosts) {
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
        },

        createPost({ commit }, postData) {
            console.log(postData);
            postService.createPost(postData)
                .then(response => {
                    console.log(response);
                });
        }
    },

    getters: {

    }
}
