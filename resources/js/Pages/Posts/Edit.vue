<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput  from '../Components/TextInput.vue'; 

const props = defineProps({ post: Object })

const form = useForm({
  title: props.post.title,
  body: props.post.body,
})

const submit = () => {
  // form.put(`/posts/${props.post.id}`)
  form.put(route('posts.update', props.post.id))

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
    <button class="primary-btn cursor-pointer" :disabled="form.processing">Update</button>
  </form>
  </div>
</template>
