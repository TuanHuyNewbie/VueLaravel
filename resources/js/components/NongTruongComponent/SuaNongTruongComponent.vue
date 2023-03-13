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
                <v-form @submit.prevent="editNongTruong()" v-model="valid">
                    <div style="display: flex;">
                        <v-select item-text="ten_cong_ty" item-value="id_congty" :items="congty" label="Tên Công Ty (*)"
                            :rules="rules" hide-details="auto" outlined v-model="nongtruong.id_congty"></v-select>
                        <v-text-field label="Mã Nông Trường (*)" :rules="rules" hide-details="auto" outlined
                            v-model="nongtruong.ma_nong_truong"></v-text-field>
                        <v-text-field label="ID Công Ty (*)" :rules="rules" hide-details="auto" outlined
                            v-model="nongtruong.id_cong_ty"></v-text-field>
                        <v-text-field label="Hidden" :rules="rules" hide-details="auto" outlined
                            v-model="nongtruong.hidden"></v-text-field>
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
            valid: true,
            congty: [],
            nongtruong: {},
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
        }
    },
    created() {
        this.axios('/api/get-all-cong-ty')
            .then((response) => {
                this.congty = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            })
        this.axios.get(`/api/get-one-nong-truong/${this.$route.params.id_nongtruong}`)
            .then((response) => {
                this.nongtruong = response.data.data[0];
                Promise.all(
                    this.congty.forEach((congtys) => {
                        if (this.nongtruong.id_congty == congtys.id_congty) {
                            this.nongtruong.ten_cong_ty = congtys.ten_cong_ty;
                        }
                    })
                )
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
        editNongTruong() {
            let formData = new FormData();
            formData.append('id_congty', this.nongtruong.id_congty);
            formData.append('ma_nong_truong', this.nongtruong.ma_nong_truong);
            formData.append('id_cong_ty', this.nongtruong.id_cong_ty);
            formData.append('hidden', this.nongtruong.hidden);
            this.axios.post(`/api/update-nong-truong/${this.$route.params.id_nongtruong}`, formData)
                .then((response) => {
                    this.home()
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        home() {
            this.$router.push({ path: '/home/danh-sach-nong-truong' });
        }
    }

}
</script>