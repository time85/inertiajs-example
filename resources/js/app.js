require('./bootstrap');

import {createApp, h} from 'vue';
import { App, plugin, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress'

const el = document.getElementById('app');
InertiaProgress.init();


import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faPencilAlt, faTrash, faSave, faPlus  } from "@fortawesome/free-solid-svg-icons";

library.add(faPencilAlt);
library.add(faTrash);
library.add(faSave);
library.add(faPlus);

const app = createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => require(`./Pages/${name}`).default
    })
});


app.config.globalProperties.$route = window.route;
app.provide('$route', window.route);

app
    .component('InertiaLink', Link)
    .component('FontAwesomeIcon', FontAwesomeIcon)
    .use(plugin)
    .mount(el);
