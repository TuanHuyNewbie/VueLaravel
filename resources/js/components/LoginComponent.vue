<template>
    <v-main
        style="background-image: url('https://alltop.vn/backend/media/images/posts/503/Canh_dong_lua_gan_voi_tuoi_tho_em-18491.jpg'); background-size: cover;">
        <v-toolbar-title style="display: flex; justify-content: center; padding-top: 80px;">
            <img src="https://api.rynan.vn/VDAPES/images/logo.png" style="width: 400px; height: 100px;">
        </v-toolbar-title>
        <div class="container d-flex align-center" style="padding-top: 100px;">
            <div class="row justify-content-center" style="padding-top: -200px;">
                <v-card dark class="pa-10" style="background-color: rgb(0,0,0,0.7)" width="600">
                    <v-card-title class="white--text">Đăng Nhập</v-card-title>
                    <v-form @submit.prevent="login()" v-model="valid">
                        <v-text-field v-model="username" :counter="30" :rules="usernameRules" label="Tên Đăng Nhập"
                            required></v-text-field>
                        <v-text-field v-model="password" :rules="passwordRules" label="Mật Khẩu" type="password"
                            required></v-text-field>
                        <v-checkbox v-model="checkbox" label="Ghi Nhớ Tài Khoản?"></v-checkbox>
                        <v-btn type="sunmit" color="success" class="mr-4">
                            Đăng Nhập
                        </v-btn>
                        <v-btn color="error" class="mr-4" @click="reset">
                            Nhập Lại
                        </v-btn>
                    </v-form>
                </v-card>
            </div>
        </div>
    </v-main>
</template>
<script>
import Cookies from 'js-cookie';
export default ({
    data: () => ({
        valid: true,
        username: '',
        usernameRules: [
            v => !!v || 'Tên Đăng Nhập Trống',
            v => (v && v.length <= 30) || 'Username must be less than 20 characters',
        ],
        password: '',
        passwordRules: [
            v => !!v || 'Mật Khẩu Trống',
            // v => !(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]^/.test(v)) || 'One capital latter, Special charater, Number'
            // v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        // checkbox: false,
    }),

    methods: {
        login() {
            let token = '';
            let formData = new FormData();
            formData.append('email', this.username);
            formData.append('password', this.password);
            this.axios.post('/api/login', formData)
                .then((response) => {
                    Cookies.set('token', response.data.token, { expires: 1 / 24 });
                    this.$router.push({ path: 'home' })
                    token = response.data.token
                })
                .catch((error) => {
                    console.log(1);
                })
            this.axios.get('/api/me', {
                headers: {
                    Authorization: 'Bearer ' + token
                }
            })
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        validate() {
            this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        },
    },
})
</script>
