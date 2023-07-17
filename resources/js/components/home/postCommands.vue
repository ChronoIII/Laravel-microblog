<template>
    <div class="d-flex justify-content-around align-items-end h-100">
        <div class="w-100 border-end border-top post-button" style="cursor: pointer;">
            <a href="#" class="fs-5 text-center text-light text-decoration-none"
                data-bs-toggle="modal" data-bs-target="#postModal">
                <div class="my-3">
                    <i class="bi bi-pencil-square"></i>
                    <p class="fs-6 mb-0">Post / Upload</p>
                </div>
            </a>
        </div>
        <!-- <div class="w-100 border-top post-button" style="cursor: pointer;">
            <a href="#" @click.prevent="openImageManager" class="fs-5 text-center text-light text-decoration-none">
                <div class="my-3">
                    <i class="bi bi-camera"></i>
                    <p class="fs-6 mb-0">Upload</p>
                </div>
            </a>
        </div> -->
        <div class="w-100 border-start border-top post-button" style="cursor: pointer;">
            <a href="#" class="fs-5 text-center text-light text-decoration-none">
                <div class="my-3">
                    <i class="bi bi-film"></i>
                    <p class="fs-6 mb-0">Reels</p>
                </div>
            </a>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {

        }
    },

    computed: {

    },

    methods: {

    }
}
</script>

<style scoped>
    .post-button:hover {
        background: rgb(78, 117, 189);
        transition: 0.5s;
    }
</style>
