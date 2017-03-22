<template>
    <form action="save/" method="POST">
        <input type="hidden" name="_token" :value="token">
        <div class="field">
            <label for="content" class="label">Link</label>
            <input type="text" v-model="QrContent" @keyup="updateQrCode" class="input" id="content">
        </div>
        <canvas id="qr-code"></canvas>
        <!-- <button class="button is-fullwidth is-large is-warning">Save</button> -->
    </form>
</template>

<script>
    export default {
        data() {
            return {
                QrCode: {},
                QrContent: 'http://',
                token: window.Laravel.csrfToken
            }
        },

        mounted() {

            this.QrCode = new QRious({
                element: document.getElementById('qr-code'),
                value: this.QrContent,
                size: 1024,
            })
        },

        methods: {
            updateQrCode() {
                this.QrCode.value = this.QrContent
            }
        }
    }
</script>