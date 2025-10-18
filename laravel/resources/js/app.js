import './bootstrap';
import { createApp } from 'vue';
import Paginate from 'vuejs-paginate';
import PlayerDetail from './components/players/Detail.vue';
import GameList from './components/games/List.vue';
import SelectYear from './components/games/SelectYear.vue';
import TeamSelectYear from './components/teams/SelectYear.vue';
import TopGame from './components/top/Game.vue';
import Youtube from './components/Youtube.vue';
import NewsRelation from './components/news/Relation.vue';
import SnsTimeLine from './components/SnsTimeLine.vue';
const app = createApp({});

app.component('news-relation', NewsRelation);
app.component('players-detail', PlayerDetail);
app.component('game-select-year', SelectYear);
app.component('game-list', GameList);
app.component('team-select-year', TeamSelectYear);
app.component('top-game', TopGame);
app.component('youtube', Youtube);
app.component('sns-timeline', SnsTimeLine);
app.component('paginate', Paginate);

app.mount('#app');