<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Catálogo cursos do NEP
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-2 grid grid-cols-4 mt-4 bg-white shadow-xl" v-for="course in courses">
                    <div
                        class="bg-white overflow-hidden col-span-2  hover:text-white hover:bg-cyan-600 hover:ease-in duration-200 sm:rounded mt-2 p-4  ">
                        <p class=" text-2xl mb-2 mt-2">{{ course.name }}</p>
                        <p class="text-justify text-sm  ">{{ course.description }}</p>
                        <p><small>{{ course.duration }}</small></p>
                    </div>
                    <div class="grid place-items-center" v-if="$page.props.user.user_type === 'user'">
                        <button class="bg-purple-500
            rounded mb-1 block ml-1
            text-white p-2" @click="confirmSubscription(course.id)">
                            realizar inscrição
                        </button>
                    </div>
                    <div class="grid place-items-center" v-if="$page.props.user.user_type === 'admin'">
                        <a class="bg-purple-500
            rounded mb-1 block ml-1
            text-white p-2" :href="route('editCourse', course.id)">
                            editar curso
                        </a>
                    </div>
                    <div class=" place-items-center bg-gray-300 rounded mt-2  p-4 grid">
                        <img src="./../../img/logo1.png" alt="" class="pr-1">
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        JetNavLink,
    },
    props: ['courses'],
    methods: {
        confirmSubscription(id) {
            swal({
                title: "Você tem certeza?",
                text: "gostaria de realizar a sua inscrição nesse curso?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Inscrição realizada!", {
                            icon: "success",
                        });
                    } else {
                        swal("Inscrição cancelada!");
                    }
                });
        }
    }
})
</script>
