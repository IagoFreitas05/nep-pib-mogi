<template>
    <div id="app">
        <img :src="image"/>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import image from "./../../img/play_circle_black_24dp.svg"

export default  defineComponent({
    data(){
        return {
            image
        }
    }
})
</script>


