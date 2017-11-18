import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    activities: [],
  },
  getters: {
    getActivities(state) {
      return state.activities;
    },
  },
  mutations: {
    setActivities(state, activities) {
      state.activities = activities;
    },
  },
  actions: {
    setActivities({ commit }, activities) {
      commit('setActivities', activities);
    },
  },
});
