<template>
    <div id="form_create" class="form">
        <h1>Aktivität erstellen</h1>
        <form v-on:submit.prevent="send">
        <!--Title-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Titel</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-danger is-expanded">
                    <input class="input" type="text" placeholder="Gib einen Titel ein" v-model="form.title" required>
                </div>
                </div>
            </div>
        </div>
        <!-- Description-->
        <div class="field is-horizontal is-grouped is-grouped-left">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Beschreibung</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <textarea class="textarea" placeholder="Beschreibe deine Aktivität" v-model="form.description" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!--category-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Kategorie</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-right">
                        <div class="select">
                            <select class="is-danger" v-model="form.category" required>
                                <option>Essen & Trinken</option>
                                <option>Event</option>
                                <option>Führung</option>
                            </select>
                            <span class="icon is-small is-right">
                    <i class="fa wi-day-sunny"></i>
                </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Preis-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Preis</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-right">
                        <input class="input" type="text" placeholder="Wie viel Geld?" v-model="form.price" maxLength="3" id="price_input" required>
                        <span class="icon is-small is-right">
                            <i class="fa fa-eur"></i>
                        </span>
                    </div>
                    <div class="control">
                        <label class="checkbox">
                            Studentenrabatt
                            <input type="checkbox" v-model="form.student_discount">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!--Ort-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Ort</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-right">
                        <input class="input" type="text" placeholder="Wo ist deine Aktivität?" v-model="form.location" required  list="suggestions">
                        <datalist id="suggestions" >
                            <option v-for="value in locations" v-bind:value="value.title"></option>
                        </datalist>
                        <span class="icon is-small is-right">
                            <i class="fa fa-map-marker"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--Öffnungszeiten-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Uhrzeit</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        von
                        <input class="input time_input" type="time" v-model="form.opening_hours_from" required>
                        Uhr bis
                        <input class="input time_input" type="time" v-model="form.opening_hours_to" required>
                        Uhr
                    </div>
                </div>
            </div>
        </div>
        <!--Personenzahl-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Personenzahl</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-right">
                        <input class="input" type="text" placeholder="Für wie viele Personen ist deine Aktivität?" maxLength="2" v-model="form.person_count" required>
                        <span class="icon is-small is-right">
                            <i class="fa fa-users"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--weather-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Wetter</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="controlhas-icons-right">
                        <div class="select">
                            <select class="is-danger" v-model="form.weather" required>
                                <option>ab 42°C mit Sandalen und Socken</option>
                                <option>bei jedem Wetter</option>
                                <option>bei trockenem Wetter</option>
                            </select>
                            <span class="icon is-small is-right">
                    <i class="fa wi-day-sunny"></i>
                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--submit-->
        <div class="field is-grouped is-grouped-centered">
            <p class="control">
                <!--v-on:submit="this.send"-->
                <input type="submit" class="button" value="Aktivität erstellen">
            </p>
            <p class="control">
                <a class="button is-light">
                    Abbrechen
                </a>
            </p>
        </div>
        </form>
    </div>
</template>

<script>
    export default{
        data: function data()
        {
            return{
                form: {
                    title: '',
                    description: 'aaf',
                    weather: 'ab 42°C mit Sandalen und Socken',
                    user_id: 1,
                    opening_hours_from: '20:00',
                    opening_hours_to: '22:00',
                    price: 1,
                    student_discount: false,
                    location: '',
                    location_id: 1,
                    person_count: 1,
                    is_public: true,
                    category: 'Essen & Trinken',
                },
                locations: [{
                    title: 'Duisburg'
                }]
            }
        },
        methods: {
            send: function(){
                //opening hours
                this.form.opening_hours="von "+this.form.opening_hours_from+" Uhr - "+this.form.opening_hours_to+" Uhr";
                //get location id
                for (let loc of this.locations){
                    console.log(this.form.location);
                    if (loc.title==this.form.location){
                        console.log('found');
                        this.form.location_id=loc.id;
                    }
                }
                console.log(this.form);
                axios.post('/api/v1/activity', this.form).then((res) => {
                })
                    .catch((err) => {
                        console.error('Error in App.vue. AJAX failed.');
                        new Error(err);
                    })
            }
        },
        created(){
            console.log('created');
            axios.get('/api/v1/location')
                .then((res) => {
                    const loc = res.data;
                    console.log(res.data);
                    this.locations=loc;
                })
                .catch((err) => {
                    console.error('Error in App.vue. AJAX failed.');
                    new Error(err);
                })
        }
    }
</script>

<style>
#form_create{
    width: 500px;
}
.time_input{
    width: 100px;
}
</style>