<script setup>
import { router, usePage } from '@inertiajs/vue3'
import { useModal } from '@erag/vue-toastification';


defineProps({ posts: Object })
const page = usePage()
const modal = useModal();

const destroy = async (id) => {

  const isConfirmed = await modal.confirm({
    title: 'Delete Account?',
    message: 'Are you sure? This action cannot be undone.',
    confirmText: 'Yes, Delete',
    cancelText: 'No, Keep it',
    type: 'danger'
  });

  if (isConfirmed) {
    router.delete(route('posts.destroy', id))
  }
}
</script>

<template>
  <div>
    <Link :href="route('posts.create')" class="nav-link mb-4 bg-slate-500">Create</Link>
    <table class="mt-4">
      <thead>
        <tr class="bg-slate-300">
          <th>Title</th>
          <th>Body</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts.data" :key="post.id">
          <td>{{ post.title }}</td>
          <td>{{ post.body }}</td>
          <td class="flex">
            <Link :href="route('posts.edit', post.id)">Edit</Link>
            <button @click="destroy(post.id)" class="text-red-500 ml-2">Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
