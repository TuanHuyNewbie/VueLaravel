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
                        <v-select item-text="ky_hieu" item-value="id_hien_trang_vuon_cay" :items="htvc"
                            label="Kí Hiệu Hiện Trạng Vườn Cây (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.id_hien_trang_vuon_cay"></v-select>
                        <v-select item-text="ma_nong_truong" item-value="id_nong_truong" :items="nt"
                            label="Mã Nông Trường (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.id_nong_truong"></v-select>
                        <v-select item-text="ky_hieu_phan_loai" item-value="id_phan_loai" :items="pl"
                            label="Ký Hiệu Phân Loại (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.id_phan_loai"></v-select>
                        <v-text-field label="Mã Lô(*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ma_lo"></v-text-field>
                        <v-text-field label="Thứ Tự (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.thu_tu"></v-text-field>
                        <v-text-field label="Năm Trồng (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.nam_trong"></v-text-field>
                        <v-text-field label="Tên Lô Cũ (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ten_lo_cu"></v-text-field>
                        <v-text-field label="Tên Lô Mới (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ten_lo_moi"></v-text-field>
                        <v-text-field label="Giá Trị Phân Loại (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.gia_tri_phan_loai"></v-text-field>
                        <v-text-field label="hang_dat (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.hang_dat"></v-text-field>
                        <v-text-field label="ct_thap (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ct_thap"></v-text-field>
                        <v-text-field label="ct_cao (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.ct_cao"></v-text-field>
                        <v-text-field label="Phương Pháp Trồng (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.pp_trong"></v-text-field>
                        <v-text-field label="Khoảng Cách Trồng (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.khoang_cach_trong"></v-text-field>
                        <v-text-field label="Mật Độ Thiết Kế (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.mat_do_thiet_ke"></v-text-field>
                        <v-text-field label="Giống Cây (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.giong_cay"></v-text-field>
                        <v-text-field label="mat_do_ghep_vuon_tc (*)" :rules="rules" hide-details="auto" outlined
                            v-model="lct.mat_do_ghep_vuon_tc"></v-text-field>
                        <v-menu ref="menu" v-model="menu" :close-on-content-click="false"
                                :return-value.sync="lct.ngay_ket_thuc_trong_vuon_tc" transition="scale-transition">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-combobox outlined v-model="lct.ngay_ket_thuc_trong_vuon_tc" chips small-chips label="Ngày Sinh (*)"
                                        readonly v-bind="attrs" v-on="on" :rules="rules">
                                    </v-combobox>
                                </template>
                                <v-date-picker v-model="dates" color="rgba(255, 0, 0, 0.5)" no-title scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="menu = false">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary" @click="$refs.menu.save(dates)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-menu>
                    </div>
                    <v-footer class="pb-10" absolute color="white" style="display: flex; justify-content: space-evenly">
                        <v-btn :disabled="!valid" x-large type="submit" color="success" @click="validate">Cập Nhật</v-btn>
                        <v-btn x-large color="error" @click="home()">Hủy</v-btn>
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
            dates: new Date().toISOString(),
            menu: false,
            valid: true,
            lct:{},
            htvc: [],
            nt: [],
            pl: [],
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
        }
    },
    created() {
        this.axios.get('/api/get-all-hien-trang-vuon-cay')
            .then((response) => {
                this.htvc = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
        this.axios.get('/api/get-all-nong-truong')
            .then((response) => {
                this.nt = response.data.data;

            })
            .catch((error) => {
                console.log(error);
            })
        this.axios.get('/api/get-all-phan-loai')
            .then((response) => {
                this.pl = response.data.data;

            })
            .catch((error) => {
                console.log(error);
            })
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
        validate() {
            this.refs.form.validate();
        },
        addLoCanhTac() {
            let formData = new FormData();
            formData.append('id_nong_truong', this.lct.id_nong_truong);
            formData.append('id_hien_trang_vuon_cay', this.lct.id_hien_trang_vuon_cay);
            formData.append('id_phan_loai', this.lct.id_phan_loai);
            formData.append('ma_lo', this.lct.ma_lo);
            formData.append('thu_tu', this.lct.thu_tu);
            formData.append('nam_trong', this.lct.nam_trong);
            formData.append('ten_lo_cu', this.lct.ten_lo_cu);
            formData.append('ten_lo_moi', this.lct.ten_lo_moi);
            formData.append('gia_tri_phan_loai', this.lct.gia_tri_phan_loai);
            formData.append('hang_dat', this.lct.hang_dat);
            formData.append('ct_thap', this.lct.ct_thap);
            formData.append('ct_cao', this.lct.ct_cao);
            formData.append('pp_trong', this.lct.pp_trong);
            formData.append('khoang_cach_trong', this.lct.khoang_cach_trong);
            formData.append('mat_do_thiet_ke', this.lct.mat_do_thiet_ke);
            formData.append('giong_cay', this.lct.giong_cay);
            formData.append('mat_do_ghep_vuon_tc', this.lct.mat_do_ghep_vuon_tc);
            formData.append('ngay_ket_thuc_trong_vuon_tc', this.lct.ngay_ket_thuc_trong_vuon_tc);
            this.axios.post(`/api/update-lo-canh-tac/${this.$route.params.id_lo_canh_tac}`, formData)
                .then((response) => {
                    this.home()
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-lo-canh-tac' });
        }
    }

}
</script>