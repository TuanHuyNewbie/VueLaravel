<template>
    <v-main style="background-image: url('https://alltop.vn/backend/media/images/posts/503/Canh_dong_lua_gan_voi_tuoi_tho_em-18491.jpg'); background-size: cover;">
        <v-toolbar-title style="display: flex; justify-content: center; padding-top: 80px;">
            <img src="https://api.rynan.vn/VDAPES/images/logo.png"
                style="width: 400px; height: 100px;">
        </v-toolbar-title>
        <div class="container d-flex align-center" style="padding-top: 100px;">
            <div class="row justify-content-center" style="padding-top: -200px;">
                <v-card dark class="pa-10" style="background-color: rgb(0,0,0,0.7)" width="600">
                    <v-card-title class="white--text">Đăng Nhập</v-card-title>
                    <v-form ref="form" v-model="valid" lazy-validation>
                        <v-text-field v-model="username" :counter="20" :rules="usernameRules" label="Tên Đăng Nhập"
                            required></v-text-field>
                        <v-text-field v-model="password" :rules="passwordRules" label="Mật Khẩu" type="password"
                            required></v-text-field>
                        <v-checkbox v-model="checkbox" :rules="[v => !!v || 'You must agree to continue!']"
                            label="Ghi Nhớ Tài Khoản?" required></v-checkbox>
                        <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">
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
export default ({
    // el: '#app',
    // vuetify: new Vuetify(),
    data: () => ({
        valid: true,
        username: '',
        usernameRules: [
            v => !!v || 'Tên Đăng Nhập Trống',
            v => (v && v.length <= 20) || 'Username must be less than 20 characters',
        ],
        password: '',
        passwordRules: [
            v => !!v || 'Mật Khẩu Trống',
            v => (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]^/.test(v)) || 'One capital latter, Special charater, Number'
            // v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        checkbox: false,
    }),

    methods: {
        validate() {
            this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        },
    },
})
</script>
