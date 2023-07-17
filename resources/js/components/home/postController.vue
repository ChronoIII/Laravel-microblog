<template>
    <div class="card border-primary-subtle">
        <div class="card-body">
            <h5>{{ getFullName }}</h5>
            <p class="card-text mt-3">{{ post.post_content }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ getCreatedDate }}</small></p>
        </div>

        <img v-if="post.media.length > 0" :src="post.media[0].media_path" alt="post-image" class="card-img-bottom" style="border-radius: 0;">

        <div class="card-footer row mx-0 text-center">
            <div class="col border-end">
                <a href="#" class="text-decoration-none px-3">Like</a>
            </div>
            <div class="col">
                <a href="#" class="text-decoration-none px-3">Share</a>
            </div>
        </div>
    </div>
</template>

<script>
import dayjs from 'dayjs';

export default {
    props: [
        'post',
    ],

    data() {
        return {

        }
    },

    computed: {
        getFullName() {
            let aUserProfile = this.post.user.user_profile;

            return this.capitalize(aUserProfile.first_name) + ' ' + this.capitalize(aUserProfile.last_name);
        },

        getCreatedDate() {
            let aPost = this.post;

            return dayjs(aPost.created_at).format('YYYY-MM-DD HH:mm:ss');
        }
    },

    methods: {
        capitalize(word) {
            return word[0].toUpperCase() + word.slice(1);
        }
    }
}
</script>
