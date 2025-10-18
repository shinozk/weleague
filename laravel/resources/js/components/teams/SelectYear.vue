<template>
    <form class="nput-group-lg">
        <select class="custom-select" @change="onChange($event)" aria-label="年選択" v-model="selected">
            <option v-for="(item, index) in items" v-bind:key="index" v-bind:value="item">
                {{ item }}年
            </option>
        </select>
        <h4 style="margin:10px"></h4>
    </form>
</template>

<script>

export default {
    props: {
        id : {
            type: Number,
            required: true
        },
        year : {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            items:[],
            selected: ''
        }
    },
    methods: {
        onChange(event) {
            location.href = `/teams/${this.id}/${event.target.value}/players`;
        }
    },
    created() {
        axios.post('/ajax/teams/select_year',
            {
                id: this.id
            }
            ).then(response => {
                const ret = response.data.data;
                this.items = ret;
                this.selected = this.year;
            })
    }
}
</script>
