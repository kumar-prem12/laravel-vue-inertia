<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput  from '../Components/TextInput.vue'; 


const form = useForm({
  title: null,
  body: null,
})

const submit = () => {
  // form.post('/posts')
  form.post(route('posts.store'))
}
</script>

<template>
  <Head title="Create Post"/>
  <div class="w-4/6 mx-auto">
    <form @submit.prevent="submit">
      <TextInput label="title" v-model="form.title" :message="form.errors.title"  />
      <label>Body</label>
      <textarea v-model="form.body" class="mb-2"></textarea>
      <small class="error">{{ form.errors.body }}</small>
      <button class="primary-btn cursor-pointer" :disabled="form.processing">Save</button>
    </form>
  </div>

</template>
