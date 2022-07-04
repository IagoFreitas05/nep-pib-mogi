<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nome do curso aqui
            </h2>
        </template>
push

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
    props: ['courses', 'subscriptions', 'errors'],
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
