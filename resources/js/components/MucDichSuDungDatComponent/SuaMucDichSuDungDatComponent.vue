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
                <v-form @submit.prevent="updateMucDichSuDungDat()" v-model="valid">
                    <div style="display: flex;">
                        <v-text-field v-model="mdsdd.ky_hieu" label="Ký Hiệu (*)" :rules="rules" hide-details="auto" outlined></v-text-field>
                        <v-text-field label="Hiện Trạng" :rules="rules" hide-details="auto" outlined v-model="mdsdd.hien_trang"></v-text-field>
                        <v-text-field label="Diễn Giải" :rules="rules" hide-details="auto" outlined v-model="mdsdd.dien_giai"></v-text-field>
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
            mdsdd: {},
            valid: true,
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
        }
    },
    created(){
        this.axios.get(`/api/get-one-muc-dich-su-dung-dat/${this.$route.params.id_mucdichsudungdat}`)
            .then((response) => {
                this.mdsdd = response.data[0];
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
        updateMucDichSuDungDat(){
            let formData = new FormData();
            formData.append('ky_hieu', this.mdsdd.ky_hieu);
            formData.append('hien_trang', this.mdsdd.hien_trang);
            formData.append('dien_giai', this.mdsdd.dien_giai);
            this.axios.post(`/api/update-muc-dich-su-dung-dat/${this.$route.params.id_mucdichsudungdat}`, formData)
                .then((response) => {
                    this.home();
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-muc-dich-su-dung-dat' });
        }
    }

}
</script>