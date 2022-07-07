<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="$page.props.user.user_type === 'user' ">
                <div class="bg-white overflow-hidden p-4 shadow-xl sm:rounded-lg">
                    <div v-if="subscription.length > 0">
                        <p class="font-bold text-gray-600">cursos em andamento: {{ subscription.length }}</p>
                        <div class="p-2 grid grid-cols-3 hover:bg-gray-200
                            hover:ease-in duration-200 mt-3 bg-white border-2 border-gray-200 sm:rounded-lg"
                             v-for="course in subscription">
                            <div
                                class=" overflow-hidden col-span-2 hover:bg-gray-200  hover:ease-in duration-200  sm:rounded mt-2 p-4  ">
                                <p class=" text-lg mb-1 mt-1">{{ course.name }}</p>
                            </div>
                            <div class="grid place-items-center">
                                <a class="bg-purple-500
                                rounded mb-1 block ml-1
                                text-white p-2" :href="route('classes', course.course_id)">
                                    ver conteúdo
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class=" overflow-hidden bg-cyan-600 hover:ease-in  duration-200 hover:bg-purple-600 flex flex-row gap-2 mt-3 p-4 shadow-xl sm:rounded-lg">
                        <a :href="route('courses')" class="font-bold text-white ">conheça nossos cursos </a>
                        <ArrowCircleBlack/>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

import ArrowCircleBlack from "@/Jetstream/ArrowCircleBlack";

export default defineComponent({
    components: {
        AppLayout,

        ArrowCircleBlack
    },
    props: ['subscription']
})
</script>
