<template>
    <section>
        <div class="container">
            <div class="top">
                <div class="cp_ipselect cp_sl03">
                    <select v-model="selected" @change="onChange($event)">
                        <option
                            v-for="(item, index) in items"
                            v-bind:key="index"
                            v-bind:value="item"
                        >
                            {{ item }}年
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        year: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            items: [
                2022, 2021, 2020, 2019, 2018, 2017, 2016, 2015, 2014, 2013,
                2012, 2011,
            ],
        };
    },
    created() {
        this.selected = this.year;
    },
    methods: {
        onChange(event) {
            location.href = `?year=${event.target.value}`;
        },
    },
};
</script>

<style scoped>
.cp_ipselect {
    overflow: hidden;
    width: 90%;
    margin: 2em auto;
    text-align: center;
}
.cp_ipselect select {
    width: 100%;
    padding-right: 1em;
    cursor: pointer;
    text-indent: 0.01px;
    text-overflow: ellipsis;
    border: none;
    outline: none;
    background: transparent;
    background-image: none;
    box-shadow: none;
    -webkit-appearance: none;
    appearance: none;
}
.cp_ipselect select::-ms-expand {
    display: none;
}
.cp_ipselect.cp_sl03 {
    position: relative;
    border-radius: 2px;
    border: 2px solid #e41c7b;
    background: #ffffff;
}
.cp_ipselect.cp_sl03::before {
    position: absolute;
    top: 0.8em;
    right: 0.8em;
    width: 0;
    height: 0;
    padding: 0;
    content: "";
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 6px solid #e41c7b;
    pointer-events: none;
}
.cp_ipselect.cp_sl03 select {
    padding: 8px 38px 8px 8px;
    color: #e41c7b;
}
</style>
