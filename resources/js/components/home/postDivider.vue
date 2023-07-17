<template>
    <div class="w-100 py-4 post-divider text-center">
        <span class="rounded-circle">
            ⚓
        </span>
    </div>
</template>

<script>

</script>

<style scoped>
    .post-divider {
        position: relative;
    }

    .post-divider:before {
        content: '';
        position: absolute;
        border: 1px solid rgba(100, 148, 237, 0.342);
        top: 47%;
        left: 0;
        width: 100%;
        z-index: -1;
    }

    .post-divider span {
        background: white;
        border: 2px solid rgba(100, 148, 237, 0.342);
        padding: 10px;
    }
</style>
