<template>
    <div class="news-img">
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary">
                最新ニュース
            </li>
            <li class="list-group-item" style="text-align: right">
                <a :href="'/news/' + mode + '/' + id">もっと見る</a>
            </li>
            <li style="display: none"></li>
        </ul>
        <div id="recent-news">
            <div v-for="(item, index) in items" :key="index">
                <div class="news-card">
                    <a :href="'/news/' + item.id">
                        <div class="news-card-image">
                            <img
                                class="card-img-top"
                                :src="item.img_url"
                                :alt="item.title"
                            />
                        </div>
                        <h4 style="margin: 10px 0 10px 0"></h4>
                    </a>
                    <div class="news-title">
                        <a :href="`/news/${item.id}`"
                            ><p>{{ item.title }}</p></a
                        >
                        <div class="tag-card">
                            <a
                                v-for="(tag, key) in item.relations"
                                class="btn btn-default"
                                type="button"
                                :href="`/${tag.mode}/${tag.this_id}`"
                                :key="key"
                            >
                                {{ tag.text }}
                            </a>
                        </div>
                    </div>
                    <p class="card-date">{{ item.open_date }}</p>
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
            required: false,
        },
        id: {
            type: Number,
            default: null,
            required: false,
        },
    },
    data: function () {
        return {
            items: [],
        };
    },
    created() {
        axios
            .post("/ajax/news", {
                limit: 5,
                mode: this.mode,
                id: this.id,
            })
            .then((response) => {
                this.items = response.data.data;
                console.log(this.item);
            });
    },
};
</script>
