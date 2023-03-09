<template>
    <div style="padding: 20px;">
        <v-card elevation="7" width="100%" height="100%">
            <v-card-text style="width: 100%; margin: 0; padding: 0;">
                <v-card-title>
                    <v-spacer></v-spacer>
                    <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                        hide-details></v-text-field>
                </v-card-title>
                <v-data-table :headers="headers" :items="desserts" :items-per-page="5" :search="search" class="elevation-5">
                    <template v-slot:item.hinh_anh="{ item }">
                        <v-avatar size="50" tile>
                            <v-img style="width: 100px; height: 100px;" :src="'/img/'+item.hinh_anh"/>
                        </v-avatar>
                    </template>
                    <template v-slot:item.id_nguoi_dung="{ item }">
                        <v-btn @click="changeAction(item.id_nguoi_dung)"><v-icon>fa fa-list</v-icon></v-btn><br>
                        <div v-show="item.id_nguoi_dung === idAction && action">
                            <v-btn color="primary" @click="update(item.id_nguoi_dung)"><v-icon>fa fa-pencil</v-icon></v-btn>
                            <v-btn color="error"><v-icon>fa fa-times</v-icon></v-btn>
                        </div>
                        <!-- <v-menu offset-y>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn  v-bind="attrs"
                                v-on="on"><v-icon>fa fa-list</v-icon></v-btn>
                               
                            </template>
                            <v-list>
                                <v-btn color="primary" @click="checkId(item.id_nguoi_dung)"><v-icon>fa fa-pencil</v-icon></v-btn>
                            <v-btn color="error"><v-icon>fa fa-times</v-icon></v-btn>
                            </v-list>
                            </v-menu> -->
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            idAction:'',
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
        checkId(e){
            console.log(e);
        },
        async getAllUser() {
            await this.axios.get('/api/get-all-nguoi-dung')
                .then((response) => {
                    this.desserts = response.data.data;

                    this.desserts.forEach(function (e, i) {
                        this.desserts[i].showMenu = false;
                    })
                })
                .catch(function (error) {
                    this.output = error;
                });
        },
        // changeAction(id_nguoi_dung) {
        //     let _this = this;
        //     _this.desserts.forEach(function (e, i) {
        //         if (e.id_nguoi_dung == id_nguoi_dung) {
        //             _this.desserts[i].showMenu = true;
        //         }
        //     })
        // },
        changeAction(e){
            this.idAction = e;
            this.action = !this.action;
        },
        async upadteNguoiDung(id) {
            await this.axios.post('/api/update-nguoi-dung', {
                id_nguoi_dung: id
            })
        },
        update(id) {
            console.log(id);
            this.$router.push({ path: `cap-nhat-nguoi-dung/${id}`, params:{ id_nguoi_dung: id } });
        }
    },
    async created() {
        await this.getAllUser();
    }
}
</script>