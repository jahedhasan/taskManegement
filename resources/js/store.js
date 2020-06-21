import Vue from 'vue';
import Vuex from 'vuex';
// import VuexPersistence from 'vuex-persist'
// const vuexLocal = new VuexPersistence({
//   storage: window.localStorage
// })
Vue.use(Vuex);
export const store = new Vuex.Store({
  // plugins: [vuexLocal.plugin],
  state: {
    dailyTasks: [],
    taskManagements: [],
  },
  getters: {
    dailyTasks(state) {
      return state.dailyTasks;
    },
    taskManagements(state) {
      return state.taskManagements;
    }
  },
  mutations: {
    updateDailyTasks(state, dailyTasks) {
      return state.dailyTasks = dailyTasks;
    }
    updateDailyTasks(state, taskManagements) {
      return state.taskManagements = taskManagements
    }

  },
  actions: {

  }
})
