import axios from 'axios';

const state ={
  employees: [],
  getUrl: 'http://localhost:8000/api/employees'
}

const getters = {
  allEmployees: (state) => state.employees,
}

const actions = {
  async fetchEmployees({ commit },url=state.getUrl){
    url = (url!==state.getUrl)? state.getUrl+'?where='+url: state.getUrl;
    const response = await axios.get(url);
    console.log(response);
    commit('setEmployees',response.data);
  }
}

const mutations = {
  setEmployees:(state,employees) => state.employees = employees,
}

export default{
  state,
  getters,
  actions,
  mutations
}