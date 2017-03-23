<template>
    <canvas id="qr-code"></canvas>
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
            }
        },

        data() {
            return {
                QrCode: {}
            }
        },

        mounted() {
            this.QrCode = new QRious({
                element: document.getElementById('qr-code'),
                value: this.generateContent,
                size: 300,
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
                        return ''
                        break
                }
            }
        }
    }
</script>