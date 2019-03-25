<template>
  <div class="card">
    <div class="card-header">Employees</div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item" v-for="employee in allEmployees" :key="employee.id">{{employee.name}}</li>
      </ul>
    </div>
  </div>
</template>

<script>
import {mapGetters,mapActions} from 'vuex';
export default {
  computed:mapGetters(['allEmployees']),
  methods:{
    ...mapActions(['fetchEmployees']),
  },
  created(){
    this.fetchEmployees()
  }
}
</script>

<style>

</style>
