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
                    <div style="display: flex;">
                        <v-select label="Khu Vực (*)" v-model="congty.id_khuvuc" outlined item-text="ten_khu_vuc" item-value="id_khuvuc" :items="khuvuc"></v-select>
                        <v-text-field label="Mã Công Ty (*)"  outlined v-model="congty.ma_cong_ty"></v-text-field>
                        <v-text-field label="Tên Công Ty (*)"  outlined v-model="congty.ten_cong_ty"></v-text-field>
                        <v-text-field label="Hidden"  outlined v-model="congty.hidden"></v-text-field>
                    </div>
                    <v-footer class="pb-10" absolute color="white" style="display: flex; justify-content: space-evenly">
                        <v-btn x-large color="success" @click="update()">Lưu</v-btn>
                        <v-btn x-large color="success" @click="home()">Trở Lại</v-btn>
                    </v-footer>
            </v-card>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            khuvuc: [
            ],
            congty: {},
        }
    },
    created() {
        this.axios.get(`/api/get-one-cong-ty/${this.$route.params.id_congty}`)
            .then((response) => {
                console.log(response.data.data[0]);
                this.congty = response.data.data[0];
            })
            .catch((error) => {
                console.log(error);
            });
        this.axios.get('/api/get-all-khu-vuc')
            .then((response) => {
                console.log(response.data.data);
                this.khuvuc = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
    },
    watch() {

    },
    methods: {
        home() {
            this.$router.push({ path: '/home/danh-sach-cong-ty' });
        },
        update() {
            let formData = new FormData();
            formData.append('id_congty', this.congty.id_congty);
            formData.append('id_khuvuc', this.congty.id_khuvuc);
            formData.append('ma_cong_ty', this.congty.ma_cong_ty);
            formData.append('ten_cong_ty', this.congty.ten_cong_ty);
            formData.append('hidden', this.congty.hidden);
            this.axios.post(`/api/update-cong-ty/${this.$route.params.id_congty}`, formData)
                .then((response) => {
                    this.$router.push({path: '/home/danh-sach-cong-ty'});
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }

}
</script>