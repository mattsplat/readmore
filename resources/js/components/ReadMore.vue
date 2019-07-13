<template>
    <div>
        <p @click="toggle" v-bind:class="{ 'pt-3 pb-3': showAll}">
            {{ message }}
            <span
                    v-if="!showAll"
                    class="read-more-mask"
            >
                <span v-html="mask"></span>
            </span>
        </p>
    </div>

</template>

<script>
    export default {
        name: "read-more",
        props: {
            text: String,
            max: {
                type: Number,
                default: function () {
                    return 20
                },
            },
            mask: {
                type: String,
                default: function () {
                    return ' ...'
                },
            },
            options: Object,
        },
        data() {
            return {
                showAll: false,

            }

        },
        computed: {
            message: function () {

                if(this.text.length <= this.max || this.showAll){

                    this.showAll = true
                    return this.text

                } else {

                    return this.text.substring(0, this.max)

                }

            }
        },

        methods: {
            toggle() {
                this.showAll = !this.showAll
            }
        }
    }
</script>

<style scoped>
    .read-more-mask {
        color: var(--primary);
        font-weight: 800;
    }
    .read-more-mask:hover {
        cursor: pointer;
        color: var(--primary-dark);
    }
</style>
