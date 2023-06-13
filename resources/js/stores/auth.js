import authService from "../services/authService";

export default {
    state: {
        user: null,
    },
    mutations: {
        SET_USER({ state }, oUser) {
            state.user = oUser;
        }
    },
    actions: {
        loginUser({ commit }, aParameters) {
            authService.loginUser(aParameters)
                .then(response => {
                    let oData = response.data.data;
                    let sToken = oData.token;
                    let oUser = oData.user;
                    localStorage.setItem('token', sToken);
                    commit('SET_USER', oUser);
                });
        }
    },
    getters: {

    }
}
