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
                <v-form @submit.prevent="editHienTrangVuonCay()" v-model="valid">
                    <div style="display: flex;">
                        <v-text-field readonly label="ID Hiện Trạng Vườn Cây (*)" :rules="rules" hide-details="auto" outlined v-model="htvc.id_hien_trang_vuon_cay"></v-text-field>
                        <v-text-field readonly v-model="htvc.ky_hieu" label="Ký Hiệu (*)" :rules="rules" hide-details="auto" outlined></v-text-field>
                        <v-text-field readonly label="Diễn Giải" :rules="rules" hide-details="auto" outlined v-model="htvc.dien_giai"></v-text-field>
                    </div>
                    <v-footer class="pb-10" absolute color="white" style="display: flex; justify-content: space-evenly">
                        <v-btn x-large color="error" @click="home()">Trở Lại</v-btn>
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
            htvc: {},
        }
    },
    created(){
        this.axios.get(`/api/get-one-hien-trang-vuon-cay/${this.$route.params.id_hientrangvuoncay}`)
            .then((response) => {
                this.htvc = response.data[0];
            })
            .catch((error) => {
                console.log(error);
            })
    },      
    watch() {

    },
    methods: {
        home() {
            this.$router.push({ path: '/home/danh-sach-hien-trang-vuon-cay' });
        }
    }

}
</script>