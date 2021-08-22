<template>
  <div class="container">
    <div>
      <nuxt-logo />
      <h1 class="title">
        {{data}}
      </h1>
      <h2 class="subtitle">
        My superb Nuxt.js project
      </h2>
      <div class="links">
        <a
          href="https://nuxtjs.org/"
          target="_blank"
          class="button--green"
        >
          Documentation
        </a>
        <a
          href="https://github.com/nuxt/nuxt.js"
          target="_blank"
          class="button--grey"
        >
          GitHub
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import NuxtLogo from '../components/NuxtLogo.vue'
export default {
  components: {
     NuxtLogo
  },
  async asyncData(app) {
    const data = await app.$axios.$get('/api');
    return {
      data
    }
  }
}
</script>
