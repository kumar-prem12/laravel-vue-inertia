<script setup>
  // import { Link, Head } from '@inertiajs/vue3';
</script>

<template>
  <Head>
    <title>Laravel Vue With Inertia</title>
    <meta head-key="description" name="description" content="This is the default description">
  </Head>
  <div>
    <header>
      <nav>
        <!-- <h1>{{ $page.props.auth.user }}</h1> -->
        <div class="space-x-6">
          <Link :href="route('home')" class="nav-link">Home</Link>
          <Link :href="route('about')" class="nav-link">About</Link>
        </div>
        <div class="space-x-6">
          <Link :href="route('register')" class="nav-link">Register</Link>
        </div>
      </nav>
    </header>

    <main class="p-4">
      <slot />
    </main>
  </div>
</template>
