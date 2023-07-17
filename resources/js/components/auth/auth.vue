<template>
    <div class="mx-auto mt-5" style="width: 600px;">
        <ul class="nav nav-pills nav-justified mb-4 border rounded">
            <li class="nav-item">
                <a href="#"
                    :class="{'active' : linkActive === 'login'}"
                    class="nav-link"
                    @click.prevent="changeActiveForm('login')">Login</a>
            </li>

            <li class="nav-item">
                <a href="#"
                    :class="{'active' : linkActive === 'register'}"
                    class="nav-link"
                    @click.prevent="changeActiveForm('register')">Register</a>
            </li>
        </ul>

        <login-form v-if="linkActive === 'login'" :link-active="changeActiveForm" />
        <register-form v-if="linkActive === 'register'" />
    </div>
</template>

<script>
import loginForm from './loginForm';
import registerForm from './registerForm';

export default {
    components: {
        loginForm,
        registerForm,
    },

    data() {
        return {
            linkActive: 'login'
        }
    },

    methods: {
        changeActiveForm(sForm) {
            this.linkActive = sForm;
        }
    }
}
</script>
