<template>
    <div class="post-container">
        <div v-if="posts.length > 0">
            <template v-for="post in posts">
                <post-row :post-data="post" />
            </template>
        </div>

        <div v-else>
            <h1 style="text-align:center; margin-top: 10px;">
                No post to show
            </h1>
            <p style="font-size: 12px; color: dimgrey; text-align: center;">
                ( Try to post something... )
            </p>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
import postRow from './postRow';

export default {
    components: {
        postRow
    },

    computed: {
        posts() {
            return this.$store.state.postStore.posts;
        }
    },

    methods: {
        ...mapActions([
            'getAllFriendPost'
        ]),
    },

    mounted() {
        this.getAllFriendPost();
    }
}
</script>

<style scoped>
    .post-container {
        border-top: 2px solid #fdcaaa27;
        margin-top: 15px;
    }
</style>
