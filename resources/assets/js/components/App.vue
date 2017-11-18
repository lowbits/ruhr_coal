<template>
    <div>
        <create-activity></create-activity>
    </div>
</template>

<script>
    import CreateActivity from './CreateActivity.vue';
    export default {
        mounted() {
            console.log('Component mounted.')
        }
        ,components: {
            'create-activity': CreateActivity
        }
    }

</script>
