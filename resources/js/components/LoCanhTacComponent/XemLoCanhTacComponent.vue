<template>
    <div>
        <div style="padding: 0px 10px 10px 10px;">
            <div class="elevation-4" style="height: 60px;">
                <v-row style="width: 100%;">
                    <v-col cols="6" style="display: flex; justify-content: center;">
                        <b style="color: darkgreen; font-size: 30px;">{{ $route.meta.nameID }}</b>
                    </v-col>
                </v-row>
            </div>
        </div>
        <div style="margin: 0; padding: 20px; width: 100%; height: calc(100vh - 230px); overflow: scroll">
            <v-card elavation="7"
                style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                <v-form @submit.prevent="addLoCanhTac()" v-model="valid">
                    <div style="display: flex;">
                        <v-text-field readonly label="ID Lô Canh Tác (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.id_lo_canh_tac"></v-text-field>
                        <v-text-field readonly label="Kí Hiệu Hiện Trạng Vườn Cây (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.kh_htvc"></v-text-field>
                        <v-text-field readonly label="Mã Nông Trường (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ma_nong_truong"></v-text-field>
                        <v-text-field readonly label="Ký Hiệu Phân Loại (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.kh_pl"></v-text-field>
                        <v-text-field readonly label="Mã Lô(*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ma_lo"></v-text-field>
                        <v-text-field readonly label="Thứ Tự (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.thu_tu"></v-text-field>
                        <v-text-field readonly label="Năm Trồng (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.nam_trong"></v-text-field>
                        <v-text-field readonly label="Tên Lô Cũ (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ten_lo_cu"></v-text-field>
                        <v-text-field readonly label="Tên Lô Mới (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ten_lo_moi"></v-text-field>
                        <v-text-field readonly label="Giá Trị Phân Loại (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.gia_tri_phan_loai"></v-text-field>
                        <v-text-field readonly label="hang_dat (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.hang_dat"></v-text-field>
                        <v-text-field readonly label="ct_thap (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ct_thap"></v-text-field>
                        <v-text-field readonly label="ct_cao (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ct_cao"></v-text-field>
                        <v-text-field readonly label="Phương Pháp Trồng (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.pp_trong"></v-text-field>
                        <v-text-field readonly label="Khoảng Cách Trồng (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.khoang_cach_trong"></v-text-field>
                        <v-text-field readonly label="Mật Độ Thiết Kế (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.mat_do_thiet_ke"></v-text-field>
                        <v-text-field readonly label="Giống Cây (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.giong_cay"></v-text-field>
                        <v-text-field readonly label="mat_do_ghep_vuon_tc (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.mat_do_ghep_vuon_tc"></v-text-field>
                        <v-text-field readonly label="ngay_ket_thuc_trong_vuon_tc (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ngay_ket_thuc_trong_vuon_tc"></v-text-field>
                    </div>
                    <v-footer class="pb-10" absolute color="white" style="display: flex; justify-content: space-evenly">
                        <v-btn x-large color="error" @click="home()">Trở Về</v-btn>
                    </v-footer>
                </v-form>
            </v-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            lct: {},
        }
    },
    created() {
        this.axios.get(`/api/get-one-lo-canh-tac/${this.$route.params.id_lo_canh_tac}`)
            .then((response) => {
                this.lct = response.data[0];
            })
            .catch((error) => {
                console.log(error);
            })
    },
    watch() {

    },
    methods: {
        home() {
            this.$router.push({ path: '/home/danh-sach-lo-canh-tac' });
        }
    }

}
</script>