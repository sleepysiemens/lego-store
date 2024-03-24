import './bootstrap';
//import { createApp } from 'vue';
import { createApp } from 'vue/dist/vue.esm-bundler';

const app = createApp({});

import SearchbarComponent from './components/SearchbarComponent.vue';
import MainSearchComponent from './components/MainSearchComponent.vue';

app.component('searchbar-component', SearchbarComponent);
app.component('main-search-component', MainSearchComponent);

app.mount('#app');
