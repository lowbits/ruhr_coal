<template>
    <div>
        <filters></filters>
    </div>
</template>

<script>
    import axios from 'axios';
    import { mapActions, mapGetters } from 'vuex';
    import Filters from './Filters.vue'

    export default {
        components: {
            Filters
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
                })
                .catch((err) => {
                    console.error('Error in App.vue. AJAX failed.');
                    new Error(err);
                })
        }
    }
</script>