<template>
    <div>
        <h1>Không thể truy cập</h1>
        <p>Xin lỗi, bạn không có quyền truy cập vào trang này.</p>
        <button @click="goBack()">Quay Lại</button>
    </div>
</template>

<script>
export default{
    methods: {
        goBack() {
            this.$router.push({path: 'home'});
        }
    }
}

</script>