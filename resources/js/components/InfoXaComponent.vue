<template>
    <div style="position: absolute; z-index: 99999; top: -8px;">
        <v-card v-bind:class="{ 'active': idHuyen != -1, 'none': idHuyen == -1 }" id="info" color="rgb(38, 77, 0)"
            class="pa-4 ma-2" style=" left:-170px; width: 200px; height: 500px">
            <v-row style="height: 120px; padding-left: 30px;">
                <p style="color: white; font-size: 16px;"><b>{{ tenHuyen }}</b></p>
            </v-row>
            <v-row style="padding-left: 0px; margin: 0;">
                <v-col cols="9">
                    <p style="color: white; font-size: 18px;"><b>{{ title }}</b></p>
                </v-col>
                <v-col cols="3" style="padding: 0; margin: 0;">
                    <v-checkbox v-model="checkXa"></v-checkbox>
                </v-col>
            </v-row>
        </v-card>
        <!-- <v-button @click="test == 0 ? test = 1 : test = 0">Click{{ idHuyen }}</v-button> -->
    </div>
</template>

<script>
import angiang from '../../../public/json/angiang.json';
import xaAnGiang from '../../../public/json/xaAnGiang.json';
export default {
    props: {
        idHuyen: { default: '' }, 
        tenXa: '',
    },
    data() {
        return {
            checkXa: '',
            coordXa: [],
            title: '',
            tenHuyen: '',
        }
    },
    watch: {
        idHuyen(e) {
            if (e != -1) {
                this.title = 'Hiển thị xã'
                this.tenHuyen = angiang.level2s[e].name;
                this.checkXa = false;
                this.sendXa();
            } else {
                this.title = ''
            }
        },
        checkXa(e) {
            this.sendXa();
        },
    },
    methods: {
        sendXa() {
            let arr = []
            xaAnGiang[this.idHuyen].forEach((xa) => {
                // arr.push(xa.cord[0])
                arr= [...arr, xa.cord[0]]
            })
            this.$emit('hienthiXa', [arr, this.checkXa])
        },
    }
}
</script>

<style>
#info {
    position: relative;
    left: -170px;
}

.active {
    animation-name: ok;
    animation-duration: 1s;
    animation-fill-mode: forwards;
}

.none {
    animation-name: noneData;
    animation-duration: 1s;
    animation-fill-mode: forwards;
}

@keyframes ok {
    from {
        left: -170px;
    }

    to {
        left: -8px;

    }
}

@keyframes noneData {
    from {
        left: -8px;
    }

    to {
        left: -170px;

    }
}
</style>