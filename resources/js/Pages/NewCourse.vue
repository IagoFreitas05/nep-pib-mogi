<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar novo curso do NEP
            </h2>
        </template>

        <div class="w-full mt-4 sm:max-w-xl  mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
            <form @submit.prevent="submit">
                <div>
                    <jet-label for="name" value="Nome do curso" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <jet-label for="duration" value="Duração do curso" />
                    <jet-input id="duration" type="text" class="mt-1 block w-full" v-model="form.duration" required />
                </div>

                <div class="mt-4">
                    <jet-label for="description" value="Descrição" />
                    <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description" required />
                </div>
                <div class="flex items-center justify-end mt-4">

                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        adicionar
                    </jet-button>
                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        Link,
        AppLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                duration: '',
                description: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('newCourse'), {
                onFinish: () => this.form.reset('name', 'description','duration'),
            })
        }
    }
})
</script>
