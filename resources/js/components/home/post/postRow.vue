<template>
    <div class="post-info">
        <img
            class="post-avatar"
            src="https://i1.sndcdn.com/artworks-srzzrusovzQ7qySb-XeY3CA-t500x500.jpg"
            alt="minato aqua">

        <div style="display: flex; flex-direction: column;">
            <span>Minato Aqua</span>
            <span style="font-size: 12px; color: dimgray;">1hr</span>
        </div>
    </div>

    <div>
        <p>{{ postData.post_content }}</p>
    </div>

    <div class="post-command">
        <a href="#">Love</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
    </div>

    <div class="comment-container">
        <img
            class="post-avatar"
            src="https://i1.sndcdn.com/artworks-srzzrusovzQ7qySb-XeY3CA-t500x500.jpg"
            alt="minato aqua">

        <textarea
            v-model="writtenComment"
            class="comment-textarea"
            placeholder="Write a comment..."></textarea>
    </div>
</template>

<script>

export default {
    props: ['postData'],

    data() {
        return {
            writtenComment: '',
        }
    },

    methods: {
        postComment() {

        }
    }
}
</script>

<style scoped>
    .post-info {
        display: flex;
        margin-bottom: 10px;
    }

    .post-avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        margin-right: 10px;
    }

    .post-command {
        border-top: 1px solid #fdcaaa;
        display: flex;
        justify-content: space-around;
        margin-top: 5px;
    }

    .post-command > a {
        margin: 5px 0;
        text-decoration: none;
    }

    .comment-container {
        display: flex;
        border-top: 1px solid #fdcaaa;
        padding-top: 10px;
    }

    .comment-avatar {
        width: 60px;
    }

    .comment-textarea {
        resize: none;
        width: 100%;
        padding: 5px;
    }
</style>
