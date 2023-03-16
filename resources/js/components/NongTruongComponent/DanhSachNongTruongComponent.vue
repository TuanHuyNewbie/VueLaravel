<template>
    <div>
        <div style="padding: 0px 10px 10px 10px;">
            <div class="elevation-4" style="height: 60px;">
                <v-row style="width: 100%;">
                    <v-col cols="6" style="display: flex; justify-content: center;">
                        <b style="color: darkgreen; font-size: 30px;">{{ $route.meta.nameID }}</b>
                    </v-col>
                    <v-col cols="6" style="width: 100%; display: flex; justify-content: space-evenly;">
                        <v-btn :disabled="disAble" style="background-color: green;" @click="addNongTruong()"><b>+ Thêm
                                Mới</b></v-btn>
                        <v-btn @click="exportToExCel()" style="background-color: green;"><b>Xuất File Excel</b></v-btn>
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

                    <template v-slot:item.action="{ item }">
                        <v-btn @click="changeAction(item.id_nong_truong)"><v-icon>fa fa-list</v-icon></v-btn><br>
                        <div v-show="item.id_nong_truong == idAction && action">
                            <v-btn color="green" @click="reviewNongTruong(item.id_nong_truong)"><v-icon>fa
                                    fa-eye</v-icon></v-btn>
                            <v-btn :disabled="disAble" color="primary"
                                @click="editNongTruong(item.id_nong_truong)"><v-icon>fa fa-pencil</v-icon></v-btn>
                            <v-btn :disabled="disAble" color="error"
                                @click="deleteNongTruong(item.id_nong_truong)"><v-icon>fa
                                    fa-times</v-icon></v-btn>
                        </div>
                    </template>
                </v-data-table>
            </v-card>
        </div>
    </div>
</template>

<script>
import { json2excel, excel2json } from 'js2excel';
export default {
    data() {
        return {
            role: this.$cookies.get('role'),
            disAble: true,
            congty: [],
            idAction: '',
            action: false,
            search: '',
            desserts: [

            ],
            header: [
                { text: 'ID Nông Trường', value: 'id_nong_truong' },
                { text: 'Công Ty', value: 'ten_cong_ty' },
                { text: 'Mã Nông Trường', value: 'ma_nong_truong' },
                { text: 'Hành Động', value: 'action' }
                // {text: 'ID Công Ty', value: 'id_cong_ty'},
            ]
        }
    },
    created() {
        this.role != 1 ? this.disAble = true : this.disAble = false;
        this.axios.get('/api/get-all-cong-ty')
            .then((response) => {
                this.congty = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
        this.axios.get('/api/get-all-nong-truong')
            .then((response) => {
                this.desserts = response.data.data;
                Promise.all(
                    this.desserts.forEach((dessert, index) => {
                        this.congty.forEach((congtys) => {
                            if (dessert.id_congty == congtys.id_congty) {
                                this.desserts[index].ten_cong_ty = congtys.ten_cong_ty;
                            }
                        })
                    }))
                console.log(this.desserts)
            })
            .catch((error) => {
                console.log(error);
            })
    },
    watch() {

    },
    methods: {
        getAllNongTruong() {
            this.role != 1 ? this.disAble = true : this.disAble = false;
            this.axios.get('/api/get-all-cong-ty')
                .then((response) => {
                    this.congty = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
            this.axios.get('/api/get-all-nong-truong')
                .then((response) => {
                    this.desserts = response.data.data;
                    Promise.all(
                        this.desserts.forEach((dessert, index) => {
                            this.congty.forEach((congtys) => {
                                if (dessert.id_congty == congtys.id_congty) {
                                    this.desserts[index].ten_cong_ty = congtys.ten_cong_ty;
                                }
                            })
                        }))
                    console.log(this.desserts)
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        exportToExCel() {
            let data = []
            this.desserts.forEach((dessert) => {
                let obj = {
                    "ID Nông Trường": dessert.id_nong_truong,
                    "Công Ty": dessert.ten_cong_ty,
                    "Mã Nông Trường": dessert.ma_nong_truong,
                }
                data.push(obj);
            });
            try {
                json2excel({
                    data
                });
            } catch (e) {
                console.error(e);
            }
        },
        changeAction(e) {
            this.idAction = e;
            this.action = !this.action;
        },
        addNongTruong() {
            this.$router.push({ path: 'them-nong-truong' });
        },
        editNongTruong(id) {
            this.$router.push({ path: `sua-nong-truong/${id}` });
        },
        deleteNongTruong(id) {
            this.axios.delete(`/api/delete-nong-truong/${id}`)
                .then((response) => {
                    this.getAllNongTruong();
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        reviewNongTruong(id) {
            this.$router.push({ path: `xem-nong-truong/${id}` });
        }
    }

}
</script>