<script setup>
import { router, usePage} from '@inertiajs/vue3'
import { computed, watch } from 'vue'

defineProps({ posts: Object })
const page = usePage()
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

const destroy = (id) => {
  if (confirm('Are you sure?')) {
    router.delete(route('posts.destroy', id))
  }
}
</script>

<template>
  <div>
    <p v-if="show" class="p-4 mb-4" :class="{
        'bg-green-400': toast.type === 'success',
        'bg-red-400': toast.type === 'error',
        'bg-blue-400': toast.type === 'info',
        'bg-orange-400': toast.type === 'warning',
            }"
    >{{ toast.message }}</p>
  </div>
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
              <td>{{post.title}}</td>
              <td>{{post.body}}</td>
              <td>
                <Link :href="route('posts.edit', post.id)">Edit</Link>
                <button @click="destroy(post.id)" class="text-red-500 ml-2">Delete
                </button>
              </td>
          </tr>
      </tbody>
  </table>
  </div>
</template>
