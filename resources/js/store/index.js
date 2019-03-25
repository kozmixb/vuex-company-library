import Vuex from 'vuex';
import Vue from 'vue';
import companies from './modules/companies.js';
import employees from './modules/employees.js';

Vue.use(Vuex);

export default new Vuex.Store({
  modules:{
    companies,
    employees
  }
});