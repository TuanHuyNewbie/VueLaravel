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
                        <v-text-field label="ID Khu Vực (*)" :rules="rules" hide-details="auto" outlined v-model="id_khuvuc"></v-text-field>
                        <v-text-field v-model="ten_khu_vuc" label="Tên Khu Vực (*)" :rules="rules" hide-details="auto" outlined></v-text-field>
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
        addCompany(){
            let formData = new FormData();
            formData.append('id_khuvuc', this.id_khuvuc);
            formData.append('ten_khu_vuc', this.ten_khu_vuc);
            formData.append('hidden', this.hidden);
            this.axios.post('/api/create-khu-vuc', formData)
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