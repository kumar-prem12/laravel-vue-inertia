<script setup>
    // import { reactive } from 'vue';
    // import { router } from '@inertiajs/vue3';
    import { useForm  } from '@inertiajs/vue3';
    import TextInput  from '../Components/textInput.vue'; 

    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    })

    const submit = () => {
        // console.log('submit',form);
        // router.post("/register", form);
        form.post(route('register'), {
            onError: () => form.reset('password', 'password_confirmation'),
        });
    }
</script>

<template>
    <Head title="Register"/>
    <h1 class="title">Register a new account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput label="name" v-model="form.name" :message="form.errors.name"  />
            <TextInput label="email" type="email" v-model="form.email" :message="form.errors.email"  />
            <TextInput label="password" type="password" v-model="form.password" :message="form.errors.password"  />
            <TextInput label="password confirmation" type="password" v-model="form.password_confirmation"  />

            <!-- <div class="mb-2">
                <label>Name</label>
                <input type="text" v-model="form.name"/>
                <div v-if="form.errors.name" class="error">{{ form.errors.name }}</div>
            </div>
            <div class="mb-2">
                <label>Email</label>
                <input type="text" v-model="form.email"/>
                <div v-if="form.errors.email" class="error">{{ form.errors.email }}</div>
            </div>
            <div class="mb-2">
                <label>Password</label>
                <input type="password" v-model="form.password" />
                <div v-if="form.errors.password" class="error">{{ form.errors.password }}</div>
            </div>
            <div class="mb-2">
                <label>Confirm Password</label>
                <input type="password" v-model="form.password_confirmation" />
            </div> -->
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="processing">Register</button>
            </div>
        </form>
    </div>
</template>