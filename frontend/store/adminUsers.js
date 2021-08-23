export const state = () => ({
  adminUsers: []
})

export const getters = {
  list(state) {
    return state.adminUsers
  }
}

export const mutations = {
  setList(state, data) {
    state.adminUsers = data
  }
}

export const actions = {
  async fetchList() {
    return await this.$axios.$get('/admin_users')
      .catch(err => {
        console.log(err)
      })
  }
}
