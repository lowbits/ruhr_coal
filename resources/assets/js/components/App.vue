<template>
    <div>
        <create-activity></create-activity>
    </div>
</template>

<script>
    import CreateActivity from './CreateActivity.vue';
    export default {
        /*methods: {
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
        }*/
        components: {
            'create-activity': CreateActivity
        }
    }
</script>
