<template>
    <section class="section">
            <div class="columns is-centered">
                <div class="column is-8">
                    <article class="message">
                        <div class="message-header">Example Component</div>

                        <div class="message-body">
                            I'm an example component!
                        </div>
                    </article>
                </div>
            </div>

            <ul>
                <li v-for="activity in activities" :key="activity.id">{{ activity.title }}</li>
            </ul>
        </div>
    </section>
</template>

<script>
    import axios from 'axios';
    import { mapActions, mapGetters } from 'vuex';

    export default {
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