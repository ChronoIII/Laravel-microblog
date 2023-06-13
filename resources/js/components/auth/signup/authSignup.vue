<template>
    <div class="auth signup">
        <div v-if="page === 'signup'" class="signup-form">
            <label for="txt_username">
                <span>Username</span>
            </label>
            <input
                v-model="username"
                type="text"
                name="uname"
                id="txt_username">

            <label for="txt_email">
                <span>Email</span>
            </label>
            <input
                v-model="email"
                type="text"
                name="email"
                id="txt_email">

            <label for="txt_password">
                <span>Password</span>
            </label>
            <input
                v-model="password"
                type="password"
                name="password"
                id="txt_password">

            <label for="txt_password_confirmation">
                <span>Confirm Password</span>
            </label>
            <input
                v-model="password_confirmation"
                type="password"
                name="password_confirmation"
                id="txt_password_confirmation">

            <div class="sizedbox"></div>

            <button class="btn btn_create">Create an account</button>
            <button class="btn btn_back" @click="changePage">Back to login</button>
        </div>

        <div v-if="page !== 'signup'" class="signup-image"></div>
    </div>
</template>

<script>

export default {
    props: {
        page: 'String'
    },

    data() {
        return {
            username: '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },

    methods: {
        changePage() {
            this.$emit('change-page', 'login');
        }
    }
}
</script>

<style scoped>
    .signup {
        width: 100%;
        height: calc(100lvh - 50px);
        background: #fff9;
        display: flex;
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
        margin-left: 20px;
        margin-right: 20px;
    }

    label > span {
        font-size: 12px;
        color: #000;
        cursor: text;
    }

    .sizedbox {
        height: 30px;
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
