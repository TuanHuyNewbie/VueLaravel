<template>
    <v-main
        style="background-image: url('https://alltop.vn/backend/media/images/posts/503/Canh_dong_lua_gan_voi_tuoi_tho_em-18491.jpg'); background-size: cover;">
        <v-toolbar-title style="display: flex; justify-content: center; padding-top: 80px;">
            <img src="https://api.rynan.vn/VDAPES/images/logo.png" style="width: 400px; height: 100px;">
        </v-toolbar-title>
        <div class="container d-flex align-center" style="padding-top: 100px;">
            <div class="row justify-content-center" style="padding-top: -200px;">
                <v-card dark class="pa-10" style="background-color: rgb(0,0,0,0.7)" width="600">
                    <v-card-title class="white--text">Đăng Kí</v-card-title>
                    <v-form @submit.prevent="signUp()" v-model="valid">
                        <v-text-field v-model="username" :counter="30" :rules="usernameRules" label="Tên Đăng Nhập"
                            required></v-text-field>
                        <v-text-field v-model="password" :rules="passwordRules" label="Mật Khẩu" type="password"
                            required></v-text-field>
                        <v-text-field v-model="name" :rules="nameRules" label="Họ Và Tên"
                            required></v-text-field>
                        <v-btn type="sunmit" color="success" class="mr-4">
                            Đăng Kí
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
        name: '',
        nameRules: [
            v => !!v || 'Họ và tên trống',
        ]
        // checkbox: false,
    }),

    methods: {
        signUp() {
            let form = new FormData();
            form.append('email', this.username);
            form.append('password', this.password);
            form.append('name', this.name);
            console.log(this.username, this.password, this.name)
            axios.post('/api/signup', form)
                .then((response) => {
                        this.$router.push({path: 'login'});
                })
                .catch(error => {
                    console.log(error);
                })
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
