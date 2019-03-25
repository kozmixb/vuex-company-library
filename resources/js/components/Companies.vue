<template>
  <div class="card">
    <div class="card-header">Companies</div>
    <div class="card-body">
      <p>Double click = edit <br> Single click = view employees of the selected company</p>
      <ul class="list-group">
        <Company v-for="company in allCompanies" @selected="select" :class="selectedId===company.id? 'selectedList':''" :key="company.id" :company="company" />
      </ul>
      <button v-show="nextPageUrl!==null" class="btn btn-primary" @click="nextPage()">Load next 5 companies</button>
    </div>
  </div>
</template>

<script>
import {mapGetters,mapActions} from 'vuex';
import Company from './Company.vue';
  export default {
    components:{
      Company,
    },
    data(){
      return{
        selectedId:null
      }
    },
    methods:{
      ...mapActions(['fetchCompanies','fetchEmployees']),
      nextPage(){
        this.fetchCompanies(this.nextPageUrl);
      },
      select(id){
        this.selectedId = id;
        this.fetchEmployees(id);
      }
    },
    computed:mapGetters(['allCompanies','nextPageUrl']),
    created(){
      this.fetchCompanies();
    },
  }
</script>

<style>
  .selectedList{
    background-color:#eee;
  }
</style>

