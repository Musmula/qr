<template>
    <transition name="fade">
        <div v-if="show" class="modal is-active">
            <div class="modal-background" @click="show = false"></div>
            <div class="modal-content" @click.stop>
                <div class="box code">
                    <h2><slot name="name"></slot></h2>
                    <slot></slot>
                    <div class="image">
                        <qr :content="qrContent"></qr>
                    </div>
                </div>
            </div>
            <button class="modal-close" @click="show = false"></button>
        </div>
    </transition>
</template>

<style lang="sass">
    .code 
        &.box 
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

<script>
    export default {
        data() {
            return {
                show: false
            }
        },

        props: [ 'url' ],

        computed: {
            qrContent() {
                return Laravel.url + '/dynamic/' + this.url
            }
        }
    }
</script>