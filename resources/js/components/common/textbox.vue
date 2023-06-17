<template>
    <div class="textbox-container">
        <label :for="id">
            <span>{{ label }}</span>
        </label>
        <input
            type="text"
            :name="label"
            :id="id"
            @input="$emit('update:modelValue', $event.target.value)">
    </div>
</template>

<script>

export default {
    props: {
        label: 'String',
        id: 'String',
    },
}
</script>

<style scoped>
    .textbox-container {
        display: flex;
        flex-direction: column;
        /* width: 100%; */
    }

    label > span {
        font-size: 12px;
        color: #000;
        cursor: text;
    }
</style>
