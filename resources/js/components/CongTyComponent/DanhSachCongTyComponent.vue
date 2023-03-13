<template>
    <div>
        <div style="padding: 0px 10px 10px 10px;">
            <div class="elevation-4" style="height: 60px;">
                <v-row style="width: 100%;">
                    <v-col cols="6" style="display: flex; justify-content: center;">
                        <b style="color: darkgreen; font-size: 30px;">{{ $route.meta.nameID }}</b>
                    </v-col>
                    <v-col cols="6" style="width: 100%; display: flex; justify-content: space-evenly;">
                        <v-btn style="background-color: green;" @click="addCompany()"><b>+ Thêm Mới</b></v-btn>
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
                    <template v-slot>

                    </template>
                    <template v-slot:item.action="{ item }">
                        <v-btn @click="changeAction(item.id_congty)"><v-icon>fa fa-list</v-icon></v-btn><br>
                        <div v-show="item.id_congty == idAction && action">
                            <v-btn color="green" @click="previewCompany(item.id_congty)"><v-icon>fa fa-eye</v-icon></v-btn>
                            <v-btn color="primary" @click="editCompany(item.id_congty)"><v-icon>fa
                                    fa-pencil</v-icon></v-btn>
                            <v-btn color="error" @click="deleteCompany(item.id_congty)"><v-icon>fa
                                    fa-times</v-icon></v-btn>
                        </div>
                    </template>
                </v-data-table>
            </v-card>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            khuvuc: [],
            idAction: '',
            action: false,
            search: '',
            id_congty: '',
            desserts: [
            ],
            header: [
                { text: 'ID Công Ty', value: 'id_congty' },
                { text: 'Tên Khu Vực', value: 'ten_khuvuc' },
                { text: 'Mã Công Ty', value: 'ma_cong_ty' },
                { text: 'Tên Công Ty', value: 'ten_cong_ty' },
                { text: 'Hành Động', value: 'action' }
            ]
        }
    },
    async created() {
        await this.axios.get('/api/get-all-khu-vuc')
            .then((response) => {
                this.khuvuc = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        await this.axios.get('/api/get-all-cong-ty')
            .then((response) => {
                this.desserts = response.data.data;
                Promise.all(
                    this.desserts.forEach(async (dessert, index) => {
                        await this.khuvuc.forEach((khuvucs) => {
                            if (dessert.id_khuvuc == khuvucs.id_khuvuc)
                                this.desserts[index].ten_khuvuc = khuvucs.ten_khu_vuc;
                        });
                    }));
            })
            .catch((error) => {
                console.log(error);
            });
    },
    watch() {

    },
    methods: {
        async getAllCongTy() {
            await this.axios.get('/api/get-all-khu-vuc')
                .then((response) => {
                    this.khuvuc = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
            await this.axios.get('/api/get-all-cong-ty')
                .then((response) => {
                    this.desserts = response.data.data;
                    Promise.all(
                        this.desserts.forEach(async (dessert, index) => {
                            await this.khuvuc.forEach((khuvucs) => {
                                if (dessert.id_khuvuc == khuvucs.id_khuvuc)
                                    this.desserts[index].ten_khuvuc = khuvucs.ten_khu_vuc;
                            });
                        }));
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        changeAction(e) {
            this.idAction = e;
            this.action = !this.action;
        },
        addCompany() {
            this.$router.push({ path: 'them-cong-ty' });
        },
        previewCompany(id) {
            this.$router.push({ path: `xem-cong-ty/${id}` });
        },
        editCompany(id) {
            this.$router.push({ path: `sua-cong-ty/${id}` });
        },
        deleteCompany(id) {
            this.axios.delete(`/api/delete-cong-ty/${id}`)
                .then((response) => {
                    this.getAllCongTy();
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }

}
</script>