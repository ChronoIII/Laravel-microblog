<template>
    <div class="update-container">
        <img
            class="circle-avatar"
            src="https://i1.sndcdn.com/artworks-srzzrusovzQ7qySb-XeY3CA-t500x500.jpg"
            alt="minato aqua">

        <div class="write-container">
            <div style="display: flex; margin: auto;">
                <textarea
                    class="post-textarea"
                    v-model="postContent"
                    placeholder="Write something..."></textarea>
                <a @click.prevent="postSomething" href="#" style="display: flex; align-items: center; margin-left: 10px;">
                    <span>Post</span>
                </a>
            </div>

            <div class="command-container">
                <a href="#">Upload a photo</a>
                <a href="#">Feeling/Activity</a>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    data() {
        return {
            postContent: '',
        }
    },

    methods: {
        ...mapActions([
            'createPost',
            'getAllFriendPost',
        ]),

        postSomething() {
            this.createPost({
                post_content: this.postContent,
            });

            alert('Post published...');

            this.postContent = '';

            this.getAllFriendPost();
        }
    }
}
</script>

<style scoped>
    .update-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px 0;
        background: #fdcaaa27;
        padding: 10px 0;
        border-radius: 10px;
    }

    .circle-avatar {
        border-radius: 50%;
        border: 4px solid #f7c4a5;
        width: 80px;
        height: 80px;
        box-sizing: border-box;
    }

    .write-container {
        width: 400px;
        margin: 10px;
    }

    .post-textarea {
        width: 100%;
        border-radius: 10px;
        resize: none;
        padding: 5px 10px;
        height: 36px;
    }

    .command-container {
        display: flex;
        align-items: center;
        justify-content: space-around;
        height: 40px;
    }
</style>
