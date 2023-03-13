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
                <v-form @submit.prevent="editCompany()" v-model="valid">
                    <div style="display: flex;">
                        <v-text-field v-model="khuvuc.ten_khu_vuc" label="Tên Khu Vực (*)" :rules="rules" hide-details="auto" outlined></v-text-field>
                        <v-text-field label="Hidden" :rules="rules" outlined v-model="khuvuc.hidden"></v-text-field>
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
            khuvuc: {},
            valid: true,
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
        }
    },
    created(){
        this.axios.get(`/api/get-one-khu-vuc/${this.$route.params.id_khuvuc}`)
            .then((response) => {
                this.khuvuc = response.data[0];
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
        editCompany(){
            let formData = new FormData();
            formData.append('ten_khu_vuc', this.khuvuc.ten_khu_vuc);
            formData.append('hidden', this.khuvuc.hidden);
            this.axios.post(`/api/update-khu-vuc/${this.$route.params.id_khuvuc}`, formData)
                .then((response) => {
                    this.home();
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-khu-vuc' });
        }
    }

}
</script>