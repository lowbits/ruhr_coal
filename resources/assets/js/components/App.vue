<template>
    <div>
        <create-activity></create-activity>
    </div>
</template>

<script>
    import CreateActivity from './CreateActivity.vue';
    export default {
        /*methods: {
    import axios from 'axios';
    import { mapActions, mapGetters } from 'vuex';
    import activityCard from './activity/activity_card.vue';
    import filters from './Filters.vue';

    export default {
        components: {
            activityCard,
            filters
        },
        methods: {
            ...mapActions({
                setActivities: 'setActivities',
                setFilterResults: 'setFilterResults',
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
                    vm.setFilterResults(activities);
                })
                .catch((err) => {
                    console.error('Error in App.vue. AJAX failed.');
                    new Error(err);
                })
        }*/
        components: {
            'create-activity': CreateActivity
        }
    }
</script>
