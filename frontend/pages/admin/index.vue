<template>
  <v-layout
    column
    justify-center
  >
    <v-card v-if="adminUsers">
      <v-card-title>
        管理者一覧
        <v-spacer />
        <v-text-field
          v-model="searchText"
          append-icon="mdi-magnify"
          label="検索"
          sigle-line
        />
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="adminUsers"
        :items-per-page="5"
        :search="searchText"
        sort-by="id"
        :sort-desc="true"
        class="elevation-1"
      >
      </v-data-table>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  middleware: 'not_logined_admin_user',
  layout: 'admin',
  async fetch ({ store }) {
    const adminUsers = await store.dispatch('adminUsers/fetchList')
    store.commit('adminUsers/setList', adminUsers)
  },
  data () {
    return {
      searchText: '',
    }
  },
  computed: {
    adminUsers () {
      return this.$store.getters['adminUsers/list']
    },
    headers () {
     return [
        { text: 'ID', value: 'id' },
        { text: 'メールアドレス', value: 'email' },
        { text: '名前', value: 'name' },
        { text: '', value: 'edit-action' },
        { text: '', value: 'delete-action' },
      ]
    }
  }
}
</script>
