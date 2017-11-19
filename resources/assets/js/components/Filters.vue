<template>
  <aside>
    <div class="field">
      <h3 class="title is-size-5">Standort</h3>
      <input class="input" type="text" @keyup="filterResults" v-model="filter.location" placeholder="Stadt eingeben">
    </div>

    <div class="field">
      <h3 class="title is-size-5">Titel</h3>
      <input class="input" type="text" @keyup="filterResults" v-model="filter.title" placeholder="Titel suchen">
    </div>

    <div class="field">
      <h3 class="title is-size-5">Wetter</h3>
      <div class="control">
        <label class="radio is-size-6" :class="{'is-active': filter.weather == 'egal'}">
          <input type="radio" name="answer" value="egal" v-model="filter.weather" @change="filterResults" checked="checked">
          Egal
        </label>
        <label class="radio is-size-6" :class="{'is-active': filter.weather == 'trocken'}">
          <input type="radio" name="answer" value="trocken" v-model="filter.weather" @change="filterResults">
          Trocken
        </label>
        <label class="radio is-size-6" :class="{'is-active': filter.weather == '42°'}">
          <input type="radio" name="answer" value="42°" v-model="filter.weather" @change="filterResults">
          Sommer
        </label>
      </div>
    </div>

    <div class="field">
      <h3 class="title is-size-5">Preis</h3>
      <div class="columns is-price">
        <div class="column is-5">
          <input class="input" type="number" @keyup="filterResults" v-model="filter.priceMin" placeholder="0">
        </div>
        <div class="column is-2">
          <span class="has-text-white">bis</span>
        </div>
        <div class="column is-5">
          <input class="input" type="number" @keyup="filterResults" v-model="filter.priceMax" placeholder="50">
        </div>
      </div>
    </div>

    <div class="field">
      <h3 class="title is-size-5">Personenanzahl</h3>
      <input type="range" min="1" max="10" @change="filterResults" @input="filterResults" v-model="filter.person_count">
      <span class="currentCount" :style="personCountPosition">{{ filter.person_count }}</span>
    </div>

    <div class="field is-reset">
      <button class="button is-primary is-block is-outlined" @click="resetAllFilter">Alle Filter zurücksetzen</button>
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
          person_count: 1,
        },
      }
    },
    props: ['setFilterWasUsed'],
    methods: {
      ...mapActions({
          setFilterResults: 'setFilterResults',
      }),
      resetAllFilter() {
        console.log('reset');
        for (const key in this.filter) {
          if (this.filter.hasOwnProperty(key)) {
            const value = this.filter[key];

            if (typeof value === 'string') {
              key === 'person_count' ? this.filter[key] = '1' : this.filter[key] = '';
            }
          }
        }

        this.filterResults();
      },
      filterResults() {
        let results = this.activities.filter((activity) => {
          this.setFilterWasUsed();

          // Values to test
          const activityTitle = activity.title.toLowerCase();
          const activityDescription = activity.description.toLowerCase();
          const activityPrice = activity.price;
          const activityWeather = activity.weather ? activity.weather.toLowerCase() : '';
          const activityPersonCount = activity.person_count;
          const locationCity = activity.location.city.toLowerCase();

          // Filter values
          const filterTitle = this.filter.title.toLowerCase();
          const filterLocationTitle = this.filter.location.toLowerCase();
          const filterPriceMin = Number(this.filter.priceMin);
          const filterPriceMax = Number(this.filter.priceMax);
          const filterWeather = this.filter.weather;
          const filterPersonCount = this.filter.person_count;

          // Title & Description
          if (!((activityTitle.includes(filterTitle)) || (activityDescription.includes(filterTitle))) && filterTitle.length > 0) {
            return false;
          }

          // Location-Title
          if (!(locationCity.includes(filterLocationTitle)) && filterLocationTitle.length > 0) {
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

          // Personen-Filter
          if (activityPersonCount < filterPersonCount) {
            return false;
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
      personCountPosition() {
        return {
          left: this.filter.person_count / 10 * 100 + '%',
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../sass/_variables.scss';

  aside {
    position: relative;
    height: calc(100vh - 52px);
    width: 350px;
    padding: 30px;
    background: $primary-light;
  }

  .is-reset {
    position: absolute;
    bottom: 20px;
    left: 30px;
    right: 30px;
  }

  .title {
    color: #fff;
    font-weight: 300;
    margin-bottom: 10px;
  }

  .input {
    border-radius: 0;
    border: 1px solid #fff;
    height: 45px;
    padding-left: 15px;
    background: transparent;
    color: #fff;

    &::placeholder {
      color: rgba(#fff, .5);
    }
  }

  .field {
    + .field {
      margin-top: 30px;
    }

    &:not(:last-child) {
      padding-bottom: 30px;
      border-bottom: 1px solid rgba(#fff, .1);
    }
  }

  .is-price {
    display: flex;
    align-items: center;
  }

  .currentCount {
    position: relative;
    display: inline-block;
    width: 30px;
    height: auto;
    margin-left: -10%;
    text-align: center;
    top: 10px;
    left: 0;
    padding: 5px;
    background-color: #fff;
    border-radius: 3px;
    box-shadow: 0 3px 6px rgba(#000, .16);
  }

  .button {
    width: 100%;
  }

  .radio  {
    display: block;
    margin-left: 0;
    margin-bottom: 10px;
    color: rgba(#fff, .6);

    &.is-active {
      color: #fff;
    }
  }

  .control {
    margin-top: 20px;
  }

input[type=range] {
  -webkit-appearance: none;
  width: 100%;
  margin: 8.1px 0;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 3.8px;
  cursor: pointer;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0px 0px 1px rgba(13, 13, 13, 0);
  background: #f2ffff;
  border-radius: 25px;
  border: 0px solid rgba(0, 1, 1, 0);
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 0px 0px 0px rgba(0, 0, 0, 0), 0px 0px 0px rgba(13, 13, 13, 0);
  border: 0px solid #000000;
  height: 20px;
  width: 20px;
  border-radius: 50px;
  background: #bbe3f0;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -8.1px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #ffffff;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 3.8px;
  cursor: pointer;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0px 0px 1px rgba(13, 13, 13, 0);
  background: #f2ffff;
  border-radius: 25px;
  border: 0px solid rgba(0, 1, 1, 0);
}
input[type=range]::-moz-range-thumb {
  box-shadow: 0px 0px 0px rgba(0, 0, 0, 0), 0px 0px 0px rgba(13, 13, 13, 0);
  border: 0px solid #000000;
  height: 20px;
  width: 20px;
  border-radius: 50px;
  background: #bbe3f0;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 3.8px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #ceffff;
  border: 0px solid rgba(0, 1, 1, 0);
  border-radius: 50px;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0px 0px 1px rgba(13, 13, 13, 0);
}
input[type=range]::-ms-fill-upper {
  background: #f2ffff;
  border: 0px solid rgba(0, 1, 1, 0);
  border-radius: 50px;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0px 0px 1px rgba(13, 13, 13, 0);
}
input[type=range]::-ms-thumb {
  box-shadow: 0px 0px 0px rgba(0, 0, 0, 0), 0px 0px 0px rgba(13, 13, 13, 0);
  border: 0px solid #000000;
  height: 20px;
  width: 20px;
  border-radius: 50px;
  background: #bbe3f0;
  cursor: pointer;
  height: 3.8px;
}
input[type=range]:focus::-ms-fill-lower {
  background: #f2ffff;
}
input[type=range]:focus::-ms-fill-upper {
  background: #ffffff;
}

</style>
