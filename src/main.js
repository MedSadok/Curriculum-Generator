import Vue from "vue";
import App from "./App.vue";
import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import { library } from "@fortawesome/fontawesome-svg-core"
import { faUserSecret } from "@fortawesome/free-solid-svg-icons"
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome"
import VueFilterDateFormat from "vue-filter-date-format";
import VueCircleSlider from 'vue-circle-slider'

Vue.use(VueCircleSlider)

Vue.use(VueFilterDateFormat);

library.add(faUserSecret)

Vue.component("font-awesome-icon", FontAwesomeIcon)


Vue.use(BootstrapVue);
Vue.config.productionTip = false;


new Vue({
    render: h => h(App)
}).$mount("#app");