<template>
    <div class="auth login">
        <div v-if="page === 'login' || page === ''" class="login-form">
            <label for="txt_username">
                <span>Username</span>
            </label>
            <input
                v-model="username"
                type="text"
                name="uname"
                id="txt_username">


            <label for="txt_password">
                <span>Password</span>
            </label>
            <input
                v-model="password"
                type="password"
                name="password"
                id="txt_password">

            <div class="sizedbox"></div>

            <button class="btn_login" @click="attemptLogin">Login</button>
            <a class="btn_create" @click="changePage" href="#">Create an account</a>
        </div>

        <div v-else class="login-image"></div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    props: {
        page: 'String',
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

    input {
        padding: 3px 10px;
    }

    label > span {
        /* position: absolute; */
        /* margin-top: 5px; */
        /* margin-left: 10px; */

        /* position: absolute; */
        font-size: 10px;
        color: #0009;
        cursor: text;
    }

    /* label > input:focus ~ span {
        font-size: 10px;
    } */

    label > input {
        width: 100%;
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
