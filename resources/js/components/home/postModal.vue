<template>
    <input ref="file_manager" @change="getTempImage" type="file" accept="image/*" multiple style="display: none;">

    <div class="modal fade" tabindex="-1" id="postModal" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Share your thoughts</h5>
                    <button ref="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <template v-if="isLoading === false">
                    <div class="modal-body pb-0">
                        <textarea ref="postTextArea" v-model="postContent" class="w-100" id="postTextArea" @input="resizeTextArea" rows="1" placeholder="Write Something..."></textarea>

                        <div class="row">
                            <div class="col">
                                <a @click.prevent="openFileManager" href="#" class="fs-3 text-decoration-none px-4 pt-2 rounded text-light-emphasis upload-image-button">
                                    <i class="bi bi-camera-fill" style="color: crimson;"></i> <span class="fs-6" style="letter-spacing: 0.03rem; font-weight: bold;"><sup>Upload an image</sup></span>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex">
                            <template v-for="imageFile in postImages">
                                <div class="image-container me-1 mb-2">
                                    <img :src="viewImage(imageFile)" class="border border-1" style="height: 100px;" alt="post-image">
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="modal-footer py-1">
                        <button @click.prevent="postSomething" type="button" class="btn btn-primary py-1 w-100">Post</button>
                    </div>
                </template>

                <template v-else>
                    <div class="modal-body text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </template>
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
            isLoading: false,
            postImages: []
        }
    },

    computed: {

    },

    methods: {
        ...mapActions([
            'getAllFriendPost',
            'createPost',
        ]),

        resizeTextArea(evt) {
            // TODO: Height not reverting to original upon deleting content
            let a = document.getElementById('postTextArea');
            if (evt.target.scrollTop != 0) {
                a.style.height = evt.target.scrollHeight + 'px';
            }
        },

        postSomething() {
            if (this.postContent === '') {
                this.$refs['postTextArea'].focus();
                return;
            }

            this.isLoading = true;
            let data = this.wrapFormData();
            this.createPost(data)
            .then(() => {
                this.$refs['closeModal'].click();
                this.postContent = '';
                this.isLoading = false;
                this.showPostToast();
                this.getAllFriendPost();
            });
        },

        wrapFormData() {
            let oFormData = new FormData();

            oFormData.append('post_content', this.postContent);
            this.postImages.forEach((data, index) => {
                oFormData.append('image[' + index + ']', data);
            });

            return oFormData;
        },

        showPostToast() {
            let aToast = document.getElementById('liveToast');

            aToast.classList.add('show');
            aToast.classList.remove('hide');

            setTimeout(() => {
                aToast.classList.add('hide');
                aToast.classList.remove('show');
            }, 2000);
        },

        openFileManager() {
            this.$refs['file_manager'].click();
        },

        getTempImage(evt) {
            let aLength = evt.target.files.length;
            for (let i = 0; i < aLength; i++) {
                this.postImages.push(evt.target.files[i]);
            }
        },

        viewImage(imageFile) {
            return URL.createObjectURL(imageFile);
        }
    },
}
</script>

<style scoped>
    #postTextArea {
        border: 0;
        outline: none;
        resize: none;
        min-height: 100px;
    }

    .loading-animation {
        animation: spin 9s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .upload-image-button:hover {
        background: #e6e6e6;
    }

    .upload-image-button:active {
        background: #d8d8d8;
    }

    .image-container {
        position: relative;
    }

    .image-container:hover:before {
        content: '❌';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }

    .image-container:hover:after {
        content: '';
        background: #000000a1;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>
