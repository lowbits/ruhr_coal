<template>
    <div>
        <!--<create-activity></create-activity>-->
        <create-gactivity></create-gactivity>
    </div>
</template>

<script>
    import CreateActivity from './CreateActivity.vue';
    import CreateGActivity from './CreateGActivity.vue';
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
                results: 'getFilterResults',
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
            CreateActivity,
            'create-activity': CreateActivity,
            'create-gactivity': CreateGActivity
        }
    }
</script>

<style lang="scss" scoped>
.main {
    display: flex;
}

.section {
    flex: 1;
    height: calc(100vh - 52px);
    overflow: auto;
}
</style>
