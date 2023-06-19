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
        getAllFriendPost({ commit }) {
            postService.getAllFriendPost()
                .then(response => {
                    let oData = response.data.data;
                    commit('SET_ALL_POSTS', oData);
                });
        },

        createPost({ commit }, postData) {
            postService.createPost(postData)
                .then(response => {
                    console.log(response);
                });
        },

        createComment({ commit }, commentData) {
            commentService.storeComment(commentData)
                .then(response => {
                    console.log(response);
                });
        }
    },

    getters: {

    }
}
