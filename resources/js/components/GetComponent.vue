//Get User
<template>
    <div>
        <div id="stress" class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default" style="font-size: 50px;" @click="createUser">Create User</button>
        <!-- <button type="button" class="btn btn-default" style="font-size: 50px;">Middle</button>
                        <button type="button" class="btn btn-default" style="font-size: 50px;">Right</button> -->
        </div>
        <div class="col-lg-6">
            <div class="input-group">

                <v-text-field label="Search" @keydown.enter="pagination()" v-model="textSearch" outlined dense
                    style="width: 400px; margin-top: 2%; margin-left: 20%;"></v-text-field>
                <!-- <v-btn @click="searchUser" style="margin-top: 2%;">Search</v-btn> -->
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>
                        <!-- <button @click="$router.push({name:'edit',  params: { id: user.id }})"></button> -->
                        <router-link :to="{ name: 'Edit User', params: { id: user.id } }"
                            class="btn btn-primary">Edit</router-link>
                    </td>
                    <!-- <td> <router-link :to="{name: 'Edit User', params: { id: user.id }}" class="btn btn-danger">Delete</router-link></td> -->
                    <td><button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-5">
                <!-- <div style="box-decoration-break: inherit;"> -->
                <!-- <select v-model="selected1" style="color: darkblue; margin-left: 500px; width: 50px;">
                    <option>2</option>
                    <option>5</option>
                    <option>All</option>
                </select> -->
                <v-select
                    :items="['2', 5]"
                    label="Standard"
                ></v-select>
            </div>
            <div class="col-md-7">
                <v-pagination v-model="page" :length="selectedLimit"></v-pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: [],
            textSearch: '',
            page: 1,
            limit: '10',
            selected1: 5,
            selectedLimit: 0
        }
    },
    watch: {
        selected1(e) {
            this.pagination()
        },
        page(e) {
            this.pagination()
        },
    },
    methods: {
        async getAllUser() {
            await this.axios.get('/api/get-all-user')
                .then(({ data }) => {
                    this.users = data['data'];
                })
                .catch(function (error) {
                    this.output = error;
                });
        },
        async deleteUser(id) {
            await this.axios.delete(`/api/delete-user/${id}`)
                .then(({ data }) => {
                    this.getAllUser()
                })
        },
        createUser() {
            this.$router.push({ name: 'Create' })
        },
        async pagination() {
            let param = {}
            param.TextSearch = this.textSearch ? this.textSearch : null
            param.Page = this.page ? this.page : 1
            param.PageLimit = this.selected1 ? this.selected1 : 5
            await this.axios.get('/api/get-page', { params: param })
                .then((response) => {
                    this.users = response.data.data;
                    this.selectedLimit = response.data.last_page;
                })
        },
    },
    async created() {
        await this.pagination();
    },
}

</script>

<style>
#stress {
    left: 40%;
    margin-top: 4%;
}
</style>
