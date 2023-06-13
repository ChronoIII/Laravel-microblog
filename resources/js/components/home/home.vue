<template>
    <div>
        <update-post />

        <post-container />
    </div>
</template>

<script>
import updatePost from './update/update';
import postContainer from './post/post';

export default {
    components: {
        updatePost,
        postContainer
    }
}
</script>

<style scoped>
    div {
        width: 700px;
        margin: auto;
    }
</style>
