<template>
    <v-container style="max-width: 100vw;">
        <v-row>
            <v-col cols="10" style="padding: 0;">
                <div style="height: 70px; background-color: black; display: flex;">
                    <img src="https://api.rynan.vn/VDAPES/images/logo.png"
                        style="margin-left:30px ;width: auto; align-content: center; padding: 10px;">
                </div>
                <div style="height: 90px; margin: 0; padding: 0; ">
                    <div style="padding: 10px;">
                        <div class="elevation-4" style="height: 60px; padding-top: 10px;">
                            <b style="color: darkgreen; font-size: 20px;">{{ $route.meta.title }}</b>
                        </div>
                    </div>
                    
                </div>

                <router-view></router-view>

            </v-col>
            <v-col cols="2">
                <v-navigation-drawer absolute dark style="width: auto; height: 100vh;">
                    <template v-slot:prepend>
                        <v-list-item style="padding-left: 30px; padding-top: 20px;">
                            <v-list-item-avatar size="60">
                                <img
                                    src="data:image/jpeg;base64,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">
                            </v-list-item-avatar>
                            <v-list-item-content style="width: 200px;">
                                <v-list-item-title style="font-size: 13px;" ><b>{{ $cookies.get('name') }}</b></v-list-item-title>
                            </v-list-item-content>
                            <v-list-item-content>
                                <v-btn @click="logout()">
                                    <v-list-item-title><span class="fa fa-sign-out"></span></v-list-item-title>
                                </v-btn>
                            </v-list-item-content>
                        </v-list-item>
                    </template>

                    <v-divider></v-divider>

                    <template absolute>
                        <v-card class="mx-auto" width="300">
                            <v-list color="transparent">
                                <!-- <v-list-item>
                                    <v-list-item-icon>
                                        <v-icon>mdi-home</v-icon>
                                    </v-list-item-icon>
                                    <v-list-item-title>Home</v-list-item-title>
                                </v-list-item> -->
                                <v-list-group color="primary" :value="false">
                                    <template v-slot:activator>
                                        <v-list-item-title>Quản Lí Người Dùng</v-list-item-title>
                                    </template>
                                    <v-list-item :key="1" @click="changeTittle('Quản Lí Người Dùng / Danh Sách Người Dùng')"
                                        link href="/#/home/danh-sach-nguoi-dung" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Danh Sách Người
                                            Dùng</v-list-item-title>
                                        <!-- <v-list-item-icon>
                                            <v-icon v-text="icon"></v-icon>
                                        </v-list-item-icon> -->
                                    </v-list-item>
                                    <v-list-item :key="1" @click="changeTittle('Quản Lí Người Dùng / Thêm Người Dùng Mới')"
                                        link href="/#/home/tao-nguoi-dung" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Thêm Người
                                            Dùng Mới</v-list-item-title>
                                    </v-list-item>
                                </v-list-group>
                                <v-list-group :value="false">
                                    <template v-slot:activator>
                                        <v-list-item-title>Quản Lí Nông Trường</v-list-item-title>
                                    </template>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-cong-ty" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Công Ty</v-list-item-title>
                                    </v-list-item>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-nong-truong" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Nông Trường</v-list-item-title>
                                    </v-list-item>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-lo-canh-tac" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Lô Canh Tác</v-list-item-title>
                                    </v-list-item>
                                </v-list-group>
                                <v-list-group :value="false">
                                    <template v-slot:activator>
                                        <v-list-item-title>Định Nghĩa Kí Hiệu</v-list-item-title>
                                    </template>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-khu-vuc" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Khu Vực</v-list-item-title>
                                    </v-list-item>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-hien-trang-vuon-cay" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Hiện Trạng Vườn Cây</v-list-item-title>
                                    </v-list-item>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-muc-dich-su-dung-dat" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Mục Đích Sử Dụng
                                            Đất</v-list-item-title>
                                    </v-list-item>
                                    <v-list-item :key="1" link href="/#/home/danh-sach-phan-loai" class="pl-10">
                                        <v-list-item-title style="text-align: left;">Phân Loại</v-list-item-title>
                                    </v-list-item>
                                </v-list-group>
                            </v-list>
                        </v-card>
                    </template>
                    <v-footer absolute>
                        <img src="https://api.rynan.vn/VDAPES/images/logo.png" style="width: 100%;">
                    </v-footer>
                </v-navigation-drawer>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            name: this.$cookies.get('name'),
            title: '',
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
    mounted() {
        setTimeout(() => {this.name = this.$cookies.get('name')}, 1000)
        console.log(this.$cookies.get('name'))
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
        changeTittle(e) {
            this.title = e;
        },
        validate() {
            this.$refs.form.validate()
        },
        logout() {
            this.$cookies.remove('token');
            this.$cookies.remove('name');
            this.$cookies.remove('role');
            this.$router.push('/login');
        }
    }
}
</script>
<style>
.theme--dark.v-list {
    background-color: transparent !important;
}</style>