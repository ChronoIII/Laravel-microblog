<template>
    <div class="auth signup">
        <div v-if="page === 'signup'" class="signup-form">
            <textbox
                v-model="username"
                id="txt_username"
                label="Username" />

            <textbox
                v-model="firstName"
                id="txt_firstName"
                label="First name" />

            <span style="width: 10px;"></span>

            <textbox
                v-model="lastName"
                id="txt_lastName"
                label="Last name" />

            <textbox
                v-model="email"
                id="txt_email"
                label="Email" />

            <textbox
                v-model="password"
                id="txt_password"
                label="Password" />

            <textbox
                v-model="password_confirmation"
                id="txt_password_confirmation"
                label="Confirm Password" />

            <div style="height: 30px;"></div>

            <button
                class="btn btn_create"
                @click="attemptRegistration">
                Create an account
            </button>
            <button
                class="btn btn_back"
                @click="changePage">
                Back to login
            </button>
        </div>

        <div v-if="page !== 'signup'" class="signup-image"></div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

import Textbox from '../../common/textbox';

export default {
    props: {
        page: 'String'
    },
    components: {
        Textbox,
    },
    data() {
        return {
            username: '',
            email: '',
            firstName: '',
            lastName: '',
            password: '',
            password_confirmation: '',
        };
    },
    methods: {
        ...mapActions([
            'registerUser'
        ]),
        changePage() {
            this.$emit('change-page', 'login');
        },

        attemptRegistration() {
            this.registerUser({
                username: this.username,
                email: this.email,
                first_name: this.firstName,
                last_name: this.lastName,
                password: this.password,
                password_confirmation: this.password_confirmation,
            });
        }
    },
}
</script>

<style scoped>
    .signup {
        width: 100%;
        height: calc(100lvh - 50px);
        background: #fff9;
    }

    .signup-image {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: aquamarine;
    }

    .signup-form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .signup-form > * {
        margin: 0 20px;
    }

    .btn {
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }

    .btn_create {
        background: #f7c4a5;
        border: 1px solid #d1a78c;
    }

    .btn_back {
        margin-top: 10px;
        background: rgb(192, 86, 86);
        border: 1px solid rgb(228, 102, 102);
        color: #eee;
    }
</style>
