<script setup>
  // import Dashboard from '../Pages/Dashboard.vue';
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
          <Link :href="route('home')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Home'}">Home</Link>
          <Link :href="route('about')" class="nav-link":class="{'bg-slate-700' : $page.component === 'About'}">About</Link>
        </div>
        <div v-if="$page.props.auth.user" class="space-x-6 flex">
          <img class="avatar" :src="$page.props.auth.user.avatar ? `/storage/${$page.props.auth.user.avatar}` : '/storage/avatars/user-default.png'"alt="">
          <!-- <img class="avatar" :src="$page.props.auth.user.avatar ? ('storage/' + $page.props.auth.user.avatar) : ('storage/avatars/user-default.png')" alt=""> -->
          <Link :href="route('dashboard')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Dashboard'}">Dashboard</Link>
          <Link :href="route('posts.index')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Posts/Index'}">Posts</Link>
          <Link :href="route('logout')"  method="post" as="button" class="nav-link">Logout</Link>
        </div>
        <div v-else class="space-x-6">
          <Link :href="route('register')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Register'}">Register</Link>
          <Link :href="route('login')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Login'}">Login</Link>
        </div>
      </nav>
    </header>

    <main class="p-4">
      <slot />
    </main>
  </div>
</template>
