<template>
    <div class="update-container">
        <img
            class="circle-avatar"
            src="https://i1.sndcdn.com/artworks-srzzrusovzQ7qySb-XeY3CA-t500x500.jpg"
            alt="minato aqua">

        <div class="write-container">
            <textarea
                v-model="postContent"
                @key.enter="createPost"
                placeholder="Write something..."></textarea>

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
            'createPost'
        ]),
        createPost() {
            this.createPost({
                post_content: this.post_content,
            });

            alert('Post published...');

            this.postContent = '';
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

    .write-container > textarea {
        width: 100%;
        border-radius: 10px;
        resize: none;
        padding: 5px 10px;
        height: 36px;
    }

    .command-container {
        display: flex;
        justify-content: space-around;
    }
</style>
