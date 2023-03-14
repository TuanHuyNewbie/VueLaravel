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
                        <v-text-field readonly label="ID Phân Loại (*)" hide-details="auto" outlined v-model="desserts.id_phan_loai"></v-text-field>
                        <v-text-field readonly label="Kí Hiệu Hiện Trạng Vườn Cây (*)" hide-details="auto" outlined
                            v-model="desserts.kh_htvc"></v-text-field>
                        <v-text-field readonly label="Kí Hiệu Mục Đích Sử Dụng Đất (*)" hide-details="auto" outlined
                            v-model="desserts.kh_mdsdd"></v-text-field>
                        <v-text-field readonly label="Kí Hiệu Phân Loại(*)" hide-details="auto" outlined
                            v-model="desserts.ky_hieu_phan_loai"></v-text-field>
                        <v-text-field readonly label="Diễn Giải" hide-details="auto" outlined
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
            desserts: {},
        }
    },
    created() {
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
        home() {
            this.$router.push({ path: '/home/danh-sach-phan-loai' });
        }
    }

}
</script>