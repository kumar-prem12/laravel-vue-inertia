<script setup>
    const model = defineModel({
        type: null,
        required: true
    })
    defineProps({
        label: {
            type: String,
            default: ''
        },
        type: {
            type: String,
            default: 'text',
        },
        message: String,
    });
</script>

<template>
    <div class="mb-2">
        <label v-if="label">{{ label }}</label>
        <input :type= type v-model="model" :class="{'ring-red-500!' : message}" />
        <small class="error" v-if="message">{{ message }}</small>
    </div>
</template>