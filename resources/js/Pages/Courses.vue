<template>
<app-layout title="Cursos">
<template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Catálogo cursos do NEP
    </h2>
</template>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-2 grid grid-cols-3 gap-4 mt-4 bg-white shadow-xl" v-for="course in courses" >
            <div class="bg-white overflow-hidden col-span-2  hover:text-white hover:bg-cyan-600 hover:ease-in duration-200 sm:rounded mt-2 p-4  ">
                <p class=" text-2xl mb-2 mt-2">{{course.name}}</p>
                <p class="text-justify text-sm  ">{{course.description}}</p>
                <p><small>{{course.duration}}</small></p>

            </div>
            <div class=" place-items-center bg-gray-300 rounded mt-2  p-4 grid">
                <img src="./../../img/logo1.png" alt="" class="pr-1">
            </div>
            <a class="bg-purple-500
            rounded mb-1 block ml-1
            text-white p-2" :href="route('editCourse', course.id)" v-if="$page.props.user.user_type === 'admin' ">
                editar curso
           </a>
        </div>
    </div>
</div>
</app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        JetNavLink,
    },
    props: ['courses']
})
</script>
