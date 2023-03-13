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
            <v-card elavation="7" style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                <v-form @submit.prevent="addHienTrangVuonCay()" v-model="valid">
                    <div style="display: flex;">
                        <v-text-field label="ID Hiện Trạng Vườn Cây (*)" :rules="rules" hide-details="auto" outlined v-model="id_hien_trang_vuon_cay"></v-text-field>
                        <v-text-field v-model="ky_hieu" label="Ký Hiệu (*)" :rules="rules" hide-details="auto" outlined></v-text-field>
                        <v-text-field label="Diễn Giải" :rules="rules" hide-details="auto" outlined v-model="dien_giai"></v-text-field>
                    </div>
                    <v-footer class="pb-10" absolute color="white" style="display: flex; justify-content: space-evenly">
                        <v-btn :disabled="!valid" x-large type="submit" color="success" @click="validate">Thêm</v-btn>
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
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
        }
    },
    created(){
    },      
    watch() {

    },
    methods: {
        validate() {
            this.refs.form.validate();
        },
        addHienTrangVuonCay(){
            let formData = new FormData();
            formData.append('id_hien_trang_vuon_cay', this.id_hien_trang_vuon_cay);
            formData.append('ky_hieu', this.ky_hieu);
            formData.append('dien_giai', this.dien_giai);
            this.axios.post('/api/create-hien-trang-vuon-cay', formData)
                .then((response) => {
                    this.home();
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-hien-trang-vuon-cay' });
        }
    }

}
</script>