
// CreatePost.vue

<template>
  <div>
    <h1>Create A User</h1>
    <form @submit.prevent="created">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name: </label>
            <input type="text" class="form-control" v-model="name">
          </div>
        </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
   export default {
      data() {
        return {
          name: []
        }
      },
      methods: {
        async created() {
        await this.axios.post('/api/create',{
          name: this.name
        })
        .then((response) => {
            this.$router.push({name: 'Get All User'});
        })
        .catch(function (error) {
            currentObj.output = error;
        });
      },
    }
  }
</script>
