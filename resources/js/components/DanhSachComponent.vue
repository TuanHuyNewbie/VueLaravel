<template>
    <v-container style="max-width: 100vw;">
        <v-row>
            <v-col cols="10" style="padding: 0; margin: 0;">
                <div style="height: 60px; background-color: darkcyan; display: flex;">
                    <v-row align="center" justify="space-around">
                        <v-btn><b>Tạo Người Dùng Mới</b></v-btn>
                        <v-btn><b>Hiển Thị Danh Sách Người Dùng</b></v-btn>
                    </v-row>
                </div>
                <div style="height: 60px; background-color: antiquewhite; display: flex;">
                    <v-row align="center" justify="space-around">
                        <b style="font-size: 30px;">Danh Sách Người Dùng</b>
                    </v-row>
                </div>
                <div style="height: calc(100vh - 120px); padding: 20px; margin: 0;">
                    <v-card elevation="7" width="100%" height="100%">
                        <v-card-text style="display: block; width: 100%; margin: 0; padding: 0;">
                            <v-card-title>
                            <v-spacer></v-spacer>
                            <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                                hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table style="display: block;" :headers="headers" :items="desserts" :items-per-page="5" :search="search" class="elevation-5">
                                <template v-slot:item.id_nguoi_dung="{ item }">
                                    <v-btn @click="changeAction"><v-icon>fa fa-list</v-icon></v-btn><br>
                                    <div v-show="action">
                                        <v-btn color="primary" @click=""><v-icon>fa fa-pencil</v-icon></v-btn>
                                        <v-btn color="error"><v-icon>fa fa-times</v-icon></v-btn>
                                    </div>
                                </template>
                            </v-data-table>
                        </v-card-text>
                    </v-card>
                </div>
            </v-col>
            <v-col cols="2" style="margin: 0; padding: 0;">
                <div style="height: 100vh; background-color: black;">
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    data() {
        return {
            action: false,
            search: '',
            headers: [
                { text: 'Họ và Tên', value: 'ho_ten' },
                { text: 'Hình Ảnh', value: 'hinh_anh' },
                { text: 'Ngày Sinh', value: 'ngay_sinh' },
                { text: 'Giới Tính', value: 'gioi_tinh' },
                { text: 'Chức Vụ', value: 'chuc_vu' },
                { text: 'Trạng Thái', value: 'trang_thai' },
                { text: 'Hành Động', value: 'id_nguoi_dung' }
            ],
            desserts: [
            ]
        }
    },
    watch: {

    },
    methods: {
        async getAllUser() {
            await this.axios.get('/api/get-all-nguoi-dung')
                .then((response) => {
                    this.desserts = response.data.data;
                })
                .catch(function (error) {
                    this.output = error;
                });
        },
        changeAction() {
            this.action = !this.action;
        },
        async upadteNguoiDung(id){
            await this.axios.post('/api/update-nguoi-dung', {
                id_nguoi_dung: id
            })
        }
    },
    async created() {
        await this.getAllUser();
    }
}
</script>