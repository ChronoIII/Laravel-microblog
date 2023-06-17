import authService from "../services/authService";

export default {
    state: {
        user: null,
    },
    mutations: {
        SET_USER(state, oUser) {
            state.user = oUser;
        }
    },
    actions: {
        async loginUser({ commit }, aParameters) {
            await authService.loginUser(aParameters)
                .then(response => {
                    let oData = response.data.data;
                    let sToken = oData.token;
                    let oUser = oData.user;
                    console.log(sToken);
                    localStorage.setItem('token', sToken);
                    commit('SET_USER', oUser);

                    location.replace('/home');
                });
        },

        registerUser({ commit }, aParameters) {
            authService.registerUser(aParameters)
                .then(response => {
                    alert('Register completed.');
                });
        }
    },
    getters: {

    }
}
