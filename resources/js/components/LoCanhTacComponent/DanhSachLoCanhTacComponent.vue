<template>
    <div>
        <div style="padding: 0px 10px 10px 10px;">
            <div class="elevation-4" style="height: 60px;">
                <v-row  style="width: 100%;">
                    <v-col cols="6" style="display: flex; justify-content: center;">
                        <b style="color: darkgreen; font-size: 30px;">{{ $route.meta.nameID }}</b>
                    </v-col>
                    <v-col cols="6" style="width: 100%; display: flex; justify-content: space-evenly;">
                        <v-btn style="background-color: green;"><b>+ Thêm Mới</b></v-btn>
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
                        <v-btn @click="changeAction(item.id_lo_canh_tac)"><v-icon>fa fa-list</v-icon></v-btn><br>
                        <div v-show="item.id_lo_canh_tac == idAction && action">
                            <v-btn color="green"><v-icon>fa fa-eye</v-icon></v-btn>
                            <v-btn color="primary"><v-icon>fa fa-pencil</v-icon></v-btn>
                            <v-btn color="error"><v-icon>fa
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
            idAction: '',
            action: false,
            search: '',
            desserts: [

            ],
            header: [
                { text: 'ID Lô Canh Tác', value: 'id_lo_canh_tac' },
                { text: 'ID Nông Trường', value: 'id_nong_truong' },
                { text: 'ID Hiện Trạng Vườn Cây', value: 'id_hien_trang_vuon_cay' },
                { text: 'ID Phân Loại', value: 'id_phan_loai' },
                { text: 'Mã Lô', value: 'ma_lo' },
                { text: 'Thứ Tự', value: 'thu_tu' },
                { text: 'Năm Trồng', value: 'nam_trong' },
                { text: 'Tên Lô Cũ', value: 'ten_lo_cu' },
                { text: 'Tên Lô Mới', value: 'ten_lo_moi' },
                { text: 'Giá Trị Phân Loại', value: 'gia_tri_phan_loai' },
                { text: 'hang_dat', value: 'hang_dat' },
                { text: 'ct_thap', value: 'ct_thap' },
                { text: 'ct_cao', value: 'ct_cao' },
                { text: 'Phương Pháp Trồng', value: 'pp_trong' },
                { text: 'Khoảng Cách Trồng', value: 'khoang_cach_trong' },
                { text: 'Mật Độ Thiết Kế', value: 'mat_do_thiet_ke' },
                { text: 'Giống Cây', value: 'giong_cay' },
                { text: 'mat_do_ghep_vuon_tc', value: 'mat_do_ghep_vuon_tc' },
                { text: 'ngay_ket_thuc_trong_vuon_tc', value: 'ngay_ket_thuc_trong_vuon_tc' },
                { text: 'Hành Động', value: 'action' }
            ]
        }
    },
    created() {
        this.axios.get('/api/get-all-lo-canh-tac')
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
        changeAction(e) {
            this.idAction = e;
            this.action = !this.action;
        }
    }

}
</script>