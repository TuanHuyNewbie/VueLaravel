<template>
    <div style=" width: 100%; padding: 20px;">
        <v-card elevation="7">
            <v-card-text style="margin: 0; padding: 0;">
                <v-form @submit.prevent="created" v-model="valid">
                    <div
                        style="display: flex; justify-content: center; width: 100%; align-content: space-between; flex-wrap: wrap; overflow: scroll;">
                        <div style="height: calc(100vh - 297px)">
                            <!-- <v-file-input :rules="rules" label="File input" filled prepend-icon="mdi-camera"
                                v-model="hinh_anh"> --><!-- </v-file-input> -->
                            <v-row class="pt-4">
                                <button @click="files()">
                                    <v-avatar reverse size="190">
                                        <v-img v-if="url" :src="url">
                                        </v-img>
                                    </v-avatar> 
                                    <v-file-input id="fileImage" hide-input style="opacity: 0;" type="file"
                                    v-model="hinh_anh"></v-file-input>
                                </button>
                            </v-row>
                            <v-row class="pt-4">
                                <v-text-field outlined type="text" v-model="ten_dang_nhap" label="Tên Đăng Nhập (*)"
                                    :rules="rules">
                                </v-text-field>
                            </v-row>
                            <v-row>
                                <v-text-field outlined type="password" v-model="mat_khau" label="Mật Khẩu (*)"
                                    :rules="rules">
                                </v-text-field>
                            </v-row>
                            <v-row>
                                <v-text-field outlined type="text" v-model="ho_va_ten" label="Họ Và Tên (*)" :rules="rules">
                                </v-text-field>
                            </v-row>
                            <v-row>
                                <v-menu ref="menu" v-model="menu" :close-on-content-click="false"
                                    :return-value.sync="ngay_sinh" transition="scale-transition">
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-combobox outlined v-model="ngay_sinh" chips small-chips label="Ngày Sinh (*)"
                                            readonly v-bind="attrs" v-on="on" :rules="rules">
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
                            </v-row>
                            <v-row>
                                <v-col cols="7">
                                    <p class="text-h6 text--primary">
                                        Giới Tính:
                                    </p>
                                </v-col>
                                <v-col cols="5">
                                    <v-radio-group v-model="gioi_tinh">
                                        <v-radio label="Nam" color="blue" value="Nam" selected></v-radio>
                                        <v-radio label="Nữ" color="red" value="Nữ"></v-radio>
                                        <v-radio label="Khác" color="teal" value="Khác"></v-radio>
                                    </v-radio-group>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-text-field outlined type="text" v-model="chuc_vu" label="Chức Vụ" :rules="rules">
                                </v-text-field>
                            </v-row>
                            <v-row>
                                <v-select v-model="trang_thai" item-text="trang_thai2" :items="trang_thai1"
                                    label="Trạng Thái" outlined :rules="rules" return-object></v-select>
                            </v-row>

                        </div>
                    </div>
                    <!-- <v-row style="margin: 0; padding: 0; width: 100%; height: calc(100vh - 357px)" justify="space-around">
                        <v-col>
                            <v-row>
                                <v-col align-self="center">
                                    <p class="text-h5 text--primary">
                                        Tên Đăng Nhập:
                                    </p>
                                </v-col>
                                <v-col align-self="center">
                                    <v-text-field type="text" v-model="ten_dang_nhap" label="Tên Đăng Nhập" :rules="rules">
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
                                    <v-text-field type="password" v-model="mat_khau" label="Mật Khẩu" :rules="rules">
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
                                    <v-text-field type="text" v-model="ho_va_ten" label="Họ Và Tên" :rules="rules">
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
                                        :return-value.sync="ngay_sinh" transition="scale-transition">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-combobox v-model="ngay_sinh" chips small-chips label="Ngày Sinh"
                                                prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"
                                                :rules="rules">
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
                                    <v-text-field type="text" v-model="chuc_vu" label="Chức Vụ" :rules="rules">
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
                                    <v-select v-model="trang_thai" item-text="trang_thai2" :items="trang_thai1"
                                        label="Trạng Thái" outlined :rules="rules" return-object></v-select>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row> -->
                    <div>
                        <v-footer dark abso style="height: 80px">
                            <v-row align="center" justify="space-around">
                                <v-btn :disabled="!valid" type="submit" color="teal" @click="validate">
                                    Lưu Lại
                                </v-btn>
                                <v-btn @click="home()" color="teal">
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
            dates: new Date().toISOString(),
            ngay_sinh: '',
            menu: false,
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
            if (this.hinh_anh == null) {
                this.hinh_anh = 'https://icons.veryicon.com/png/o/internet--web/iview-3-x-icons/md-contact.png'
            }

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
                    this.$router.push({ path: 'danh-sach-nguoi-dung' });
                })
        },
        files(){
            document.getElementById('fileImage').click();
        },
        validate() {
            this.$refs.form.validate()
        },
        home(){
            this.$router.push({ name: 'Danh Sach Nguoi Dung' });
        }
    }
}
</script>