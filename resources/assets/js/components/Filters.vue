<template>
  <aside>
    <div class="field">
      <h3 class="title is-size-4">Standort</h3>
      <input class="input" type="text" @keyup="filterResults" v-model="filter.location" placeholder="Stadt eingeben">
    </div>

    <div class="field">
      <h3 class="title is-size-4">Titel</h3>
      <input class="input" type="text" @keyup="filterResults" v-model="filter.title" placeholder="Titel suchen">
    </div>

    <div class="field">
      <h3 class="title is-size-4">Wetter</h3>
      <div class="control">
        <label class="radio has-text-white is-size-6">
          <input type="radio" name="answer" value="egal" v-model="filter.weather" @change="filterResults" checked>
          Egal
        </label>
        <label class="radio has-text-white is-size-6">
          <input type="radio" name="answer" value="trocken" v-model="filter.weather" @change="filterResults">
          Trocken
        </label>
        <label class="radio has-text-white is-size-6">
          <input type="radio" name="answer" value="42°" v-model="filter.weather" @change="filterResults">
          Sommer
        </label>
        {{ filter.weather }}
      </div>
    </div>

    <div class="field">
      <h3 class="title is-size-4">Preis</h3>
      <div class="columns is-price">
        <div class="column is-5">
          <input class="input" type="number" @keyup="filterResults" v-model="filter.priceMin" placeholder="0">
        </div>
        <div class="column is-2">
          <span class="has-text-white">bis</span>
        </div>
        <div class="column is-5">
          <input class="input" type="number" @keyup="filterResults" v-model="filter.priceMax" placeholder="1000">
        </div>
      </div>
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
          priceMin: '',
          priceMax: '',
          weather: '',
        },
      }
    },
    methods: {
      ...mapActions({
          setFilterResults: 'setFilterResults',
      }),
      filterResults() {
        let results = this.activities.filter((activity) => {
          // Values to test
          const activityTitle = activity.title.toLowerCase();
          const activityDescription = activity.description.toLowerCase();
          const activityPrice = activity.price;
          const activityWeather = activity.weather.toLowerCase();
          const locationTitle = activity.location.title.toLowerCase();

          // Filter values
          const filterTitle = this.filter.title.toLowerCase();
          const filterLocationTitle = this.filter.location.toLowerCase();
          const filterPriceMin = Number(this.filter.priceMin);
          const filterPriceMax = Number(this.filter.priceMax);
          const filterWeather = this.filter.weather;

          // Title & Description
          if (!((activityTitle.includes(filterTitle)) || (activityDescription.includes(filterTitle))) && filterTitle.length > 0) {
            return false;
          }

          // Location-Title
          if (!(locationTitle.includes(filterLocationTitle)) && filterLocationTitle.length > 0) {
            return false;
          }

          // Price-filter
          if (filterPriceMin > 0 && activityPrice < filterPriceMin) {
            return false;
          }
          if (filterPriceMax > 0 && activityPrice > filterPriceMax) {
            return false;
          }

          // Weather-filter
          if (!(filterWeather === 'egal')) {
            if (!activityWeather.includes(filterWeather)) {
              return false;
            }
          }

          return true;
        });

        this.setFilterResults(results);
        return results;
      },
    },
    computed: {
      ...mapGetters({
          activities: 'getActivities',
      }),
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../sass/_variables.scss';

  aside {
    min-height: 100vh;
    width: 350px;
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

  .is-price {
    display: flex;
    align-items: center;
  }
</style>


