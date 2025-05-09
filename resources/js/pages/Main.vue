<script setup>
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps([
    'val1',
    'val2',
])

const val1 = ref(props.val1);
const val2 = ref(props.val2);
var timer = null;

watch(val1, () => {
    changeVals();
});
watch(val2, () => {
    changeVals();
});

const changeVals = () => {
    clearTimeout(timer);
    timer = setTimeout(() => {
        router.post('/change', {
            val1: val1.value,
            val2: val2.value,
        });
    }, 1000);
};
</script>

<template>
    <a-row>
        <a-col :span="24">
            <div class="content-box">
                <a-slider v-model:value="val1" :min="300" :max="2600"/>
                <a-slider v-model:value="val2" :min="300" :max="2600"/>
            </div>
        </a-col>
    </a-row>
</template>

<style>
.content-box {
    width: 100%;
    padding: 0 10px;
}
</style>
