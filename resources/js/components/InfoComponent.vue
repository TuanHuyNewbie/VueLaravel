<template>
    <div class="info">
        <v-card>
            <v-data-table :headers="header" :items="xa" :search="search" class="elevation-1" :items-per-page="5" style="overflow: scroll;">
            </v-data-table>
        </v-card>
    </div>
</template>

<script>
import xaAngGiang from '../../../public/json/xaAnGiang.json'
export default {
    props:{
        info:{default:''}
    },
    data() {
        return {
            search: '',
            idXa: '',
            xa: [],
            header: [
                { text: 'Tên Xã', value: 'ten_xa' },
            ],
        }
    },
    watch: {
        info(e){
            switch (e){
                case 0:{
                    this.xa = xaAngGiang[0];
                    break;
                }
                case 1:{
                    this.xa = xaAngGiang[1];
                    break;
                }
                case 2:{
                    this.xa = xaAngGiang[2];
                    break;
                }
                case 3:{
                    this.xa = xaAngGiang[3];
                    break;
                }
                case 4:{
                    this.xa = xaAngGiang[4];
                    break;
                }
                case 5:{
                    this.xa = xaAngGiang[5];
                    break;
                }
                case 6:{
                    this.xa = xaAngGiang[6];
                    break;
                }
                case 7:{
                    this.xa = xaAngGiang[7];
                    break;
                }
                case 8:{
                    this.xa = xaAngGiang[8];
                    break;
                }
                case 9:{
                    this.xa = xaAngGiang[9];
                    break;
                }
                default:{
                    this.xa = xaAngGiang[10];
                    break;
                } 
            }
        }
    }
}


</script>