<template>
    <div class="container d-flex align-center fill-height" >
        <div class="row justify-content-center">
            <v-card dark class="green darken-4 pa-10" width="800">
                <v-card-title class="white--text">Login</v-card-title>
                <v-form ref="form" v-model="valid" lazy-validation>
                    <v-text-field v-model="username" :counter="10" :rules="usernameRules" label="Username" required></v-text-field>

                    <v-text-field v-model="password" :rules="passwordRules" label="Password" required></v-text-field>

                    <v-checkbox v-model="checkbox" :rules="[v => !!v || 'You must agree to continue!']"
                        label="Do you agree?" required></v-checkbox>
                    <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">
                        Login
                    </v-btn>

                    <v-btn color="error" class="mr-4" @click="reset">
                        Reset Form
                    </v-btn>
                </v-form>
            </v-card>
        </div>
    </div>
</template>

<script>
export default ({
    // el: '#app',
    // vuetify: new Vuetify(),
    data: () => ({
        valid: true,
        username: '',
        usernameRules: [
            v => !!v || 'Username is required',
            v => (v && v.length <= 10) || 'Username must be less than 10 characters',
        ],
        password: '',
        passwordRules: [
            v => !!v || 'Password is required',
            // v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        items: [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4',
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
