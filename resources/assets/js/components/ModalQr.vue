<template>
    <transition name="fade">
        <div v-if="show" class="modal is-active">
            <div class="modal-background" @click="show = false"></div>
            <div class="modal-content" @click.stop>
                <div class="modal-card code">
                    <form :action="action" style="display: none" method="POST" :id="formId">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="dynamic_link" v-model="link">
                        <input type="hidden" name="name" v-model="name">
                        <textarea name="description" v-model="description"></textarea>
                    </form>
                    <header class="modal-card-head">
                        <div class="modal-card-title">
                            <span v-if="!edit">{{ setName }}</span>
                            <input type="text" class="input" v-if="edit" name="name" v-model="name">
                        </div>
                    </header>
                    <section class="modal-card-body has-text-centered">
                        <qr v-if="!edit" :content="qrContent"></qr>
                        <p v-if="!edit">{{ setDescription }}</p>
                        <p class="control">
                            <textarea name="description" class="textarea" v-if="edit" v-model="description"></textarea>
                        </p>
                        <p class="control">
                            <input type="text" class="input" :disabled="!edit" v-model="link">
                        </p>
                    </section>
                    <footer class="modal-card-foot">
                        <a class="button is-success" v-if="edit" @click="submitForm">Save</a>
                        <a class="button" v-if="!edit">Download</a>
                        <a class="button" @click="edit = !edit" v-if="!edit">Edit</a>
                        <a class="button" @click="edit = !edit" v-if="edit">Cancel</a>
                        <a class="button">Delete</a>
                    </footer>
                </div>
            </div>
            <button class="modal-close" @click="show = false"></button>
        </div>
    </transition>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
                edit: false,
                name: '',
                description: '',
                link: '',
                token: Laravel.csrfToken,
                formId: ''
            }
        },

        props: [ 'staticLink', 'setName', 'setDescription', 'setLink' ],

        computed: {
            qrContent() {
                return Laravel.url + '/dynamic/' + this.staticLink
            },

            action() {
                return Laravel.url + '/dynamic/' + this.staticLink + '/update'
            },
        },

        methods: {
            randomId() {
                return Math.random().toString(36).substr(2, 15)
            },

            submitForm() {
                document.getElementById(this.formId).submit()
            }
        },

        mounted() {
            this.name = this.setName
            this.description = this.setDescription
            this.link = this.setLink
            this.formId = this.randomId()
        }
    }
</script>

<style lang="sass">
    .code 
        &.modal-card 
            text-align: center
            width: 400px
            max-width: 100%
            margin: 0 auto
        .image  
            text-align: center

    .fade-enter-active, .fade-leave-active
        transition: opacity .3s, transform .3s
    .fade-enter, .fade-leave-to
        opacity: 0
        transform: scale(1.1)
</style>