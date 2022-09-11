<template>
  <div>
    <button v-if="show" 
    @click.prevent="unsave()" 
    class="btn btn-dark" 
    style="width: 100%;" 
    >Устгах</button>

    <button v-else 
    @click.prevent="save()" 
    class="btn btn-primary" 
    style="width: 100%;" 
    >Хадгалах</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
 props:["jobid", "favourited"], 

 data(){
    return {
        show: true
    };
 },
 computed: {
    jobFavourited(){
        return this.favourited;
    }
 },
 mounted(){
    this.show = this.jobFavourited ? true : false;
 },
 methods:{
    save(){
        axios
        .post("/jobs/save/" + this.jobid)
        .then(success => alert("Амжилттай хадгаллаа"),(this.show = true))
        .catch(errors => alert("Алдаа гарлаа"));
    },
    unsave(){
        axios
        .post("/jobs/unsave/" + this.jobid)
        .then(success => alert("Амжилттай устгагдлаа"),(this.show = false))
        .catch(errors => alert("Алдаа гарлаа"));
    }
 }
};
</script>

<style>

</style>