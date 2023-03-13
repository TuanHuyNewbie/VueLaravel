<template>
    <div>
        <div style="padding: 0px 10px 10px 10px;">
            <div class="elevation-4" style="height: 60px;">
                <v-row  style="width: 100%;">
                    <v-col cols="6" style="display: flex; justify-content: center;">
                        <b style="color: darkgreen; font-size: 30px;">{{ $route.meta.nameID }}</b>
                    </v-col>
                    <v-col cols="6" style="width: 100%; display: flex; justify-content: space-evenly;">
                        <v-btn style="background-color: green;" @click="addKhuVuc()"><b>+ Thêm Mới</b></v-btn>
                        <v-btn style="background-color: green;"><b>Xuất File Excel</b></v-btn>
                        <v-btn style="background-color: green;"><b>Nhập File Excel</b></v-btn>
                    </v-col>
                </v-row>
            </div>
        </div>
    <div style="margin: 0; padding: 20px; width: 100%; height: calc(100vh - 230px); overflow: scroll">
        <v-card elavation="7" style="width: 100%; height: 100%;">
            <v-card-title>
                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                    hide-details></v-text-field>
            </v-card-title>
            <v-data-table :headers="header" :items="desserts" :items-per-page="5" :search="search" class="elevation-5">
                <template v-slot:item.hinh_anh="{ item }">
                    <v-avatar size="50" tile>
                        <v-img style="width: 100px; height: 100px;" :src="'/img/' + item.hinh_anh" />
                    </v-avatar>
                </template>
                <template v-slot:item.action="{ item }">
                    <v-btn @click="changeAction(item.id_khuvuc)"><v-icon>fa fa-list</v-icon></v-btn><br>
                    <div v-show="item.id_khuvuc == idAction && action">
                        <v-btn color="green"><v-icon>fa fa-eye</v-icon></v-btn>
                        <v-btn color="primary" @click="editKhuVuc(item.id_khuvuc)"><v-icon>fa fa-pencil</v-icon></v-btn>
                        <v-btn color="error" @click="deleteKhuVuc(item.id_khuvuc)"><v-icon>fa
                                fa-times</v-icon></v-btn>
                    </div>
                </template>
            </v-data-table>
        </v-card>
    </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                idAction: '',
                action: false,
                search: '',
                desserts: [

                ],
                header: [
                    {text: 'ID Khu Vực', value: 'id_khuvuc'},
                    {text: 'Tên Khu Vực', value: 'ten_khu_vuc'},
                    {text: 'Hành Động', value: 'action'}
                ]
            }
        },
        created(){
            this.axios.get('/api/get-all-khu-vuc')
                .then((response) => {
                    this.desserts = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        watch(){

        },
        methods: {
            getAllKhuVuc(){
                this.axios.get('/api/get-all-khu-vuc')
                .then((response) => {
                    this.desserts = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            changeAction(e){
                this.idAction = e;
                this.action = !this.action;
            },
            addKhuVuc(){
                this.$router.push({path: 'them-khu-vuc'});
            },
            editKhuVuc(id){
                this.$router.push({path: `sua-khu-vuc/${id}`});
            },
            deleteKhuVuc(id){
                this.axios.delete(`/api/delete-khu-vuc/${id}`)
                    .then((response) => {
                        this.getAllKhuVuc();
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            },
        }

    }
</script>