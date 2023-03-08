<template>
    <v-container style="max-width: 100vw;">
        <v-row>
            <v-col cols="10" style="padding: 0; margin: 0;">
                <div style="height: 60px; background-color: darkcyan; display: flex;">
                    <v-row align="center" justify="space-around">
                        <v-btn><b>Tạo Người Dùng Mới</b></v-btn>
                        <v-btn><b>Hiển Thị Danh Sách Người Dùng</b></v-btn>
                    </v-row>
                </div>
                <div style="height: 60px; background-color: antiquewhite; display: flex;">
                    <v-row align="center" justify="space-around">
                        <b style="font-size: 30px;">Tạo Người Dùng Mới</b>
                    </v-row>
                </div>
                <div style="height: calc(100vh - 120px); padding: 20px; margin: 0;">
                    <v-card elevation="7" width="100%" height="100%">
                        <v-card-text style="display: block; width: 100%; margin: 0; padding: 0;">
                            <v-form @submit.prevent="created" v-model="valid">
                                <div>
                                    <v-row style="margin: 0; padding: 0; width: 100%;" justify="space-around">
                                        <v-col>
                                            <v-row>
                                                <v-col align-self="center">
                                                    <p class="text-h5 text--primary">
                                                        Tên Đăng Nhập:
                                                    </p>
                                                </v-col>
                                                <v-col align-self="center">
                                                    <v-text-field type="text" v-model="ten_dang_nhap" label="Tên Đăng Nhập"
                                                        :rules="rules">
                                                    </v-text-field>
                                                </v-col>
                                            </v-row>
                                            <v-row>
                                                <v-col align-self="center">
                                                    <p class="text-h5 text--primary">
                                                        Mật Khẩu:
                                                    </p>
                                                </v-col>
                                                <v-col align-self="center">
                                                    <v-text-field type="password" v-model="mat_khau" label="Mật Khẩu"
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
                                                    <v-file-input :rules="rules" label="File input" filled
                                                        prepend-icon="mdi-camera" v-model="hinh_anh"></v-file-input>
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
                                                    <v-text-field type="text" v-model="ho_va_ten" label="Họ Và Tên"
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
                                                    <v-text-field type="date" :rules="rules" v-model="ngay_sinh">
                                                    </v-text-field>
                                                </v-col>
                                            </v-row>
                                            <v-row>
                                                <v-col align-self="center">
                                                    <p class="text-h5 text--primary">
                                                        Giới Tính:
                                                    </p>
                                                </v-col>
                                                <v-col align-self="center">
                                                    <v-radio-group v-model="gioi_tinh">
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
                                                    <v-text-field type="text" v-model="chuc_vu" label="Chức Vụ"
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
                                                    <v-select v-model="trang_thai" item-text="trang_thai2"
                                                        :items="trang_thai1" label="Trạng Thái" outlined :rules="rules"
                                                        return-object></v-select>
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
            </v-col>
            <v-col cols="2" style="margin: 0; padding: 0;">
                <div style="height: 100vh; background-color: black;">
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    data() {
        return {
            valid: true,
            ten_dang_nhap: null,
            mat_khau: null,
            ho_va_ten: null,
            ngay_sinh: null,
            gioi_tinh: 'Nam',
            hinh_anh: null,
            chuc_vu: null,
            url: 'https://icons.veryicon.com/png/o/internet--web/iview-3-x-icons/md-contact.png',
            trang_thai1: [
                { value: '1', trang_thai2: 'Hoạt Động' },
                { value: '2', trang_thai2: 'Không Hoạt Động' },
            ],
            trang_thai: null,
            rules: [
                v => !!v || 'Không Để Trống Trường Này!',
            ]
        }
    },
    watch: {
        hinh_anh(e) {
            console.log(e);
            const file = e;
            if (this.hinh_anh == null) {
                this.url = 'https://icons.veryicon.com/png/o/internet--web/iview-3-x-icons/md-contact.png'
            } else { this.url = URL.createObjectURL(file); }
        }
    },
    methods: {
        async created() {
            let formData = new FormData();
            formData.append('ten_dang_nhap', this.ten_dang_nhap);
            formData.append('mat_khau', this.mat_khau);
            formData.append('ho_ten', this.ho_va_ten);
            formData.append('ngay_sinh', this.ngay_sinh);
            formData.append('gioi_tinh', this.gioi_tinh);
            formData.append('hinh_anh', this.hinh_anh);
            formData.append('chuc_vu', this.chuc_vu);
            formData.append('trang_thai', this.trang_thai.trang_thai2);
            await this.axios.post('/api/create-nguoi-dung', formData)
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