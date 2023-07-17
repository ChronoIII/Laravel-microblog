<template>
    <div class="mt-4 position-relative border rounded">
        <div>
            <div
                class="w-100 rounded-top position-relative"
                :style="'background: url(' + getCoverPhoto + ')'"
                style="height: 150px; background-size: cover;">
                <a href="#" class="position-absolute top-0 end-0 me-3 mt-3 fs-5 bg-light px-2 py-1 rounded-circle border"><i class="bi bi-camera"></i></a>
            </div>

            <div
                class="position-absolute translate-middle top-25 start-50 rounded-circle"
                :style="'background: url(' + getProfilePhoto + ')'"
                style="width: 150px; height: 150px; background-size: contain; background-position: center; border: 5px solid cornflowerblue;">
            </div>

            <div class="w-100 rounded-bottom overflow-hidden" style="height: 200px; background-color: cornflowerblue">
                <post-commands />
            </div>
        </div>
    </div>
</template>

<script>
import postCommands from './postCommands';

export default {
    components: {
        postCommands,
    },

    data() {
        return {
            defaultProfilePhoto: 'https://static.vecteezy.com/system/resources/previews/005/544/718/original/profile-icon-design-free-vector.jpg',
            defaultCoverPhoto: 'https://www.givenow.com.au/img/default-cover.png',
        }
    },

    computed: {
        getUser() {
            return this.$store.state.userStore.user;
        },

        getProfilePhoto() {
            let aUser = this.getUser;
            if (aUser === null || aUser.user_profile.profile_image_path === null) {
                return this.defaultProfilePhoto;
            }
            return aUser.user_profile.profile_image_path;
        },

        getCoverPhoto() {
            let aUser = this.getUser;
            if (aUser === null || aUser.user_profile.cover_image_path === null) {
                return this.defaultCoverPhoto;
            }
            return aUser.user_profile.cover_image_path;
        }
    }
}
</script>
