<template>

    <div class="mx-auto" style="width: 700px;">
        <profile-header />

        <div v-if="isLoading === true" class="text-center mt-4">
            <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div v-else>
            <div v-if="posts.length > 0">
                <template v-for="post in posts">
                    <post-divider />

                    <post-controller :post="post" />
                </template>
            </div>

            <div v-else>
                <post-divider />

                <h3 class="text-center">No post available</h3>
            </div>
        </div>
    </div>

    <post-modal />
    <post-notification-toast />
</template>

<script>
import { mapState, mapActions, } from 'vuex';

import profileHeader from './profileHeader';
import postDivider from './postDivider';
import postController from './postController';
import postModal from './postModal';
import postNotificationToast from './postNotificationToast';

export default {
    components: {
        profileHeader,
        postDivider,
        postController,
        postModal,
        postNotificationToast,
    },

    data() {
        return {
            isLoading: true,
        }
    },

    computed: {
        posts() {
            return this.$store.state.postStore.posts;
        }
    },

    methods: {
        ...mapActions([
            'getAllFriendPost',
            'getUserData',
        ]),
    },

    mounted() {
        this.getUserData();

        this.isLoading = true;

        this.getAllFriendPost()
            .then(() => {
                this.isLoading = false;
            });
    }
}
</script>

<style scoped>

</style>
