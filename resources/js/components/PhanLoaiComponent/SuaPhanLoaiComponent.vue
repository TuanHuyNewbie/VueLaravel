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
                <v-form @submit.prevent="editPhanLoai()" v-model="valid">
                    <div style="display: flex;">
                        <v-select item-text="ky_hieu" item-value="id_hien_trang_vuon_cay" :items="htvc"
                            label="Kí Hiệu Hiện Trạng Vườn Cây (*)" :rules="rules" hide-details="auto" outlined
                            v-model="desserts.id_hien_trang_vuon_cay"></v-select>
                        <v-select item-text="ky_hieu" item-value="id_muc_dich_su_dung_dat" :items="mdsdd"
                            label="Kí Hiệu Mục Đích Sử Dụng Đất (*)" :rules="rules" hide-details="auto" outlined
                            v-model="desserts.id_muc_dich_su_dung_dat"></v-select>
                        <v-text-field label="Kí Hiệu Phân Loại(*)" :rules="rules" hide-details="auto" outlined
                            v-model="desserts.ky_hieu_phan_loai"></v-text-field>
                        <v-text-field label="Diễn Giải" :rules="rules" hide-details="auto" outlined
                            v-model="desserts.dien_giai"></v-text-field>
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
            valid: true,
            htvc: [],
            mdsdd: [],
            desserts: {},
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
        this.axios.get('/api/get-all-muc-dich-su-dung-dat')
            .then((response) => {
                this.mdsdd = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
        this.axios.get(`/api/get-one-phan-loai/${this.$route.params.id_phanloai}`)
            .then((response) => {
                this.desserts = response.data.data[0];
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
        editPhanLoai() {
            let formData = new FormData();
            formData.append('id_hien_trang_vuon_cay', this.desserts.id_hien_trang_vuon_cay);
            formData.append('id_muc_dich_su_dung_dat', this.desserts.id_muc_dich_su_dung_dat);
            formData.append('ky_hieu_phan_loai', this.desserts.ky_hieu_phan_loai);
            formData.append('dien_giai', this.desserts.dien_giai);
            this.axios.post(`/api/update-phan-loai/${this.$route.params.id_phanloai}`, formData)
                .then((response) => {
                    this.home()
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-phan-loai' });
        }
    }

}
</script>