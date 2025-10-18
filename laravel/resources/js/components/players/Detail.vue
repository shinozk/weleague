<template>
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li v-if="latest_team.year != null" class="breadcrumb-item"><a :href=" `/teams/${latest_team.team_id}`">{{ latest_team.team_name }}</a></li>
                    <li v-if="latest_team.year != null" class="breadcrumb-item"><a :href=" `/teams/${latest_team.team_id}/${latest_team.year}/players`">{{ latest_team.year + "年選手一覧" }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ player.name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">選手</li>
                        <li v-if="latest_image != null" class="list-group-item"><img class="player-image resposive-img" :src=" latest_image "></li>
                        <li class="list-group-item">{{ player.name }}</li>
                        <li class="list-group-item">{{ player.english }}</li>
                    </ul>
                </div>
                <div v-if="player.birthday != '1970-01-01'" class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">生年月日</li>
                        <li class="list-group-item">{{ player.birthday }}</li>
                        <li class="list-group-item">{{ getAge(player.birthday) }}歳</li>
                    </ul>
               </div>

                <div v-if="player.height" class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">身長・体重</li>
                        <li class="list-group-item">{{ player.height }}cm</li>
                        <li class="list-group-item">{{ player.weight }}kg</li>
                    </ul>
                </div>
                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">国籍</li>
                        <li class="list-group-item">{{ player.country_name }}</li>
                    </ul>
                </div>

                <news-relation mode="players" :id="player.id"></news-relation>
                <sns-timeline mode="players" :id="player.id"></sns-timeline>
            </div>

            <div class="col-md-4">
                <ul v-for="(itemList, year) in items" :key="year" class="list-group" style="margin-bottom:10px;">
                    <li class="list-group-item list-group-item-secondary">{{ year }}年</li>
                    <template v-for="item in itemList.teams">

                    <li v-if="item.belongs.photo " class="list-group-item">
                        <img class="player-image resposive-img" :src=" item.belongs.photo " :alt=" year + '年' + item.belongs.player_name">
                    </li>
                    <li class="list-group-item">
                        <a :href="'/teams/' + item.belongs.team_id">{{ item.belongs.team_name }}</a>
                        <span style="float:right;font-size: small;">{{ item.belongs.position }}  {{ item.belongs.uniform_number }}</span>
                    </li>
                    <li class="list-group-item" v-if="item.stats.goal > 0">
                        <a :href="`/games/players/${player.id}/Goal?year=${year}`">ゴール：{{ item.stats.goal }}</a>
                    </li>
                    <li class="list-group-item">
                        <span style="float:left">
                            <a v-if="item.stats.start > 0" :href="`/games/players/${player.id}/Start?year=${year}`">先発登録：{{ item.stats.start }}</a>
                            <template v-else>先発登録：0</template>
                        </span>
                        <span style="float:right">
                            <a v-if="item.stats.sub > 0" :href="`/games/players/${player.id}/Sub?year=${year}`">リサーブ：{{ item.stats.sub }}</a>
                            <template v-else>リサーブ：0</template>
                        </span>
                    </li>
                    <li class="list-group-item">
                        <span style="float:left">
                            <a v-if="item.stats.in > 0" :href="`/games/players/${player.id}/In?year=${year}`">途中出場：{{ item.stats.in }}</a>
                            <template v-else>途中出場：0</template>
                        </span>
                        <span style="float:right">
                            <a v-if="item.stats.out > 0" :href="`/games/players/${player.id}/Out?year=${year}`">途中交代：{{ item.stats.out }}</a>
                            <template v-else>途中交代：0</template>
                        </span>
                    </li>
                    <li class="list-group-item">
                        <span style="float:left">
                            <a v-if="item.stats.yellow > 0" :href="`/games/players/${player.id}/Yellow?year=${year}`">警告：{{ item.stats.yellow }}</a>
                            <template v-else>警告：0</template>
                        </span>
                        <span style="float:right">
                            <a v-if="item.stats.red > 0" :href="`/games/players/${player.id}/Red?year=${year}`">退場：{{ item.stats.red }}</a>
                            <template v-else>退場：0</template>
                        </span>

                    </li>
                    </template>
                    <template  v-if="itemList.nationals">
                        <template v-for="item in itemList.nationals">
                            <li class="list-group-item list-group-item-secondary">{{ item.category_id == 1 ? 'A代表' : `U-${item.category_id}代表` }}</li>
                            <li class="list-group-item">
                               <img class="player-image resposive-img" :src="item.img_url">
                            </li>
                        </template>
                    </template>
                </ul>
            </div>

            <div class="col-md-4">
                <div class="news-img">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">掲示板</li>
                        <li class="list-group-item"><a class="btn btn-success" :href="`/comments/players/${player.id}`">掲示板に行く</a></li>
                    </ul>
                </div>
                <div class="player-movie">
                    <youtube v-bind:keyword=" player.name "/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            player : {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                latest_image: null,
                latest_team: {
                    year: null,
                    team_id: null,
                    team_name: null
                },
                items:[]
            }
        },
        created() {
            axios.post(`/ajax/players/${this.player.id}/belong`,
            ).then(response => {
                const ret = response.data.data;
                this.items = ret;
                let image = null;
                let latest = {};
                Object.keys(ret).forEach(function(year, index) {
                    const belongs = ret[year].teams[0].belongs;
                    if (belongs.photo) {
                        image = belongs.photo
                    }
                    latest = {
                        year: year,
                        team_id: belongs.team_id,
                        team_name: belongs.team_name
                   };
                });
                this.latest_image = image;
                this.latest_team = latest;
            })
        },
        computed: {
            getAge: function () {
                return function(birthdayString) {
                    const today = new Date();
                    const target = birthdayString.split('-');
                    let birthday = new Date(target[0], target[1], target[2]);
                    let thisYearsBirthday = new Date(today.getFullYear(), birthday.getMonth()-1, birthday.getDate());
                    let age = today.getFullYear() - birthday.getFullYear();
                    if(today < thisYearsBirthday){
                        age--;
                    }
                    return age;
                }
            }
        }
    }
</script>
