<template>
        <div>
            <auth-signup :page="page" @change-page="changePage" />
            <auth-login :page="page" @change-page="changePage" />
        </div>
</template>

<script>
import authLogin from './login/authLogin.vue';
import authSignup from './signup/authSignup.vue';

export default {
    components: {
        authLogin,
        authSignup,
    },

    data() {
        return {
            page: '',
        }
    },

    methods: {
        changePage(pageToBe) {
            this.page = pageToBe;
        }
    },
    beforeMount() {
        let a = localStorage.getItem('token');
        if (a != null) {
            location.replace('/home');
        }
    }
}
</script>

<style scoped>
    div {
        display: flex;
    }
</style>
