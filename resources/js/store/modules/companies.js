import axios from 'axios';

const state = {
  companies: [],
  getUrl: 'http://localhost:8000/api/companies',
  next_page_url: null,
}

const getters = {
  allCompanies:(state) => state.companies,
  nextPageUrl:(state) => state.next_page_url,
}

const actions = {
  async fetchCompanies({ commit },url=state.getUrl){
    const response = await axios.get(url);
    commit('setCompanies',response.data);
  },
  async updateCompany({ commit },updatedCompany){
    const response = await axios.post('http://localhost:8000/api/company',updatedCompany);
    commit('updatedCompany',response.data);
  }
}

const mutations = {
  setCompanies:(state,companies) => {
    if(state.next_page_url!==null){
      state.companies.push(...companies.data);
    }else{
      state.companies = companies.data;
    }
    state.next_page_url = companies.next_page_url;
  },
  updatedCompany:(state,company) => {
    const index = state.companies.findIndex(c => c.id === company.id);
    if(index !== -1){
      state.companies.splice(index,1,company);
    }

  }
}

export default{
  state,
  getters,
  actions,
  mutations
}