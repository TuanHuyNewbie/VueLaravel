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
import ThemCongTyComponent from './components/CongTyComponent/ThemCongTyComponent';
import XemCongTyComponent from './components/CongTyComponent/XemCongTyComponent';
import SuaCongTyComponent from './components/CongTyComponent/SuaCongTyComponent';
import ThemKhuVucComponent from './components/KhuVucComponent/ThemKhuVucComponent';
import SuaKhuVucComponent from './components/KhuVucComponent/SuaKhuVucComponent';
import ThemMucDichSuDungDatComponent from './components/MucDichSuDungDatComponent/ThemMucDichSuDungDatComponent';
import SuaMucDichSuDungDatComponent from './components/MucDichSuDungDatComponent/SuaMucDichSuDungDatComponent';
import XemMucDichSuDungDatComponent from './components/MucDichSuDungDatComponent/XemMucDichSuDungDatComponent';
import ThemHienTrangVuonCayComponent from './components/HienTrangVuonCayComponent/ThemHienTrangVuonCayComponent';
import SuaHienTrangVuonCayComponent from './components/HienTrangVuonCayComponent/SuaHienTrangVuonCayComponent';
import XemHienTrangVuonCayComponent from './components/HienTrangVuonCayComponent/XemHienTrangVuonCayComponent';
import ThemNongTruongComponent from './components/NongTruongComponent/ThemNongTruongComponent';
import SuaNongTruongComponent from './components/NongTruongComponent/SuaNongTruongComponent';
import XemNongTruongComponent from './components/NongTruongComponent/XemNongTruongComponent';
import ThemPhanLoaiComponent from './components/PhanLoaiComponent/ThemPhanLoaiComponent';
import SuaPhanLoaiComponent from './components/PhanLoaiComponent/SuaPhanLoaiComponent';
import XemPhanLoaiComponent from './components/PhanLoaiComponent/XemPhanLoaiComponent';
import ThemLoCanhTacComponent from './components/LoCanhTacComponent/ThemLoCanhTacComponent';
import SuaLoCanhTacComponent from './components/LoCanhTacComponent/SuaLoCanhTacComponent';
import XemLoCanhTacComponent from './components/LoCanhTacComponent/XemLoCanhTacComponent';


import store from './store/index';
import { initialize } from "./helpers/general";

initialize(store, router);
Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
 });
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
        component: LoginComponent,
        meta: {
            auth: false
        }
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
                    title: 'Qu???n L?? Ng?????i D??ng / Danh s??ch ng?????i d??ng'
                }
            },
            {
                path: "tao-nguoi-dung",
                name: "Nguoi Dung",
                component: NguoiDungComponent,
                meta:{
                    title: 'Qu???n L?? Ng?????i D??ng / Th??m Ng?????i D??ng M???i'
                }
            },
            {
                path: "cap-nhat-nguoi-dung/:id_nguoi_dung",
                name: "Cap Nhat Nguoi Dung",
                component: updateNguoiDungComponent,
                meta:{
                    title: 'Qu???n L?? Ng?????i D??ng / C???p nh???t ng?????i d??ng'
                }
            },
            {
                path: "danh-sach-cong-ty",
                name: "Danh Sach Cong Ty",
                component: DanhSachCongTyComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / C??ng Ty',
                    nameID: 'Danh S??ch C??ng Ty'
                },
            },
            //--------------------C??ng Ty---------------------
            {   
                path: "them-cong-ty",
                name: "Them Cong Ty",
                component: ThemCongTyComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / C??ng Ty',
                    nameID: 'Th??m C??ng Ty'
                }
            },
            {   
                path: "them-cong-ty",
                name: "Them Cong Ty",
                component: ThemCongTyComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / C??ng Ty',
                    nameID: 'Th??m C??ng Ty'
                }
            },
            {   
                path: "xem-cong-ty/:id_congty",
                name: "Xem Cong Ty",
                component: XemCongTyComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / C??ng Ty',
                    nameID: 'Xem C??ng Ty'
                }
            },
            {   
                path: "sua-cong-ty/:id_congty",
                name: "Sua Cong Ty",
                component: SuaCongTyComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / C??ng Ty',
                    nameID: 'S???a Th??ng Tin C??ng Ty'
                }
            },
            //--------------------Khu V???c---------------------
            {
                path: "danh-sach-khu-vuc",
                name: "Danh Sach Khu Vuc",
                component: DanhSachKhuVucComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Khu V???c',
                    nameID: 'Danh S??ch Khu V???c'
                }
            },
            {
                path: "them-khu-vuc",
                name: "Them Khu Vuc",
                component: ThemKhuVucComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Khu V???c',
                    nameID: 'Th??m Khu V???c'
                }
            },
            {
                path: "sua-khu-vuc/:id_khuvuc",
                name: "Sua Khu Vuc",
                component: SuaKhuVucComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Khu V???c',
                    nameID: 'S???a Khu V???c'
                }
            },
            //--------------------M???c ????ch S??? D???ng ?????t------------------
            {
                path: "danh-sach-muc-dich-su-dung-dat",
                name: "Danh Sach Muc Dich Su Dung Dat",
                component: DanhSachMucDichSuDungDatComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / M???c ????ch S??? D???ng ?????t',
                    nameID: 'Danh S??ch M???c ????ch S??? D???ng ?????t'
                }
            },
            {
                path: "them-muc-dich-su-dung-dat",
                name: "Them Muc Dich Su Dung Dat",
                component: ThemMucDichSuDungDatComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / M???c ????ch S??? D???ng ?????t',
                    nameID: 'Th??m M???c ????ch S??? D???ng ?????t'
                }
            },
            {
                path: "sua-muc-dich-su-dung-dat/:id_mucdichsudungdat",
                name: "Sua Muc Dich Su Dung Dat",
                component: SuaMucDichSuDungDatComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / M???c ????ch S??? D???ng ?????t',
                    nameID: 'S???a M???c ????ch S??? D???ng ?????t'
                }
            },
            {
                path: "xem-muc-dich-su-dung-dat/:id_mucdichsudungdat",
                name: "Xem Muc Dich Su Dung Dat",
                component: XemMucDichSuDungDatComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / M???c ????ch S??? D???ng ?????t',
                    nameID: 'Xem M???c ????ch S??? D???ng ?????t'
                }
            },
            //--------------------Hi???n Tr???ng V?????n C??y------------------
            {
                path: "danh-sach-hien-trang-vuon-cay",
                name: "Danh Sach Hien Trang Vuon Cay",
                component: DanhSachHienTrangVuonCayComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Hi???n Tr???ng V?????n C??y',
                    nameID: 'Danh S??ch Hi???n Tr???ng V?????n C??y'
                }
            },
            {
                path: "them-hien-trang-vuon-cay",
                name: "Them Hien Trang Vuon Cay",
                component: ThemHienTrangVuonCayComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Hi???n Tr???ng V?????n C??y',
                    nameID: 'Th??m Hi???n Tr???ng V?????n C??y'
                }
            },
            {
                path: "sua-hien-trang-vuon-cay/:id_hientrangvuoncay",
                name: "Sua Hien Trang Vuon Cay",
                component: SuaHienTrangVuonCayComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Hi???n Tr???ng V?????n C??y',
                    nameID: 'S???a Hi???n Tr???ng V?????n C??y'
                }
            },
            {
                path: "xem-hien-trang-vuon-cay/:id_hientrangvuoncay",
                name: "Xem Hien Trang Vuon Cay",
                component: XemHienTrangVuonCayComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Hi???n Tr???ng V?????n C??y',
                    nameID: 'Xem Hi???n Tr???ng V?????n C??y'
                }
            },
            //--------------------N??ng Tr?????ng------------------------
            {
                path: "danh-sach-nong-truong",
                name: "Danh Sach Nong Truong",
                component: DanhSachNongTruongComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / N??ng Tr?????ng',
                    nameID: 'Danh S??ch N??ng Tr?????ng'
                }
            },
            {
                path: "them-nong-truong",
                name: "Them Nong Truong",
                component: ThemNongTruongComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / N??ng Tr?????ng',
                    nameID: 'Th??m N??ng Tr?????ng'
                }
            },
            {
                path: "sua-nong-truong/:id_nongtruong",
                name: "Sua Nong Truong",
                component: SuaNongTruongComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / N??ng Tr?????ng',
                    nameID: 'S???a N??ng Tr?????ng'
                }
            },
            {
                path: "xem-nong-truong/:id_nongtruong",
                name: "Xem Nong Truong",
                component: XemNongTruongComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / N??ng Tr?????ng',
                    nameID: 'Xem N??ng Tr?????ng'
                }
            },
            //--------------------Ph??n Lo???i------------------------
            {
                path: "danh-sach-phan-loai",
                name: "Danh Sach Phan Loai",
                component: DanhSachPhanLoaiComponent,
                meta:{
                    title: '?????nh Ngh??a K?? Hi???u / Ph??n Lo???i',
                    nameID: 'Danh S??ch Ph??n Lo???i'
                }
            },
            {
                path: "them-phan-loai",
                name: "Them Phan Loai",
                component: ThemPhanLoaiComponent,
                meta:{
                    title: "?????nh Ngh??a K?? Hi???u / Ph??n Lo???i",
                    nameID: 'Th??m Ph??n Lo???i'
                }
            },
            {
                path: "sua-phan-loai/:id_phanloai",
                name: "Sua Phan Loai",
                component: SuaPhanLoaiComponent,
                meta:{
                    title: "?????nh Ngh??a K?? Hi???u / Ph??n Lo???i",
                    nameID: 'S???a Ph??n Lo???i'
                }
            },
            {
                path: "xem-phan-loai/:id_phanloai",
                name: "Xem Phan Loai",
                component: XemPhanLoaiComponent,
                meta:{
                    title: "?????nh Ngh??a K?? Hi???u / Ph??n Lo???i",
                    nameID: 'Xem Ph??n Lo???i'
                }
            },
            //---------------------L?? Canh T??c----------------------
            {
                path: "danh-sach-lo-canh-tac",
                name: "Danh Sach Lo Canh Tac",
                component: DanhSachLoCanhTacComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / L?? Canh T??c',
                    nameID: 'Danh S??ch L?? Canh T??c'
                }
            },
            {
                path: "them-lo-canh-tac",
                name: "Them Lo Canh Tac",
                component: ThemLoCanhTacComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / L?? Canh T??c',
                    nameID: 'Th??m L?? Canh T??c'
                }
            },
            {
                path: "sua-lo-canh-tac/:id_lo_canh_tac",
                name: "Sua Lo Canh Tac",
                component: SuaLoCanhTacComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / L?? Canh T??c',
                    nameID: 'S???a L?? Canh T??c'
                }
            },
            {
                path: "xem-lo-canh-tac/:id_lo_canh_tac",
                name: "Xem Lo Canh Tac",
                component: XemLoCanhTacComponent,
                meta:{
                    title: 'Qu???n L?? N??ng Tr?????ng / L?? Canh T??c',
                    nameID: 'Xem L?? Canh T??c'
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
    store,
    router,
    vuetify: vuetify,
});
