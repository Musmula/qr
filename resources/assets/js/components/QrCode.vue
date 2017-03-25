<template>
    <canvas :id="randomId" class="qr-code"></canvas>
</template>

<script>
    export default {
        props: {
            content: {
                required: true,
                type: String
            },
            type: {
                required: false,
                default: 'text',
            },
            padding: {
                type: Number,
                required: false,
                default: null
            },
            size: {
                type: Number,
                required: false,
                default: 300
            }
        },

        data() {
            return {
                QrCode: {}
            }
        },

        mounted() {
            this.QrCode = new QRious({
                element: document.getElementById(this.randomId),
                value: this.generateContent,
                size: this.size,
                padding: this.padding
            })
        },

        methods: {
            updateQrCode() {
                this.QrCode.value = this.generateContent
            }
        },

        watch: {
            content() {
                this.updateQrCode()
            }
        },

        computed: {
            randomId() {
                return Math.random().toString(36).substr(2, 15)
            },

            generateContent() {
                switch (this.type){
                    case 'text':
                        return '' + this.content
                        break
                    case 'website':
                        return 'http://' + this.content
                        break
                    case 'vcard':
                        return 'vcard'
                        break
                    default:
                        return this.content
                        break
                }
            }
        }
    }
</script>