<template>
<app-layout title="Cursos">
<template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Catálogo cursos do NEP
    </h2>
</template>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-2" v-for="course in courses" >
            <div class="bg-white overflow-hidden col-span-2 shadow-xl hover:text-white hover:bg-cyan-600 hover:ease-in duration-200 sm:rounded mt-2 p-4  ">
                <p class=" text-2xl mb-2 mt-2">{{course.name}}</p>
                <p class="text-justify text-sm  ">{{course.description}}</p>
                <p><small>{{course.duration}}</small></p>
                <button v-if="$page.props.user.user_type === 'admin' ">adicionar aula</button>
            </div>
            <div class="place-items-center bg-gray-300 rounded mt-2 shadow-xl p-4 grid">
                <img src="./../../img/logo1.png" alt="">
            </div>
        </div>
    </div>
</div>
</app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
    },
    props: ['courses']
})
</script>
