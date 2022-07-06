<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{course.name}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="$page.props.user.user_type === 'user' ">
                <div class="bg-white overflow-hidden p-4 shadow-xl sm:rounded-lg">

                    <h1>Sobre o curso {{course.name}}</h1>
                    <p>quantidade de aulas {{classes.length}}</p>
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
    props: ['course', 'classes', 'modulos'],
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
