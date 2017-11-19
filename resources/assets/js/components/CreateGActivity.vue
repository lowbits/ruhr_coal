<!-- Create acivities for the real Gs-->
<template>
    <div id="form_create" class="form">
        <h1>Geführte Aktivität erstellen</h1>
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
            <!--Date-->
            <div class="field is-horizontal">
                <div class="field-label is-normal column is-one-quarter">
                    <label class="label">Datum</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="date" v-model="form.date" required>
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
            <!--Rythmus-->
            <div class="field is-horizontal">
                <div class="field-label is-normal column is-one-quarter">
                    <label class="label">Rythmus</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="controlhas-icons-right">
                            <div class="select">
                                <select class="is-danger" v-model="form.rhythm" required>
                                    <option>einmalig</option>
                                    <option>wöchentlich</option>
                                    <option>zweiwöchentlich</option>
                                </select>
                                <span class="icon is-small is-right">
                    <i class="fa wi-day-sunny"></i>
                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Personenzahl min-->
            <div class="field is-horizontal">
                <div class="field-label is-normal column is-one-quarter">
                    <label class="label">Personen min.</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control has-icons-right">
                            <input class="input" type="text" placeholder="Für wie viele Personen ist deine Aktivität mindestens?" maxLength="2" v-model="form.min_person_count" required>
                            <span class="icon is-small is-right">
                            <i class="fa fa-users"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--Personenzahl max-->
            <div class="field is-horizontal">
                <div class="field-label is-normal column is-one-quarter">
                    <label class="label">Personen max.</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control has-icons-right">
                            <input class="input" type="text" placeholder="Für wie viele Personen ist deine Aktivität maximal?" maxLength="2" v-model="form.max_person_count" required>
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
                    title: 'Hier steht dein Titel',
                    description: 'Hier steht eine interessante Beschreibung, die richtig Lust auf die Aktivität macht',
                    weather: 'ab 42°C mit Sandalen und Socken',
                    user_id: 1,
                    opening_hours_from: '20:00',
                    opening_hours_to: '22:00',
                    price: 1,
                    location: 'Duisburg',
                    location_id: 1,
                    person_count: 1,
                    is_public: true,
                    category: 'Führung',
                    date: '2017-11-17',
                    rhythm: 'einmalig',
                    min_person_count: 1,
                    max_person_count: 1
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
                /*
                $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('location_id');
            $table->string('category')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('max_person_count')->nullable();
            $table->integer('min_person_count')->nullable();
            $table->boolean('is_public')->nullable();
            $table->string('rhythm')->nullable();
            $table->dateTime('date')->nullable();

                 */
                axios.post('/api/v1/gactivity', {
                    title: this.form.title,
                    description: this.form.description,
                    user_id: this.form.user_id,
                    location_id: this.form.location_id,
                    category: this.form.category,
                    price: this.form.price,
                    min_person_count: this.form.min_person_count,
                    max_person_count: this.form.max_person_count,
                    is_public: this.form.is_public,
                    rhythm: this.form.rhythm,
                    date: this.form.date
                }).then((res) => {
                })
                    .catch((err) => {
                        console.error('Error in App.vue. AJAX failed.');
                        new Error(err);
                    })
            }
        },
        created(){
            axios.get('/api/v1/location')
                .then((res) => {
                    const loc = res.data;
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