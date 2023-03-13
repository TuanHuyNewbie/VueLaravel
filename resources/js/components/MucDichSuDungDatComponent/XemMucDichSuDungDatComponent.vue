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
                        <v-text-field readonly label="ID Mục Đích Sử Dụng Đất (*)" :rules="rules" hide-details="auto" outlined v-model="mdsdd.id_muc_dich_su_dung_dat"></v-text-field>
                        <v-text-field readonly v-model="mdsdd.ky_hieu" label="Ký Hiệu (*)" :rules="rules" hide-details="auto" outlined></v-text-field>
                        <v-text-field readonly label="Hiện Trạng" :rules="rules" hide-details="auto" outlined v-model="mdsdd.hien_trang"></v-text-field>
                        <v-text-field readonly label="Diễn Giải" :rules="rules" hide-details="auto" outlined v-model="mdsdd.dien_giai"></v-text-field>
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
            mdsdd: {},
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
        home() {
            this.$router.push({ path: '/home/danh-sach-muc-dich-su-dung-dat' });
        }
    }

}
</script>