<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    mode: {
        type: String,
        required: false
    }
});

const results = ref([]);

const getImageUrl = (iconName) => {
    // Vite's dynamic import feature
    // Assumes images are in `resources/images/icons/`
    return new URL(`/resources/images/icons/${iconName}`, import.meta.url).href;
};

onMounted(() => {
    const token = document.head.querySelector('meta[name="csrf-token"]');
    axios
        .post(`/ajax/players/${props.id}/sns_timeline`,[],
            {
                headers: {
                    "X-CSRF-TOKEN": token.content,
                 },
            })
        .then(res => {
            results.value = res.data;
        });
});
</script>

<template>
    <div class="player-profile">
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary">SNS</li>
            <li class="list-group-item">
                <span v-for="row in results" :key="row.code">
                    <a v-if="row.sns === 'Twitter'" target="_blank" :href="`https://x.com/${row.code}`"><img width="32px" :src="getImageUrl('x.svg')"></a>
                    <a v-if="row.sns === 'Instagram'" target="_blank" :href="`https://www.instagram.com/${row.code}`"><img width="32px" :src="getImageUrl('instagram.svg')"></a>
                    <a v-if="row.sns === 'YouTube'" target="_blank" :href="`https://www.youtube.com/channel/${row.code}`"><img width="32px" :src="getImageUrl('youtube.svg')"></a>
                </span>
            </li>
            <li class="list-group-item">
                <a :href="`/${mode}/${id}/sns/register`" class="sns-button btn btn-primary">SNS登録</a>
            </li>
        </ul>
    </div>
</template>

<style scoped>

.sns-button {
     float: right;
}
</style>
