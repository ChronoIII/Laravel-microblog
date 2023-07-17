import userService from '../services/userService';

export default {
    state: {
        user: null,
    },

    mutations: {
        SET_USER(state, oUserData) {
            state.user = oUserData;
        }
    },

    actions: {
        async getUserData({ commit }) {
            await userService.getUserData()
                .then(response => {
                    let oData = response.data.data;
                    console.log(oData);
                    commit('SET_USER', oData);
                });
        }
    },

    getters: {

    }
}
