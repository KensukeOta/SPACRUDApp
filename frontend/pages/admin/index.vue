<template>
  <section>
    <h1>管理画面へようこそ</h1>
  </section>
</template>

<script>
export default {
  middleware: 'not_logined_admin_user',
}
</script>
