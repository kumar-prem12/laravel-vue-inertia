<script setup>
    // import { Link } from "@inertiajs/vue3";
    // import Layout from "../Layouts/Layout.vue";
    // import demo from "../Layouts/demo.vue";
    // defineOptions({ layout: demo })
    import { router } from '@inertiajs/vue3';
    import PaginationLink  from "./Components/PaginationLink.vue"; 
    import { watch, ref } from 'vue';
    import { debounce } from 'lodash';

    const props = defineProps({
        users: Object,
        searchTerm: String,
        can: Object
    });
    const formatDate = (date) => {
        if (!date) return ''
        return new Intl.DateTimeFormat('en-US', {
            year: 'numeric', 
            month: 'short',
            day: 'numeric',
        }).format(new Date(date))
    }

    const search = ref(props.searchTerm);
    // watch(search, throttle((q) => router.get('/', {serach: q}, { preserveState: true }) ,1000));
    watch(
        search, 
        debounce((q) => router.get('/', {search: q}, { preserveState: true }), 500)
    );
    // watch(search, (q) => router.get('/', {serach: q}, {preserveState: true }));
</script>

<template>
    <Head :title="`${$page.component}`" />
    <!-- <title>Home</title> -->
    <meta head-key="description" name="description" content="This is the home page meta" />
    <div>
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="Search" v-model="search" />
            </div>
        </div>
        <table>
            <thead>
                <tr class="bg-slate-300">
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th v-if="can.delete_user">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in props.users.data" :key="user.id">
                    <td><img :src="user.avatar ? ('storage/' + user.avatar) : ('storage/avatars/user-default.png')" alt="" class="avatar"/></td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{formatDate(user.created_at)}}</td>
                    <td v-if="can.delete_user">
                        <button class="bg-red-500 w-6 h-6 rounded-full"></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <PaginationLink
            :links="users.links"
            :from="users.from"
            :to="users.to"
            :total="users.total"
            />
        
      
    </div>
    <!-- <div>
        <h1 class="text-center bg-stake-200">{{ $page.component }}</h1>
        <h1 class="text-center">This is Home Page</h1>
    </div> -->
    <Link class="mt-[600px] block" :href="route('home')" preserve-scroll>Refresh</Link>
</template>