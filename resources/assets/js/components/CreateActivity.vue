<template>
    <div id="form_create" class="form">
        <form v-on:submit.prevent="send">
        <!--
        title	string
        description	string
        weather	string
        user_id	int
        opening_hours	string
        price	float
        student_discount	bool
        location_id	int
        person_count	int
        is_public	boolean
        category	string
        -->
        <!--Title-->
        <div class="field is-horizontal">
            <div class="field-label is-normal column is-one-quarter">
                <label class="label">Titel</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-danger is-expanded">
                    <input class="input" type="text" placeholder="Gib einen Titel ein" v-model="form.title" required>
                <!--<span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fa fa-warning"></i>
                </span>-->
                </div>
                </div>
            </div>
            <!--<p class="help is-danger">This email is invalid</p>-->
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
                        <input class="input" type="text" placeholder="Wo ist deine Aktivität?" v-model="form.location" required>
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
                                <option>Sonnig</option>
                                <option>Wolkig</option>
                                <option>ein bisschen Regen</option>
                                <option>Sturm</option>
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
        <div class="field is-grouped">
            <p class="control">
                <!--v-on:submit="this.send"-->
                <input type="submit" class="button"  value="Aktivität erstellen">
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
                    weather: 'Sonnig',
                    user_id: 1,
                    opening_hours_from: '20:00',
                    opening_hours_to: '22:00',
                    price: 1,
                    student_discount: false,
                    location_id: 1,
                    person_count: 1,
                    is_public: true,
                    category: 'Essen & Trinken',
                }
            }
        },
        methods: {
            send: function(){
                this.form.opening_hours="von "+this.form.opening_hours_from+" Uhr - "+this.form.opening_hours_to+" Uhr";
                console.log(this.form);
                axios.post('/api/v1/activity/create/', this.form);
            }
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