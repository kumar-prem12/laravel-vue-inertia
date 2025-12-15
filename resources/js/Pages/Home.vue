<script setup>
    import Layout from "../Layouts/Layout.vue";
    import demo from "../Layouts/demo.vue";
    // import { Head } from '@inertiajs/vue3';
    // defineOptions({ layout: demo })
</script>

<template>
    <Head :title="`${$page.component}`">
        <!-- <title>Home</title> -->
        <meta head-key="description" name="description" content="This is the home page meta" />
    </Head>
    <div>
        <h1>{{ $page.component }}</h1>
        <!-- <h1>{{ $page.props.user }}</h1> -->
        <h1>This is Home Page</h1>
    </div>
    <Link class="mt-[600px] block" :href="route('home')" preserve-scroll>Refresh</Link>
</template>