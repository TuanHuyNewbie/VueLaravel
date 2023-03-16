<template>
    <div>
        <div style="padding: 0px 10px 10px 10px;">
            <div class="elevation-4" style="height: 60px;">
                <v-row style="width: 100%;">
                    <v-col cols="6" style="display: flex; justify-content: center;">
                        <b style="color: darkgreen; font-size: 30px;">{{ $route.meta.nameID }}</b>
                    </v-col>
                    <v-col cols="6" style="width: 100%; display: flex; justify-content: space-evenly;">
                        <v-btn :disabled="disAble" style="background-color: green;" @click="addPhanLoai()"><b>+ Thêm
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
                    <template v-slot:item.hinh_anh="{ item }">
                        <v-avatar size="50" tile>
                            <v-img style="width: 100px; height: 100px;" :src="'/img/' + item.hinh_anh" />
                        </v-avatar>
                    </template>
                    <template v-slot:item.action="{ item }">
                        <v-btn @click="changeAction(item.id_phan_loai)"><v-icon>fa fa-list</v-icon></v-btn><br>
                        <div v-show="item.id_phan_loai == idAction && action">
                            <v-btn color="green" @click="reviewPhanLoai(item.id_phan_loai)"><v-icon>fa
                                    fa-eye</v-icon></v-btn>
                            <v-btn :disabled="disAble" color="primary" @click="editPhanLoai(item.id_phan_loai)"><v-icon>fa
                                    fa-pencil</v-icon></v-btn>
                            <v-btn :disabled="disAble" color="error"><v-icon>fa
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
            idAction: '',
            action: false,
            search: '',
            htvc: [],
            mdsdd: [],
            desserts: [

            ],
            header: [
                { text: 'ID Phân Loại', value: 'id_phan_loai' },
                { text: 'Hiện Trạng Vườn Cây (Kí Hiệu)', value: 'kh_htvc' },
                { text: 'Mục Đích Sử Dụng Đất (Kí Hiệu)', value: 'kh_mdsdd' },
                { text: 'Ký Hiệu Phân Loại', value: 'ky_hieu_phan_loai' },
                { text: 'Diễn Giải', value: 'dien_giai' },
                { text: 'Hành Động', value: 'action' }
            ]
        }
    },
    created() {
        this.role != 1 ? this.disAble = true : this.disAble = false;
        this.axios.get('/api/get-all-phan-loai')
            .then((response) => {
                this.desserts = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
    },
    watch() {

    },
    methods: {
        async getAllPhanLoai() {
            this.role != 1 ? this.disAble = true : this.disAble = false;
            this.axios.get('/api/get-all-phan-loai')
                .then((response) => {
                    this.desserts = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        exportToExCel() {
            let data = []
            this.desserts.forEach((dessert) => {
                let obj = {
                    "ID Phân Loại": dessert.id_phan_loai,
                    "Ký Hiệu Hiện Trạng Vườn Cây": dessert.kh_htvc,
                    "Ký Hiệu Mục Đích Sử Dụng Đất": dessert.kh_mdsdd,
                    "Ký Hiệu Phân Loại": dessert.ky_hieu_phan_loai,
                    "Diễn Giải": dessert.dien_giai,
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
        addPhanLoai() {
            this.$router.push({ path: 'them-phan-loai' });
        },
        editPhanLoai(id) {
            this.$router.push({ path: `sua-phan-loai/${id}` });
        },
        reviewPhanLoai(id) {
            this.$router.push({ path: `xem-phan-loai/${id}` });
        },
        deletePhanLoai(id) {
            this.axios.delete(`/api/delete-phan-loai/${id}`)
                .then((response) => {
                    this.getAllPhanLoai();
                })
                .catch((error) => {
                    console.log(error);
                })
        },

    }

}
</script>