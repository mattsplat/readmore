Nova.booting((Vue, router, store) => {
    Vue.component('index-read-more', require('./components/IndexField'))
    Vue.component('read-more', require('./components/ReadMore'));
})
