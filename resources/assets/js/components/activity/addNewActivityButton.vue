<template>
    <div class="ownButton">
        <span class="fa fa-plus"></span>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        }
    }
</script>

<style lang="scss" scoped>
    .ownButton{
        border-radius: 50%;
        position: fixed;
        bottom: 20px;
        right: 20px;
        height: 80px;
        width: 80px;
        background-color: #00d1b2;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;

        span{
            color: #fff;
            font-size: 30px;
        }

        &:hover{
            cursor: pointer;
            background-color: #00a58c;
        }
    }
</style>