<script setup>

defineProps({
  links: {
    type: Array,
    required: true,
  },
  from: Number,
  to: Number,
  total: Number,
})
</script>

<template>
  <!-- Main wrapper -->
  <div class="flex items-center justify-between mb-4">

    <!-- Left: Pagination Links -->
    <div class="flex flex-wrap gap-2">
      <Link
        v-for="(link, index) in links"
        :key="index"
        v-html="link.label"
        :href="link.url ?? ''"
        class="px-3 py-1 border rounded text-sm"
        :class="{
          'bg-blue-600 text-white': link.active,
          'text-gray-400 cursor-not-allowed': !link.url,
        }"
        :disabled="!link.url"
        preserve-scroll
      />
    </div>

    <!-- Right: Results Info -->
    <p class="text-slate-600 text-sm whitespace-nowrap">
      Showing {{ from }} to {{ to }} of {{ total }} results
    </p>

  </div>
</template>
