<template>
    <div class="news-img">
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary">関連動画</li>
            <li style="display:none"></li>
        </ul>
        <div v-for="(movie, index) in results" v-bind:key="movie.id.videoId">
            <div class="news-card">
                <div class="news-card-image">
                    <a v-bind:href=" `https://www.youtube.com/watch?v=${movie.id.videoId}` ">
                        <img class="card-img-top" v-bind:src="movie.snippet.thumbnails.medium.url">
                    </a>
                </div>
                <h4 style="margin:10px 0 10px 0;"></h4>
                <div class="news-title">
                    <p>{{ movie.snippet.title }}</p>
                </div>
                <p class="card-date">{{ movie.snippet.description}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            keyword: {
                type: String,
                required: true
            },
            limit: {
                type: Number,
                required: false
            },
        },
        data: function() {
console.log(process.env.VITE_GOOGLE_YOUTUBE_API_KEY);
console.log(process.env.MIX_GOOGLE_YOUTUBE_API_KEY);
            return {
                results: null,
                order: "viewCount", // リソースを再生回数の多い順に並べます。
                params: {
                    // 検索クエリを指定します。
                    q: this.keyword,
                    part: "snippet",
                    type: "video",
                    // 最大検索数
                    maxResults: this.limit | 10,
                    key: 'AIzaSyAMkNM6qVWnw56PqE3EYUQej1tCW3LAPp8'
                }
            };
        },
        created() {
            this.searchVideo()
        },
        methods: {
            searchVideo: function() {
                var self = this;
                axios
                    .get("https://www.googleapis.com/youtube/v3/search", {
                        params: this.params
                    })
                    .then(function(res) {
                        self.results = res.data.items;
                    })
            }
        }
    }
</script>
<style scoped>

.card-date{
    text-align:left;
}
</style>
