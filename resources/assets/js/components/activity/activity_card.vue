<template>
    <div class="card">
        <div class="card-content">
            <div class="activityImg"></div>
            <div class="titleDescription"><h4 class="title is-4">{{ activity.title }}</h4><h6 class="subtitle is-6">{{ activity.description }}</h6></div>
            <div class="city"><span class="cardLabel">Stadt</span><br/>{{ activity.location.city }}</div>
            <div class="category"><span class="cardLabel">Kategorie</span><br/>{{ activity.category }}</div>
            <div class="price"><span class="cardLabel">Preis</span><br/>{{ (activity.price === null) ? 'Kostenlos' : activity.price }}</div>
            <div class="detailButton"><span class="fa fa-chevron-right"></span></div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [
            "activity"
        ],
        data() {
            return {

            }
        },
        created() {
            console.log(this.activity);
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/variables';

    .card{
        margin-bottom: 30px;
    }

    .card-content{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        flex: 1;

        div{
            width: 100 / 12 * 1.5%;
            font-size: 20px;

            &.activityImg{
                background-color: $grey;
                height: 100px;
                width: 100px;
            }

            &.titleDescription{
                width: auto;
                min-width: 100 / 12 * 5%;
                max-width: 100 / 12 * 5%;
            }

            &.detailButton{
                width: auto;
                min-width: 20px;
                max-width: 20px;
            }
        }
    }

    .cardLabel{
        color: $grey;
        font-size: 12px;
        text-transform: uppercase;
    }

    .subtitle{
        color: $grey;
    }
</style>