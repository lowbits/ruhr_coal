<template>
    <div>
        <div class="card" v-on:click="toggleModal">
            <span class="modeltypeTag" v-if="activity.modeltype == 'gactivity'">Geführte Route</span>
            <div class="card-content">
                <div class="activityImg" :style="{ backgroundImage: 'url(' + activity.location.photo_url + ')' }"></div>
                <div class="titleDescription"><h4 class="title is-4">{{ activity.title }}</h4><h6 class="subtitle is-6">{{ activity.description }}</h6></div>
                <div class="city"><span class="cardLabel">Stadt</span><br/>{{ activity.location.city }}</div>
                <div class="category"><span class="cardLabel">Kategorie</span><br/>{{ activity.category }}</div>
                <div class="price"><span class="cardLabel">Preis</span><br/>{{ (activity.price === null) ? 'Kostenlos' : activity.price + ' €' }}</div>
                <div class="detailButton"><span class="fa fa-chevron-right"></span></div>
            </div>
        </div>
        <div class="notification" v-bind:class="[(notificationIsActive) ? 'is-active' : '', (notification.type == 'anmelden') ? 'is-success' : 'is-danger']">
            <button class="delete" v-on:click="toggleNotification"></button>
            {{ notification.text }}
        </div>
        <div class="modal" v-bind:class="{ 'is-active': modalIsActive }">
            <div class="modal-background" v-on:click="toggleModal"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">{{ activity.title }} </p>
                    <button class="delete" aria-label="close" v-on:click="toggleModal"></button>
                </header>
                <section class="modal-card-body">
                    <div class="">
                        <div class="columns">
                            <div class="column">
                                <h5 class="title is-5">Worum gehts?</h5>
                                <p>{{ activity.description }}</p>
                            </div>
                            <div class="column">
                                <h5 class="title is-5">Bewertung</h5>
                                <img src="img/logo_ruhr_coal.png" alt="" class="coalRating" v-for="(item, index) in 5" :key="index" v-bind:class="[((index+1) <= rating) ? 'rated' : '']">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <h5 class="title is-5">Activity Daten</h5>
                                <table class="table is-fullwidth is-striped">
                                    <tbody>
                                        <tr>
                                            <td>Kategorie</td>
                                            <td>{{ activity.category }}</td>
                                        </tr>
                                        <tr>
                                            <td>Erstellt von</td>
                                            <td>{{ activity.user.name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Öffnungszeiten</td>
                                            <td>{{ activity.opening_hours }}</td>
                                        </tr>
                                        <tr>
                                            <td>Personenanzahl</td>
                                            <td>{{ activity.person_count }}</td>
                                        </tr>
                                        <tr>
                                            <td>Studentenrabatt</td>
                                            <td>{{ (activity.student_discount == 1) ? 'Ja' : 'Nein' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wetter</td>
                                            <td>{{ activity.weather }}</td>
                                        </tr>
                                        <tr>
                                            <td>Preis</td>
                                            <td>{{ activity.price }} €</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="column">
                                <div class="columns">
                                    <div class="column is-4">
                                        <img v-bind:src="activity.location.photo_url" class="image"/>
                                    </div>
                                    <div class="column is-8">
                                        <h5 class="title is-5">Adresse</h5>
                                        <p>
                                            {{ activity.location.adress }}<br/>
                                            {{ activity.location.city }}<br/>
                                            {{ activity.location.zip }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <!--TODO: activity participated ins Objekt eintragen um mich auch wieder abzumelden und im if ändern -->
                    <button class="button is-success" v-on:click="participateActivity" v-if="activity.modeltype == 'gactivity' && !participated">An dieser Activity teilnehmen</button>
                    <button class="button is-danger" v-on:click="unparticipateActivity" v-else-if="activity.modeltype == 'gactivity' && participated">Mich von dieser Activity abmelden</button>
                    <button class="button is-danger is-outlined" v-on:click="toggleModal">Abbrechen</button>
                </footer>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    export default {
        props: [
            "activity"
        ],
        data() {
            return {
                participated: false,
                rating: 0,
                modalIsActive: false,
                notificationIsActive: false,
                notification: {
                    text: '',
                    type: ''
                }
            }
        },
        methods: {
            toggleModal() {
                this.modalIsActive = !this.modalIsActive;
            },
            participateActivity() {
                // this.toggleModal();
                this.toggleNotification('anmelden');
                axios.post('http://localhost:8000/api/v1/gactivity/participate/'+this.activity.id)
                    .then((res) => {
                        console.log(res.data);
                    })
                    .catch((err) => {
                        console.log('error', err);
                })
            },
            unparticipateActivity() {
                this.toggleNotification('abmelden');
            },
            toggleNotification(type) {
                const notifications = {
                    'anmelden': 'Sie nehmen an der Activity ' + this.activity.title + ' teil.',
                    'abmelden': 'Sie haben sich von der Activity ' + this.activity.title + ' abgemeldet.'
                };
                if(!this.notificationIsActive) {
                    setTimeout(this.closeNotification, 3000);
                }
                this.notification.text = notifications[type];
                this.notification.type = type;
                this.notificationIsActive = !this.notificationIsActive;
            },
            closeNotification() {
                this.notificationIsActive = false;
            },
            signedIn(){
                return window.Application.signedIn;
            }
        },
        created() {
            console.log(this.activity);

            this.rating = Math.floor((Math.random() * 5) + 1);


            if (this.signedIn()) {
            if (this.activity.participants) {
                var participans = this.activity.participants;
                for (let i = 0; i < participans.length; i++) {
                    if (window.Application.user.id == participans[i].id) {
                        this.participated == true;
                        console.log('true');
                    }
                }
            }
        }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/variables';

    .image{
        width: 100%;
    }

    .card{
        margin-bottom: 30px;
        transition: box-shadow .5s ease;

        &:hover{
            box-shadow: 0 6px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);
            transition: box-shadow .5s ease;
        }
    }

    .table {
        td:first-child {
            font-weight: bold;
        }
    }

    .modal-card-head {
        background: $primary-light;
    }

    .modal-card-title {
        color: #fff;
    }

    .card{
        cursor: pointer;
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
                background-repeat: no-repeat;
                background-position: 50% 50%;
                background-size: cover;
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
                position: absolute;
                top: 0;
                bottom: 0;
                right: 0;
                display: flex;
                align-items: center;
                padding: 0 30px;

                &:hover{
                    background-color: $grey-light;
                    cursor: pointer;
                }
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

    .modal-card{
        width: 1100px;
    }

    .notification{
        z-index: 9999999;
        opacity: 0;
        visibility: hidden;
        position: fixed;
        top: 20px;
        right: 20px;
        max-width: 500px;

        -webkit-transition: opacity .5s ease, visibility 0s ease .5s;
        -moz-transition: opacity .5s ease, visibility 0s ease .5s;
        -ms-transition: opacity .5s ease, visibility 0s ease .5s;
        -o-transition: opacity .5s ease, visibility 0s ease .5s;
        transition: opacity .5s ease, visibility 0s ease .5s;

        &.is-active{
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity .5s ease, visibility 0s ease 0s;
            -moz-transition: opacity .5s ease, visibility 0s ease 0s;
            -ms-transition: opacity .5s ease, visibility 0s ease 0s;
            -o-transition: opacity .5s ease, visibility 0s ease 0s;
            transition: opacity .5s ease, visibility 0s ease 0s;
        }
    }

    .coalRating{
        opacity: .3;

        &.rated{
            opacity: 1;
        }
    }

    .modeltypeTag{
        position: absolute;
        top: 0;
        right: 0;
        background-color: $primary-light;
        color: #fff;
        padding: 2px 10px;

        z-index: 1;
    }
</style>