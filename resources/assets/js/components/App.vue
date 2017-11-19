<template>
    <div class="main">
        <filters :setFilterWasUsed="setFilterWasUsed"></filters>
        <section class="section">
            <div class="container is-fluid">
                <h2 class="title is-size-3 has-text-centered" v-if="results.length === 0 && !filterWasUsed">Aktivitäten werden geladen...</h2>
                <activityCard v-for="activity in results" :key="`${activity.id}-${activity.modeltype}`" :activity="activity" v-if="results.length > 0" />
                <div class="has-text-centered" v-if="results.length === 0 && filterWasUsed">
                    <h2 class="title is-size-3">Deine Suche ergab leider keine Ergebnisse.</h2>
                    <img src="/img/sad.gif">
                    <h3 class="title is-size-4">Versuch' es einfach nochmal!</h3>
                </div>
            </div>
            <addActivityButton></addActivityButton>
        </section>
    </div>
</template>

<script>
    import axios from 'axios';
    import { mapActions, mapGetters } from 'vuex';
    import activityCard from './activity/activity_card.vue';
    import addActivityButton from './activities/addNewActivityButton.vue';
    import filters from './Filters.vue';

    export default {
        data() {
            return {
                filterWasUsed: false,
            }
        },
        components: {
            activityCard,
            filters,
            addActivityButton
        },
        methods: {
            ...mapActions({
                setActivities: 'setActivities',
                setFilterResults: 'setFilterResults',
            }),
            setFilterWasUsed() {
                this.filterWasUsed = true;
            }
        },
        computed: {
            ...mapGetters({
                activities: 'getActivities',
                results: 'getFilterResults',
            }),
        },
        created() {
            const vm = this;

            axios.get('http://localhost:8000/api/v1/allactivities')
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
    background: #f7fdff;
}
</style>
