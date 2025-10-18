import './bootstrap';
window.Vue = require('vue').default;

import Vue from 'vue'
import Paginate from 'vuejs-paginate'


Vue.component('news-relation', require('./components/news/Relation.vue').default);
Vue.component('players-detail', require('./components/players/Detail.vue').default);
Vue.component('players-belongs', require('./components/players/Belongs.vue').default);
Vue.component('game-select-year', require('./components/games/SelectYear.vue').default);
Vue.component('game-list', require('./components/games/List.vue').default);
Vue.component('team-select-year', require('./components/teams/SelectYear.vue').default);
Vue.component('top-game', require('./components/top/Game.vue').default);
Vue.component('youtube', require('./components/Youtube.vue').default);
Vue.component('sns-timeline', require('./components/SnsTimeLine.vue').default);
Vue.component('admin-news-tag', require('./components/admin/news/Tag.vue').default);
Vue.component('paginate', Paginate);


const app = new Vue({
    el: '#app',
});