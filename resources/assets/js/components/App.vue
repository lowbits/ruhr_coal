<template>
    <div class="main">
        <filters></filters>
        <section class="section">
            <div class="container is-fluid">
                <activityCard v-for="activity in results" :key="activity.id" :activity="activity"></activityCard>
            </div>
        </section>
    </div>
</template>

<script>
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
