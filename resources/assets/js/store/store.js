import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    activities: [],
    filterResults: [],
  },
  getters: {
    getActivities(state) {
      return state.activities;
    },
    getFilterResults(state) {
      return state.filterResults;
    },
  },
  mutations: {
    setActivities(state, activities) {
      state.activities = activities;
    },
    setFilterResults(state, results) {
      state.filterResults = results;
    },
  },
  actions: {
    setActivities({ commit }, activities) {
      commit('setActivities', activities);
    },
    setFilterResults({ commit }, results) {
      commit('setFilterResults', results);
    },
  },
});
