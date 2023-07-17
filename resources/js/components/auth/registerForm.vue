<template>
    <form action="">
        <div class="row g-3 mb-3">
            <div class="col">
                <input v-model.trim="credentials.firstName" type="text" class="form-control text-capitalize" placeholder="First name" aria-label="First name">
            </div>

            <div class="col">
                <input v-model.trim="credentials.lastName" type="text" class="form-control text-capitalize" placeholder="Last name" aria-label="Last name">
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-8">
                <input v-model.trim="credentials.email" type="email" class="form-control mb-3" placeholder="Email Address" aria-label="Email Address">
            </div>

            <div class="col">
                <select class="form-select mb-3">
                    <option selected>Select your Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="X">Prefer not to say</option>
                </select>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col">
                <input v-model.trim="credentials.username" type="text" class="form-control" placeholder="Username">
            </div>

            <div class="col">
                <input v-model="credentials.password" type="password" class="form-control mb-2" placeholder="Password">
                <input v-model="credentials.password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
            </div>
        </div>

        <button @click.prevent="attemptRegistration" type="submit" class="btn btn-primary w-100">Create an account</button>
    </form>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    data() {
        return {
            credentials: {
                username: '',
                email: '',
                firstName: '',
                lastName: '',
                password: '',
                password_confirmation: '',
            }
        };
    },
    methods: {
        ...mapActions([
            'registerUser'
        ]),

        attemptRegistration() {
            let oCredentials = this.credentials;

            this.registerUser({
                username: oCredentials.username,
                email: oCredentials.email,
                first_name: oCredentials.firstName,
                last_name: oCredentials.lastName,
                password: oCredentials.password,
                password_confirmation: oCredentials.password_confirmation,
            });
        }
    },
}
</script>
