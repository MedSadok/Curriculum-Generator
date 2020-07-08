import Vue from "vue";
import App from "./App.vue";
import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "font-awesome/css/font-awesome.min.css";
import VueFilterDateFormat from "vue-filter-date-format";
import VueCircleSlider from 'vue-circle-slider';
import { ColorPickerPlugin } from '@syncfusion/ej2-vue-inputs';
import { DropDownButtonPlugin } from '@syncfusion/ej2-vue-splitbuttons';
import { enableRipple } from '@syncfusion/ej2-base';

enableRipple(true);

Vue.use(DropDownButtonPlugin);
Vue.use(ColorPickerPlugin);
Vue.use(VueCircleSlider);
Vue.use(VueFilterDateFormat);

Vue.component('VueFontawesome', require('vue-fontawesome-icon/VueFontawesome.vue').default);

Vue.use(BootstrapVue);
Vue.config.productionTip = false;


new Vue({
    render: h => h(App)
}).$mount("#app");