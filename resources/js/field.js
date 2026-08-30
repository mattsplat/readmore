import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-read-more', IndexField)
  app.component('detail-read-more', DetailField)
  app.component('form-read-more', FormField)
})
