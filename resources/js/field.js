Nova.booting((Vue, router, store) => {
    Vue.component('index-readmore', require('./components/IndexField'))
    Vue.component('detail-readmore', require('./components/DetailField'))
    Vue.component('form-readmore', require('./components/FormField'))
})
