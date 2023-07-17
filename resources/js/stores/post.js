import postService from '../services/postService';
import commentService from '../services/commentService';

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
        async getAllFriendPost({ commit }) {
            await postService.getAllFriendPost()
                .then(response => {
                    let oData = response.data.data;
                    commit('SET_ALL_POSTS', oData);
                });
        },

        async createPost({ commit }, postData) {
            await postService.createPost(postData);
        },

        async createComment({ commit }, commentData) {
            await commentService.storeComment(commentData)
                .then(response => {
                    console.log(response);
                });
        }
    },

    getters: {

    }
}
