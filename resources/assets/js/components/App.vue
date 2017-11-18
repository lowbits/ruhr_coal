<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-8">
                    <article class="message">
                        <div class="message-header">Example Component</div>

                        <div class="message-body">
                            I'm an example component!
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
