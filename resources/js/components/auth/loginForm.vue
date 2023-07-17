<template>
    <form action="">
        <div class="input-group mb-3">
            <div class="input-group-text"><i class="bi bi-person"></i></div>
            <input v-model.trim="credentials.username" type="text" class="form-control" placeholder="Username">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-text"><i class="bi bi-lock"></i></div>
            <input v-model.trim="credentials.password" type="password" class="form-control" placeholder="Password">
        </div>

        <div class="row mb-4">
            <div class="col form-check ms-3">
                <input type="checkbox" class="form-check-input" id="chk-remember">
                <label for="chk-remember" class="form-check-label">Remember Me</label>
            </div>

            <div class="col text-end">
                <a href="#!">Forgot Password ?</a>
            </div>
        </div>

        <button @click.prevent="attemptLogin" type="submit" class="btn btn-primary btn-block mb-4 w-100">Sign in</button>

        <div class="text-center">
            <p>Not a member? <a href="#!" @click.prevent="$emit('linkActive', 'register')">Register</a></p>
        </div>
    </form>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    data() {
        return {
            credentials: {
                username: '',
                password: '',
            }
        }
    },

    methods: {
        ...mapActions([
            'loginUser'
        ]),

        attemptLogin() {
            this.loginUser({
                username: this.credentials.username,
                password: this.credentials.password,
            });
        },
    }
}
</script>
