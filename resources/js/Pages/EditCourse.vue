<template>
    <app-layout title="Editar Curso">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar - {{ course.name }}
            </h2>
        </template>
        <div
            class="w-full mt-4 sm:max-w-xl  mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
            <form @submit.prevent="submit">
                <div>
                    <jet-label for="name" value="Nome do curso"/>
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                               autocomplete="name"/>
                </div>

                <div class="mt-4">
                    <jet-label for="duration" value="Duração do curso"/>
                    <jet-input id="duration" type="text" class="mt-1 block w-full" v-model="form.duration" required/>
                </div>

                <div class="mt-4">
                    <jet-label for="description" value="Descrição"/>
                    <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                               required/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        alterar dados do curso
                    </jet-button>
                </div>
            </form>
        </div>

        <div
            class="w-full mt-4 sm:max-w-xl  mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
            <form @submit.prevent="submitClass">
                <div>
                    <jet-label for="className" value="Nome da aula"/>
                    <jet-input id="className" type="text" class="mt-1 block w-full" v-model="classForm.className"
                               required
                               autofocus autocomplete="className"/>
                </div>

                <div>
                    <jet-label for="classDescription" value="Nome da aula"/>
                    <jet-input id="classDescription" type="text" class="mt-1 block w-full"
                               v-model="classForm.classDescription" required
                               autofocus autocomplete="className"/>
                </div>

                <div class="mt-4">
                    <jet-label for="urlClass" value="URL da Aula"/>
                    <jet-input id="urlClass" type="text" class="mt-1 block w-full" v-model="classForm.classLink"
                               required/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <jet-button class="ml-4" :class="{ 'opacity-25': classForm.processing }" :disabled="classForm.processing">
                        adicionar nova aula
                    </jet-button>
                </div>
            </form>
        </div>


    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'
import {Head, Link} from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import swal from 'sweetalert';

export default defineComponent({
    components: {
        Welcome,
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
    props: ['course'],
    data() {
        return {
            form: this.$inertia.form({
                name: this.course.name,
                duration: this.course.duration,
                description: this.course.description,
                id: this.course.id
            }),
            classForm: this.$inertia.form({
                className: this.className,
                classDescription: this.classDescription,
                classLink: this.classLink
            })
        }
    },
    methods: {
        submit() {
            this.form.put(this.route('editCourse', this.course.id), {
                onFinish: () => swal("Está feito", "alterado com sucesso, as informações foram atualizadas " +
                    "em breve!", "success")
            })
        },
        submitClass() {
            this.classForm.post(this.route('newClass'), {
                onFinish: () => swal("Isso ai!", "Aula: " + this.classForm.className + "adicionada com sucesso !", "success")
            })
        }
    }
})
</script>
