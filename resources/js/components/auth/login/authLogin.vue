<template>
    <div class="auth login">
        <div v-if="page === 'login' || page === ''" class="login-form">
            <textbox
                v-model="username"
                id="txt_username"
                label="Username" />

            <textbox
                v-model="password"
                id="txt_password"
                label="Password" />

            <div class="sizedbox"></div>

            <button class="btn_login" @click="attemptLogin">Login</button>
            <a class="btn_create" @click="changePage" href="#">Create an account</a>
        </div>

        <div v-else class="login-image"></div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

import Textbox from '../../common/textbox';

export default {
    props: {
        page: 'String',
    },

    components: {
        Textbox,
    },

    data() {
        return {
            username: '',
            password: '',
        }
    },

    computed: {

    },

    methods: {
        ...mapActions([
            'loginUser'
        ]),

        attemptLogin() {
            this.loginUser({
                username: this.username,
                password: this.password,
            });
        },

        changePage() {
            this.$emit('change-page', 'signup');
        }
    },
}
</script>

<style scoped>
    .login {
        width: 100%;
        height: calc(100lvh - 50px);
        background: #fff9;
    }

    .login-image {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: greenyellow;
    }

    .login-form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-form > * {
        margin-left: 20px;
        margin-right: 20px;
    }

    .sizedbox {
        height: 30px;
    }

    button.btn_login {
        background: #f7c4a5;
        border: 1px solid #d1a78c;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }

    a.btn_create {
        text-align: center;
        margin-top: 10px;
    }
</style>
