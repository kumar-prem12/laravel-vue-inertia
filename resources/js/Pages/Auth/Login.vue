<script setup>
    import { useForm } from '@inertiajs/vue3';
    import TextInput  from '../Components/TextInput.vue'; 

    const form = useForm({
        email: null,
        password: null,
        remember: null
    });
    const login = () => {
        form.post(route('login'), {
            onError: () => form.reset('password'),
        });
    }

</script>
<template>
<Head title="Login"/>
<h1 class="title">Login</h1>
<div class="w-2/4 mx-auto">
    <form @submit.prevent="login">
        <TextInput label="email" type="email" v-model="form.email" :message="form.errors.email" />
        <TextInput label="password" type="password" v-model="form.password" :message="form.errors.password" />
        
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-2">
                <input type="checkbox" v-model="form.remember" id="remember" />
                <label for="remember">Remember me</label>
            </div>
            <p class="text-slate-600">Need a account? <a :href="route('register')" class="text-link">Register</a></p>
        </div>
        <button class="primary-btn cursor-pointer" :disabled="form.processing">Login</button>
    </form>
</div>
</template>