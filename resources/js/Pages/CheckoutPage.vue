<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{course.name}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="$page.props.user.user_type === 'user' ">
                <div class="bg-white overflow-hidden p-4 shadow-xl sm:rounded-lg ">
                    <h1 class=" rounded font-bold text-purple-400 text-2xl p-4">Sobre o curso {{course.name}}</h1>
                    <p class="text-justify p-4 font-light">{{course.description}}</p>
                    <div class="flex flex-row p-4 mx-auto mt-5 justify-start gap-4">
                        <div class="p-2 rounded bg-purple-300 text-sm">quantidade de aulas {{classes.length}}</div>
                        <div class="p-2 rounded bg-blue-300 text-sm">quantidade de módulos {{modules.length}}</div>
                        <div class="p-2 rounded bg-amber-300 text-sm">quantidade de questões {{quizzes.length}}</div>
                    </div>
                    <div class="flex justify-end p-4">
                        <button @click="confirmSubscription(course.id)" class="rounded bg-green-600 text-white font-medium p-2 hover:bg-green-500 transition-all" >
                            me inscrever!
                        </button>
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
import swal from "sweetalert";

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        JetNavLink,
    },
    data() {
        return {
            subscriptionForm: this.$inertia.form({
                course_id: ''
            })
        }
    },
    props: ['course', 'classes', 'modules','quizzes'],
    methods: {
        confirmSubscription(id) {
            console.log(this.subscriptions)
            swal({
                title: "Você tem certeza?",
                text: "gostaria de realizar a sua inscrição nesse curso?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    this.subscriptionForm.course_id = id
                    if (willDelete) {
                        this.subscriptionForm.post(this.route('subscription'));
                    } else {
                        swal("Inscrição cancelada!");
                    }
                });
        }
    }
})
</script>
