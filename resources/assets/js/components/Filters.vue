<template>
  <aside>
    <div class="field">
      <h3 class="title is-size-4">Standort</h3>
      <input class="input" type="text" v-model="filter.location" placeholder="Stadt eingeben">
    </div>

    <div class="field">
      <h3 class="title is-size-4">title</h3>
      <input class="input" type="text" v-model="filter.title" placeholder="Stadt eingeben">
    </div>
  </aside>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex';

  export default {
    data() {
      return {
        filter: {
          location: '',
          title: '',
        },
      }
    },
    methods: {
      ...mapActions({
          setFilterResults: 'setFilterResults',
      }),
    },
    computed: {
      ...mapGetters({
          activities: 'getActivities',
      }),
      results() {
        const allActivities = this.activities;
        let results = [];

        console.log(allActivities);
        for (const key in this.filter) {
          if (this.filter.hasOwnProperty(key)) {
            const value = this.filter[key];

            let matched = allActivities.filter((activity) => {
              if (typeof activity[key] === 'string') {
                return activity[key].toLowerCase().includes(value);
              }
            });

            results.push(...matched);
          }
        }

        this.setFilterResults(results);
        return results;
      },
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../sass/_variables.scss';

  aside {
    min-height: 100vh;
    max-width: 350px;
    padding: 20px;
    background: $primary-light;
  }

  .title {
    color: #fff;
    font-weight: 300;
    margin-bottom: 20px;
  }

  .input {
    border-radius: 0;
    border: none;
    height: 45px;
    padding-left: 15px;
  }

  .field + .field {
    margin-top: 30px;
  }
</style>


