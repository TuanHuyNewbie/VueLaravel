require('./bootstrap');
import Vue from 'vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'
import CreateComponent from './components/CreateComponent';
import ExampleComponent from './components/ExampleComponent';
import GetComponent from './components/GetComponent';
import EditComponent from './components/EditComponent';
import LoginComponent from './components/LoginComponent';
import IndexComponent from './components/IndexComponent';
import NguoiDungComponent from './components/NguoiDungComponent/TaoNguoiDungComponent';
import DanhSachComponent from './components/NguoiDungComponent/DanhSachComponent';
import updateNguoiDungComponent from './components/NguoiDungComponent/UpdateNguoiDungComponent';
import DanhSachCongTyComponent from './components/CongTyComponent/DanhSachCongTyComponent';
import DanhSachNongTruongComponent from './components/NongTruongComponent/DanhSachNongTruongComponent';
import DanhSachLoCanhTacComponent from './components/LoCanhTacComponent/DanhSachLoCanhTacComponent';
import DanhSachKhuVucComponent from './components/KhuVucComponent/DanhSachKhuVucComponent';
import DanhSachHienTrangVuonCayComponent from './components/HienTrangVuonCayComponent/DanhSachHienTrangVuonCayComponent';
import DanhSachMucDichSuDungDatComponent from './components/MucDichSuDungDatComponent/DanhSachMucDichSuDungDatComponent';
import DanhSachPhanLoaiComponent from './components/PhanLoaiComponent/DanhSachPhanLoaiComponent';
// import vuetify from './plugins/vuetify'
Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.component('font-awesome-icon', FontAwesomeIcon) // Register component globally
library.add(fas)
Vue.use(Vuetify)
const vuetify= new Vuetify({
    theme: {
        primary: '#1976D2',
        secondary: '#424242',
        accent: '#82B1FF',
        error: '#FF5252',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FFC107',
      },
      icons: {
        iconfont: 'mdiSvg', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
      },
      options: {
        customProperties: true,
      },
      iconfont: 'md',
})

const routes = [
    {
        path: "/",
        name: "Example",
        component: ExampleComponent
    },
    {
        path: "/create",
        name: "Create",
        component: CreateComponent
    },
    {
        path: "/get-all-user",
        name: "Get All User",
        component: GetComponent
    },
    {
        path: "/edit-user/:id",
        name: "Edit User",
        component: EditComponent
    },
    {
        path: "/login",
        name: "Login",
        component: LoginComponent
    },
    {
        path: "/index",
        name: "Index",
        component: IndexComponent
    },
    // {
    //     path: "/nguoi-dung",
    //     name: "Nguoi Dung",
    //     component: NguoiDungComponent
    // },
    // {
    //     path: "/danh-sach-nguoi-dung",
    //     name: "Danh Sach Nguoi Dung",
    //     component: DanhSachComponent
    // },
    {
        path: "/update-nguoi-dung/:id_nguoi_dung",
        name: "Update Nguoi Dung",
        component: updateNguoiDungComponent
    },
    {
        path: "/home",
        name: "Home",
        component: IndexComponent,
        children: [
            {
                path: "danh-sach-nguoi-dung",
                name: "Danh Sach Nguoi Dung",
                component: DanhSachComponent,
                meta:{
                    title: 'Quản Lí Người Dùng / Danh sách người dùng'
                }
            },
            {
                path: "tao-nguoi-dung",
                name: "Nguoi Dung",
                component: NguoiDungComponent,
                meta:{
                    title: 'Quản Lí Người Dùng / Thêm Người Dùng Mới'
                }
            },
            {
                path: "cap-nhat-nguoi-dung/:id_nguoi_dung",
                name: "Cap Nhat Nguoi Dung",
                component: updateNguoiDungComponent,
                meta:{
                    title: 'Quản Lí Người Dùng / Cập nhật người dùng'
                }
            },
            {
                path: "danh-sach-cong-ty",
                name: "Danh Sach Cong Ty",
                component: DanhSachCongTyComponent,
                meta:{
                    title: 'Quản Lí Nông Trường / Công Ty',
                    nameID: 'Danh Sách Công Ty'
                }
            },
            {
                path: "danh-sach-nong-truong",
                name: "Danh Sach Nong Truong",
                component: DanhSachNongTruongComponent,
                meta:{
                    title: 'Quản Lí Nông Trường / Nông Trường',
                    nameID: 'Danh Sách Nông Trường'
                }
            },
            {
                path: "danh-sach-lo-canh-tac",
                name: "Danh Sach Lo Canh Tac",
                component: DanhSachLoCanhTacComponent,
                meta:{
                    title: 'Quản Lí Nông Trường / Lô Canh Tác',
                    nameID: 'Danh Sách Lô Canh Tác'
                }
            },
            {
                path: "danh-sach-khu-vuc",
                name: "Danh Sach Khu Vuc",
                component: DanhSachKhuVucComponent,
                meta:{
                    title: 'Định Nghĩa Kí Hiệu / Khu Vực',
                    nameID: 'Danh Sách Khu Vực'
                }
            },
            {
                path: "danh-sach-hien-trang-vuon-cay",
                name: "Danh Sach Hien Trang Vuon Cay",
                component: DanhSachHienTrangVuonCayComponent,
                meta:{
                    title: 'Định Nghĩa Kí Hiệu / Hiện Trạng Vườn Cây',
                    nameID: 'Danh Sách Hiện Trạng Vườn Cây'
                }
            },
            {
                path: "danh-sach-muc-dich-su-dung-dat",
                name: "Danh Sach Muc Dich Su Dung Dat",
                component: DanhSachMucDichSuDungDatComponent,
                meta:{
                    title: 'Định Nghĩa Kí Hiệu / Mục Đích Sử Dụng Đất',
                    nameID: 'Danh Sách Mục Đích Sử Dụng Đất'
                }
            },
            {
                path: "danh-sach-phan-loai",
                name: "Danh Sach Phan Loai",
                component: DanhSachPhanLoaiComponent,
                meta:{
                    title: 'Định Nghĩa Kí Hiệu / Phân Loại',
                    nameID: 'Danh Sách Phân Loại'
                }
            },


        ]
    }
    
]

const router = new VueRouter({
    mode: 'hash',
    routes
})

const app = new Vue({
    el: '#app',
    router,
    vuetify: vuetify,
});
