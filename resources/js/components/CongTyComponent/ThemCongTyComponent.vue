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
                <v-form @submit.prevent="addCompany()" v-model="valid">
                    <div style="display: flex;">
                        <v-text-field label="ID Công Ty (*)" :rules="rules" hide-details="auto" outlined v-model="id_congty"></v-text-field>
                        <v-select item-text="ten_khu_vuc" item-value="id_khuvuc" :items="khuvuc" label="Tên Khu Vực (*)" :rules="rules" hide-details="auto" outlined v-model="id_khuvuc"></v-select>
                        <v-text-field label="Mã Công Ty (*)" :rules="rules" hide-details="auto" outlined v-model="ma_cong_ty"></v-text-field>
                        <v-text-field label="Tên Công Ty (*)" :rules="rules" hide-details="auto" outlined v-model="ten_cong_ty"></v-text-field>
                        <v-text-field label="Hidden" :rules="rules" hide-details="auto" outlined v-model="hidden"></v-text-field>
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
            khuvuc: [],
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
        }
    },
    created(){
        this.axios('/api/get-all-khu-vuc')
            .then((response) => {
                this.khuvuc = response.data.data; 
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
        addCompany(){
            let formData = new FormData();
            formData.append('id_congty', this.id_congty);
            formData.append('id_khuvuc', this.id_khuvuc);
            formData.append('ma_cong_ty', this.ma_cong_ty);
            formData.append('ten_cong_ty', this.ten_cong_ty);
            formData.append('hidden', this.hidden);
            this.axios.post('/api/create-cong-ty', formData)
                .then((response) => {
                    this.$router.push({ path: '/home/danh-sach-cong-ty' });
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-cong-ty' });
        }
    }

}
</script>