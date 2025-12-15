<script setup>
    // import {Head} from '@inertiajs/vue3';
    defineProps({
        user: String
    })
</script>

<template>
    <Head :title="`${$page.component}`">
        <meta head-key="description" name="description" content="This is the about page meta"/>
    </Head>
    <div>
        <h1 class="text-3xl font-bold ">This is About Page</h1>
        <h1 class="text-3xl font-bold">Hello {{ user }}</h1>
    </div>
</template>