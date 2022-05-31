<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                área de aprendizagem
            </h2>
        </template>

        <div class="py-12">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4  max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div
                    class="w-full mx-auto  p-3   bg-white shadow-md overflow-scroll sm:rounded-lg">
                    <p class="font-bold text-gray-600"> {{ course.name }}</p>
                    <div v-for="module in modules"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-1
                        p-2 text-black mt-2 px-6 py-4 bg-white border
                        overflow-y-auto sm:rounded-lg"
                    >
                        <div>módulo: {{ module.module_name }}</div>
                        <p v-if="module.module_id === module.id_from_module">aula: {{module.name}}</p>
                    </div>

                    <div v-for="classe in classes"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-5
                        p-2 text-black mt-2 px-6 py-4 bg-white border
                        overflow-y-auto sm:rounded-lg" v-bind:class="classe.class_link === justTheCode?'border-green-400':'border-gray-400'"
                    >
                        <div>#{{ classe.class_order }}</div>
                        <div class="col-span-2">{{ classe.name }}</div>

                        <div class="">
                            <button @click="setCode(classe.class_link)" v-bind:class="classe.class_link === justTheCode?'bg-green-500':'bg-purple-500'" class="
            rounded  block
            text-white pl-1 pr-1 "><span v-if="classe.class_link === justTheCode">reproduzindo</span> <span v-else>assistir</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full mx-auto h-full col-span-2  bg-white shadow-md overflow-scroll sm:rounded-lg">
                    <iframe width="100%"  style="height:80vh" :src=code title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            code: '',
            justTheCode:'',
            subscriptionForm: this.$inertia.form({
                course_id: ''
            })
        }
    },
    props: ['classes', 'course','modules'],
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
                    this.subscriptionForm.course_id = id
                    if (willDelete) {
                        this.subscriptionForm.post(this.route('subscription'));
                    } else {
                        swal("Inscrição cancelada!");
                    }
                });
        },
        setCode(code){
            this.justTheCode = code;
            this.code = `https://www.youtube.com/embed/${code}`;
        }
    }
})
</script>
