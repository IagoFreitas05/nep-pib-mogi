<template>
    <div id="app">
        <img :src="image"/>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import image from "./../../img/logo1.png"

export default  defineComponent({
    data(){
        return {
            image
        }
    }
})
</script>


