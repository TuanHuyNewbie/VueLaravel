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
                <div style="display: flex;">
                    <v-text-field label="ID Công Ty (*)" readonly outlined v-model="congty.id_congty"></v-text-field>
                    <v-text-field label="Tên Khu Vực (*)" readonly outlined v-model="congty.ten_khuvuc"></v-text-field>
                    <v-text-field label="Mã Công Ty (*)" readonly outlined v-model="congty.ma_cong_ty"></v-text-field>
                    <v-text-field label="Tên Công Ty (*)" readonly outlined v-model="congty.ten_cong_ty"></v-text-field>
                    <v-text-field label="Hidden" readonly outlined v-model="congty.hidden"></v-text-field>
                </div>
                <v-footer class="pb-10" absolute color="white" style="display: flex; justify-content: space-evenly">
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
            khuvuc: [],
            congty: {},
        }
    },
    async created() {
        await this.axios.get('/api/get-all-khu-vuc')
            .then((response) => {
                this.khuvuc = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        await this.axios.get(`/api/get-one-cong-ty/${this.$route.params.id_congty}`)
            .then((response) => {
                this.congty = response.data.data[0];
                Promise.all(
                this.khuvuc.forEach((khuvucs) => {
                    if (this.congty.id_khuvuc == khuvucs.id_khuvuc) {
                        this.congty.ten_khuvuc = khuvucs.ten_khu_vuc;
                    }
                }));
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
        }
    }

}
</script>