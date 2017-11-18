<template>
    <div>
        <section class="section">
            <div class="container is-fluid">
                <activityCard></activityCard>
            </div>
        </section>
    </div>

</template>

<script>
    import activityCard from './activity/activity_card.vue';
    export default {
        components: {
            activityCard
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
