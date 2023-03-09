<template>
    <div style="padding: 20px;">
        <v-card elevation="7">
            <v-card-text style="display: block; width: 100%; margin: 0; padding: 0;">
                <v-form @submit.prevent="created()" v-model="valid">
                    <div style="height: 69vh;">
                        <v-row style="margin: 0; padding: 0; width: 100%;" justify="space-around">
                            <v-col>
                                <!-- <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Tên Đăng Nhập:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-text-field type="text" v-model="nguoiDung.ten_dang_nhap" label="Tên Đăng Nhập"
                                            :rules="rules">
                                        </v-text-field>
                                    </v-col>
                                </v-row> -->
                                <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Mật Khẩu:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-text-field type="password" v-model="nguoiDung.mat_khau" label="Mật Khẩu"
                                            :rules="rules">
                                        </v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row class="pt-12" justify="space-around">
                                    <v-avatar size="190">
                                        <img v-if="url" :src="url">
                                    </v-avatar>
                                </v-row>
                                <v-row class="pt-8">
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Hình Ảnh:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-file-input :rules="rules" label="File input" filled prepend-icon="mdi-camera"
                                            v-model="hinh_anh"></v-file-input>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col style="max-width: 140px;"></v-col>
                            <v-col>
                                <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Họ và Tên:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-text-field type="text" v-model="nguoiDung.ho_ten" label="Họ Và Tên"
                                            :rules="rules">
                                        </v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Ngày Sinh:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-menu ref="menu" v-model="menu" :close-on-content-click="false"
                                            :return-value.sync="nguoiDung.ngay_sinh" transition="scale-transition">
                                            <template v-slot:activator="{ on, attrs }">
                                                <v-combobox v-model="nguoiDung.ngay_sinh" chips small-chips
                                                    label="Ngày Sinh" prepend-icon="mdi-calendar" readonly v-bind="attrs"
                                                    v-on="on" :rules="rules">
                                                </v-combobox>
                                            </template>
                                            <v-date-picker v-model="dates" color="rgba(255, 0, 0, 0.5)" no-title scrollable>
                                                <v-spacer></v-spacer>
                                                <v-btn text color="primary" @click="menu = false">
                                                    Cancel
                                                </v-btn>
                                                <v-btn text color="primary" @click="$refs.menu.save(dates)">
                                                    OK
                                                </v-btn>
                                            </v-date-picker>
                                        </v-menu>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Giới Tính:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-radio-group v-model="nguoiDung.gioi_tinh">
                                            <v-radio label="Nam" color="blue" value="Nam" selected></v-radio>
                                            <v-radio label="Nữ" color="red" value="Nữ"></v-radio>
                                            <v-radio label="Khác" color="teal" value="Khác"></v-radio>
                                        </v-radio-group>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Chức Vụ:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-text-field type="text" v-model="nguoiDung.chuc_vu" label="Chức Vụ"
                                            :rules="rules">
                                        </v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col align-self="center">
                                        <p class="text-h5 text--primary">
                                            Trạng Thái:
                                        </p>
                                    </v-col>
                                    <v-col align-self="center">
                                        <v-select v-model="ttt" item-text="trang_thai2" :items="trang_thai1"
                                            label="Trạng Thái" outlined :rules="rules" return-object></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-footer dark absolute height="80" style="">
                            <v-row align="center" justify="space-around">
                                <v-btn :disabled="!valid" type="submit" color="teal" @click="validate">
                                    Lưu Lại
                                </v-btn>
                                <v-btn color="teal">
                                    Quay Về
                                </v-btn>
                            </v-row>
                        </v-footer>
                    </div>
                </v-form>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dates: new Date().toISOString().substr(0, 10),
            ngay_sinh: '',
            menu: false,
            nguoiDung: {},
            valid: true,
            hinh_anh: '',
            url: 'https://icons.veryicon.com/png/o/internet--web/iview-3-x-icons/md-contact.png',
            trang_thai1: [
                { value: '1', trang_thai2: 'Hoạt Động' },
                { value: '2', trang_thai2: 'Không Hoạt Động' },
            ],
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ],
            ttt: null,
        }
    },
    async created() {
        await this.edit();
        // this.url = `../../../public/img/${this.nguoiDung.hinh_anh}`
        if (this.nguoiDung.trang_thai === 'Hoạt Động') {
            this.ttt = '1';
        } else {
            this.ttt = '2';
        }
    },
    watch: {
        hinh_anh(e) {
            const file = e;
            if (this.hinh_anh == null) {
                this.url = 'https://icons.veryicon.com/png/o/internet--web/iview-3-x-icons/md-contact.png'
            } else { this.url = URL.createObjectURL(file); }
        }
    },
    methods: {
        async edit() {
            await this.axios.get(`/api/get-one-nguoi-dung/${this.$route.params.id_nguoi_dung}`)
                .then((result) => {
                    this.nguoiDung = result.data[0];
                })
        },
        async created() {
            let formData = new FormData();
            // formData.append('ten_dang_nhap', this.ten_dang_nhap);
            formData.append('mat_khau', this.nguoiDung.mat_khau);
            formData.append('ho_ten', this.nguoiDung.ho_ten);
            formData.append('ngay_sinh', this.nguoiDung.ngay_sinh);
            formData.append('gioi_tinh', this.nguoiDung.gioi_tinh);
            formData.append('hinh_anh', this.nguoiDung.hinh_anh);
            formData.append('chuc_vu', this.nguoiDung.chuc_vu);
            formData.append('trang_thai', String(this.ttt.trang_thai2));
            await this.axios.post(`/api/update-nguoi-dung/${this.nguoiDung.id_nguoi_dung}`, formData)
                .then((result) => {
                    console.log(result);
                })
        },
        validate() {
            this.$refs.form.validate()
        },
    }
}
</script>