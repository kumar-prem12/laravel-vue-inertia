<!-- <template>
    <div>
        <p class="p-4 bg-green-200">{{ $page.props.flash.message }}</p>
        <hi class="title text-center">Welcome back {{ $page.props.auth.user.name }}</hi>
    </div>
</template> -->

<script setup>
    import { computed, watch, ref } from 'vue'
    import { usePage } from '@inertiajs/vue3'

    const page = usePage()
    const user = computed(() => page.props.auth.user)
    const toast = computed(() => page.props.flash.toast)
    const show = computed(() => !!toast.value)

    watch(toast, (val) => {
        if (val) {
            show.value = true
            setTimeout(() => {
            show.value = false
            }, 3000)
        }
    })
</script>

<template>
    <main>
        <!-- <div
            v-if="show"
            class="fixed top-5 right-5 px-4 py-3 rounded shadow text-white transition"
            :class="{
                'bg-green-600': toast.type === 'success',
                'bg-red-600': toast.type === 'error',
                'bg-blue-600': toast.type === 'info',
            }"
            > {{ toast.message }}
        </div> -->
        <p v-if="show" class="p-4 mb-4" :class="{
                'bg-green-400': toast.type === 'success',
                'bg-red-400': toast.type === 'error',
                'bg-blue-400': toast.type === 'info',
                'bg-orange-400': toast.type === 'warning',
            }"
        >{{ toast.message }}</p>
        <h1 class="title text-center">
            Welcome back {{ user.name }}
        </h1>
        <!-- <article>
            <slot />
        </article> -->
    </main>
</template>