import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    langs: ["ru", "en"]
  },
  getters: {
    LANGS: state => {
      return state.langs;
    }
  },
  mutations: {},
  actions: {}
});