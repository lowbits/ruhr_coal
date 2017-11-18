<template>
    <div class="card">
        <div class="card-content">
            <div class="activityImg"></div>
            <div class="titleDescription"><h4 class="title is-4">{{ title }}</h4><h6 class="subtitle is-6">{{ description }}</h6></div>
            <div class="city"><span class="cardLabel">Stadt</span><br/>{{ city }}</div>
            <div class="category"><span class="cardLabel">Kategorie</span><br/>{{ category }}</div>
            <div class="price"><span class="cardLabel">Preis</span><br/>{{ price }}</div>
            <div class="detailButton"><span class="fa fa-chevron-right"></span></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: 'Hier steht der Titel, der so lang sein kann',
                description: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy',
                city: 'Duisburg',
                category: 'Geführte Tour',
                price: 'Kostenlos'
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/variables';
    .card-content{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        flex: 1;
        div{
            font-size: 20px;

            &.activityImg{
                background-color: $grey;
                height: 100px;
                width: 100px;
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