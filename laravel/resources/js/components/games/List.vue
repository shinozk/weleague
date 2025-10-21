<template>
    <div>
        <section v-if="items.movies?.length > 0">
            <div class="video">
                <div class="section-name">
                    <h2>VIDEO</h2>
                    <h5 v-if="this.mode != ''">{{ title }}</h5>
                    <p>動画</p>
                </div>
                <div class="video-item">
                    <a class="main-video" :href="items?.movies[0]">
                        <iframe
                            width="100%"
                            height="360px"
                            :src="items?.movies[0]"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        >
                        </iframe>
                    </a>
                    <div v-if="items.movies?.length > 1" class="sub-video">
                        <a class="sub-video__left" :href="items?.movies[1]">
                            <iframe
                                width="100%"
                                :src="items?.movies[1]"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            >
                            </iframe>
                        </a>
                        <a
                            v-if="items.movies?.length > 2"
                            class="sub-video__left"
                            :href="items?.movies[2]"
                        >
                            <iframe
                                width="100%"
                                :src="items?.movies[2]"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            >
                            </iframe>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div
                v-if="Object.keys(items.league_games)?.length > 0"
                class="container"
            >
                <div class="mach-result">
                    <div class="section-name">
                        <h2>Games</h2>
                        <h5 v-if="this.mode != ''">{{ title }}</h5>
                        <p>試合一覧</p>
                    </div>
                    <div
                        v-for="(leagues, league_id) in items?.league_games"
                        :key="league_id"
                        class="result-sheet"
                    >
                        <div class="result-list">
                            <div class="result-header">
                                <div class="header-inner">
                                    <a
                                        class="flex-start"
                                        href="javascript:void(0)"
                                        @click="toggle(league_id)"
                                    >
                                        <h3>{{ leagues[0].title }}</h3>
                                        <div
                                            :class="[
                                                selected.includes(league_id)
                                                    ? 'result-icon__left'
                                                    : 'result-icon__down',
                                            ]"
                                        >
                                            <span></span>
                                        </div>
                                    </a>
                                    <a
                                        class="line-item"
                                        href="javascript:void(0)"
                                        @click="showRanking(league_id)"
                                    >
                                        <p>順位表</p>
                                        <span class="result-icon__right"></span>
                                    </a>
                                </div>
                            </div>
                            <ul v-if="!selected.includes(league_id)">
                                <li
                                    v-for="(game, index) in leagues"
                                    :key="game.id"
                                    :class="[
                                        index % 2 == 0
                                            ? 'result-col back-color__e'
                                            : 'result-col back-color__d',
                                    ]"
                                >
                                    <div class="result-item__top flex-start">
                                        <div class="flex-start">
                                            <p class="font-s">
                                                {{ game.title_detail }}
                                            </p>
                                            <p class="font-s">
                                                {{ game.game_time }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="font-m">
                                                {{ game.stadium_name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="result-item__bottm line-item">
                                        <div class="result-left line-item">
                                            <a
                                                :href="`/teams/${game.home_team_id}`"
                                            >
                                                <div class="flex-start">
                                                    <img
                                                        width="32px"
                                                        :src="
                                                            game.home_team_image
                                                        "
                                                        :alt="
                                                            game.home_team_name
                                                        "
                                                    />
                                                    <p class="font-s">
                                                        {{
                                                            game.home_team_name
                                                        }}
                                                    </p>
                                                </div>
                                            </a>
                                            <a :href="`/games/${game.id}`">
                                                <p class="font-m">
                                                    {{
                                                        game.score1st_home +
                                                        game.score2nd_home +
                                                        game.score1ex_home +
                                                        game.score2ex_home
                                                    }}
                                                </p>
                                            </a>
                                        </div>
                                        <a :href="`/games/${game.id}`">
                                            <p class="result-ber font-m">-</p>
                                        </a>
                                        <div class="result-right line-item">
                                            <a :href="`/games/${game.id}`">
                                                <p class="font-m">
                                                    {{
                                                        game.score1st_away +
                                                        game.score2nd_away +
                                                        game.score1ex_away +
                                                        game.score2ex_away
                                                    }}
                                                </p>
                                            </a>
                                            <a
                                                :href="`/teams/${game.away_team_id}`"
                                            >
                                                <div class="flex-start">
                                                    <img
                                                        width="32px"
                                                        :src="
                                                            game.away_team_image
                                                        "
                                                        :alt="
                                                            game.away_team_name
                                                        "
                                                    />
                                                    <p class="font-s">
                                                        {{
                                                            game.away_team_name
                                                        }}
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <paginate
                        :margin-pages="2"
                        :click-handler="clickPager"
                        :prev-text="'＜'"
                        :prev-link-class="'page-link'"
                        :container-class="'pagination'"
                        :page-count="pager.last_page"
                        :page-range="5"
                        :page-class="'page-item'"
                        :page-link-class="'page-link'"
                        :next-link-class="'page-link'"
                        :next-text="'＞'"
                    ></paginate>
                </div>
            </div>
            <div v-else class="container">
                <div class="mach-result">
                    <h5>試合情報がありません</h5>
                    <h5 style="margin: 40px"></h5>
                    <p><a href="/games">試合一覧に戻る→</a></p>
                </div>
            </div>
        </section>
        <div class="modal" id="modal">
            <a href="#!" class="overlay"></a>
            <div class="modal-wrapper">
                <div v-if="selectedRanking?.length > 0" class="modal-contents">
                    <a href="#!" class="modal-close">✕</a>
                    <div class="modal-content">
                        <div class="section-name">
                            <h5>{{ selectedRanking[0]["league_name"] }}</h5>
                        </div>
                        <table>
                            <tr>
                                <th>No.</th>
                                <th>チーム</th>
                                <th>勝点</th>
                                <th>試合</th>
                                <th>勝利</th>
                                <th>負け</th>
                                <th>引分</th>
                                <th>得点</th>
                                <th>失点</th>
                                <th>得失</th>
                            </tr>
                            <tr
                                v-for="ranking in selectedRanking"
                                :key="ranking.rank"
                            >
                                <td>{{ ranking.rank }}</td>
                                <td>
                                    <a
                                        :href="`/teams/${ranking.team_id}`"
                                        style="font-size: small"
                                    >
                                        <img
                                            width="24px"
                                            :src="ranking.team_image"
                                            :alt="ranking.team_name"
                                        />
                                        {{ ranking.team_name.slice(0, 4) }}
                                    </a>
                                </td>
                                <td>{{ ranking.point }}</td>
                                <td>{{ ranking.matches }}</td>
                                <td>{{ ranking.win }}</td>
                                <td>{{ ranking.lose }}</td>
                                <td>{{ ranking.draw }}</td>
                                <td>{{ ranking.goal }}</td>
                                <td>{{ ranking.against }}</td>
                                <td>{{ ranking.differential }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        mode: {
            type: String,
            default: null,
        },
        id: {
            type: Number,
            default: null,
        },
        action: {
            type: String,
            default: null,
        },
        year: {
            type: Number,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            items: [],
            selected: [],
            pager: {},
            ranking: [],
            selectedRanking: [],
        };
    },
    created() {
        this.getItems();
    },
    methods: {
        getItems() {
            let param = {};
            if (this.id != null) {
                param.id = this.id;
            }
            if (this.mode != null) {
                param.mode = this.mode;
            }
            if (this.action != null) {
                param.action = this.action;
            }
            if (this.year != null) {
                param.year = this.year;
            }
            const token = document.head.querySelector('meta[name="csrf-token"]');
            axios
                .post(`/ajax/games/lists${location.search}`, param,
                    {
                        headers: {
                            "X-CSRF-TOKEN": token.content,
                        },
                    }
                )
                .then((response) => {
                    const ret = response.data.data;
                    this.items = ret;
                    this.pager = ret.pager;
                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
        toggle(league_id) {
            if (this.selected.includes(league_id)) {
                this.selected = this.selected.filter((id) => id != league_id);
            } else {
                this.selected.push(league_id);
            }
        },
        clickPager(pageNum) {
            console.log(`pageNum = ${pageNum}`);
            if (location.search.includes("page=")) {
                const now = location.search;
                const url = now.replace(/page\=\d+/i, `page=${[pageNum]}`);
                history.replaceState("", "", url);
            } else {
                const add = location.search.includes("?") ? "&" : "?";
                history.replaceState(
                    "",
                    "",
                    `${location.search}${add}page=${pageNum}`
                );
            }
            this.getItems();
        },
        showRanking(league_id) {
            if (this.ranking[league_id] != undefined) {
                this.selectedRanking = this.ranking[league_id];
                location.href = "#modal";
                return;
            }

            const param = {
                year: this.year,
                id: league_id,
            };
            const token = document.head.querySelector('meta[name="csrf-token"]');

            axios
                .post("/ajax/teams/ranking", param,
                    {
                        headers: {
                            "X-CSRF-TOKEN": token.content,
                        },
                    }                
                )
                .then((response) => {
                    const ret = response.data.data;
                    this.ranking[league_id] = ret;
                    this.selectedRanking = this.ranking[league_id];
                    location.href = "#modal";
                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
    },
};
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

table th {
    padding: 8px;
    margin: 2px;
    background-color: #333;
    border: solid 1px #333;
    color: #fff;
}

table td {
    text-align: center;
    border: solid 1px #333;
    color: #333;
    padding: 8px;
}

table tr {
    background-color: #ddd;
}

table tr:nth-child(odd) {
    background-color: #eee;
}

.section-name h5 {
    margin-top: 8px;
    padding: 0;
    font-size: 16px;
    font-family: "Montserrat", sans-serif;
    color: #e41c7b;
}

.modal-open {
    display: inline-block;
    background-color: #666;
    color: #fff;
    margin: 10px;
}
.modal-open a {
    display: inline-block;
    padding: 5px;
    text-decoration: none;
    color: #fff;
}
/*** 以下モーダル用CSS ***/
.modal {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
}
.modal:not(:target) {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s, visibility 0.5s;
}
.modal:target {
    opacity: 1;
    visibility: visible;
    transition: opacity 0.5s, visibility 0.5s;
}
.modal .overlay {
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: #000;
    opacity: 0.7;
    top: 0;
    left: 0;
}
.modal-wrapper {
    width: 100%;
    max-width: 650px;
    min-width: 300px;
    height: 100%;
    max-height: 550px;
    background-color: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.modal-contents {
    overflow: auto;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    position: relative;
}
.modal-content {
    margin: 25px;
}
.modal-close {
    position: absolute;
    top: 5px;
    right: 10px;
    text-decoration: none;
}
</style>
