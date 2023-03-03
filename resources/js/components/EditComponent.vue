
// CreatePost.vue

<template>
  <div>
    <h1>Update A User</h1>
    <form @submit.prevent="upadteUser">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name: </label>
            <input type="text" class="form-control" v-model="user.name"> 
          </div>
        </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
   export default {
      data() {
        return {
          user: {}
        }
      },
      created(){
        this.edit()
      },     
      
      methods: {
        async edit(){
        // const id = this.$route.params.id;
        await this.axios.get(`/api/get-one-user/${this.$route.params.id}`)
            .then((response) => {
                this.user = response.data;
            })
      },
        async upadteUser() {
        await this.axios.post(`/api/update-user/${this.$route.params.id}`,{
          name: this.user.name
        })
        .then((response)=>{
            this.$router.push({path: '/get-all-user'});
        })
        // .catch(function (error) {
        //     currentObj.output = error;
        // });
      },
    }
  }
</script>
