<template>
    <section class="section">
        <div class="container is-fluid">
            <activityCard v-for="activity in activities" :key="activity.id" :activity="activity"></activityCard>
        </div>
    </section>
</template>

<script>
    import axios from 'axios';
    import { mapActions, mapGetters } from 'vuex';
    import activityCard from './activity/activity_card.vue';

    export default {
        components: {
            activityCard
        },
        methods: {
            ...mapActions({
                setActivities: 'setActivities',
            })
        },
        computed: {
            ...mapGetters({
                activities: 'getActivities',
            }),
        },
        created() {
            const vm = this;

            axios.get('http://localhost:8000/api/v1/activity')
                .then((res) => {
                    const activities = res.data;

                    vm.setActivities(activities);
                    console.log(activities);
                })
                .catch((err) => {
                    console.error('Error in App.vue. AJAX failed.');
                    new Error(err);
                })
        }
    }
</script>