<template>
    <div>
        <div class="ownButton" v-on:click="toggleModal">
            <span class="fa fa-plus"></span>
        </div>
        <div class="modal" v-bind:class="{ 'is-active': modalIsActive }">
            <div class="modal-background" v-on:click="toggleModal"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Erstellen</p>
                    <button class="delete" aria-label="close" v-on:click="toggleModal"></button>
                </header>
                <section class="modal-card-body">
                    <createActivity v-if="activeCreateState == 'activity'"></createActivity>
                    <createGActivity v-else></createGActivity>
                </section>
                <footer class="modal-card-foot">
                    <!--TODO: activity participated ins Objekt eintragen um mich auch wieder abzumelden und im if ändern -->
                    <button class="button" v-on:click="changeCreateState('activity')">Activity hinzufügen</button>
                    <button class="button" v-on:click="changeCreateState('gActivity')">Geführte Activity hinzufügen</button>
                    <button class="button" v-on:click="toggleModal">Abbrechen</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>

    import createActivity from './createActivity.vue';
    import createGActivity from './createGActivity.vue';

    export default {
        data() {
            return {
                modalIsActive: false,
                activeCreateState: 'activity'
            }
        },
        components: {
            createActivity,
            createGActivity
        },
        methods: {
            toggleModal() {
                this.modalIsActive = !this.modalIsActive;
            },
            changeCreateState(state) {
                if(state == 'activity') {
                    this.activeCreateState = 'activity'
                }else{
                    this.activeCreateState = 'gActivity'
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .ownButton{
        border-radius: 50%;
        position: fixed;
        bottom: 20px;
        right: 20px;
        height: 80px;
        width: 80px;
        background-color: #00d1b2;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);

        span{
            color: #fff;
            font-size: 30px;
        }

        &:hover{
            cursor: pointer;
            background-color: #00a58c;
        }
    }
</style>