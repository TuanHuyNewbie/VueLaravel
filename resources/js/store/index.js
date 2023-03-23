import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    data: null
  },
  mutations: {
    setData(state, payload) {
      state.data = payload
    }
  },
  actions: {
    setData({commit}, payload) {
      commit('setData', payload)
    }
  }
})

export default store