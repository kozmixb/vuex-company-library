<template>
  <li class="list-group-item" style="cursor:pointer;" @click="activeMenu()">
    <div v-if="!editable" @dblclick="edit()">
      {{company.name}}
    </div>
    <form @submit.prevent="update()" v-else>
      <div class="form-inline">
        <input type="text" v-model="companyName" class="form-control">
        <button class="btn btn-primary mx-1">Update</button>
        <button @click="edit()" class="btn btn-danger">Cancel</button>
      </div>
    </form>
  </li>
</template>

<script>
import {mapActions} from 'vuex';
export default {
  props:['company'],
  data(){
    return{
      editable: false,
      companyName: this.company.name,
    }
  },
  methods:{
    ...mapActions(['updateCompany']),
    update(){
      const comp ={
        id: this.company.id,
        name: this.companyName
      }
      this.updateCompany(comp);
      this.edit();
    },
    activeMenu(){
      this.$emit('selected',this.company.id);
    },
    edit(){
      if(this.editable===true){
        this.companyName = this.company.name;
      }
      this.editable = !this.editable;
    }
  }
}
</script>
