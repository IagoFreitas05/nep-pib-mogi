<template>
    <app-layout title="Editar Curso">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar - {{ course.name }}
            </h2>
        </template>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div
                    class="w-full mx-auto mt-4 sm:max-w-xl  p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
                    <form @submit.prevent="submit">
                        <div>
                            <jet-label for="name" value="Nome do curso"/>
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                       autofocus
                                       autocomplete="name"/>
                        </div>

                        <div class="mt-4">
                            <jet-label for="duration" value="Duração do curso"/>
                            <jet-input id="duration" type="text" class="mt-1 block w-full" v-model="form.duration"
                                       required/>
                        </div>

                        <div class="mt-4">
                            <jet-label for="description" value="Descrição"/>
                            <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                                       required/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                alterar dados do curso
                            </jet-button>
                        </div>
                    </form>
                </div>

                <div
                    class="w-full mt-4 sm:max-w-xl mx-auto  p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
                    <form @submit.prevent="submitClass">
                        <div>
                            <jet-label for="className" value="Nome da aula"/>
                            <jet-input id="className" type="text" class="mt-1 block w-full" v-model="classForm.name"
                                       required
                                       autofocus autocomplete="className"/>
                        </div>

                        <div class="mt-4">
                            <jet-label for="classDescription" value="Descrição"/>
                            <jet-input id="classDescription" type="text" class="mt-1 block w-full"
                                       v-model="classForm.description" required
                                       autofocus autocomplete="className"/>
                        </div>

                        <div class="mt-4">
                            <jet-label for="urlClass" value="URL da Aula"/>
                            <jet-input id="urlClass" type="text" class="mt-1 block w-full" v-model="classForm.classLink"
                                       required/>
                        </div>
                        <div class="mt-4">
                            <jet-label for="order" value="Qual número dessa aula?"/>
                            <jet-input id="order" type="text" class="mt-1 block w-full" v-model="classForm.order"
                                       required/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <jet-button class="ml-4" :class="{ 'opacity-25': classForm.processing }"
                                        :disabled="classForm.processing">
                                adicionar nova aula
                            </jet-button>
                        </div>
                    </form>
                </div>

            </div>
            <div>
                <div
                    class="w-full mt-4 sm:max-w-xl  p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="font-bold text-gray-600">aulas</p>

                    <div v-for="classe in classes"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-5
                        p-2 text-black mt-2 px-6 py-4 bg-white border-2 border-gray-200
                        overflow-hidden sm:rounded-lg"
                    >
                        <div>#{{ classe.class_order }}</div>
                        <div class="col-span-2">{{ classe.name }}</div>

                        <div class="">
                            <button class="bg-purple-500
            rounded  block
            text-white pl-1 pr-1 ">apagar
                            </button>
                        </div>
                            <div class="">
                                <button class="bg-sky-500
            rounded  block
            text-white pl-1 pr-1">editar
                                </button>
                        </div>
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
    props: ['course', 'classes'],
    data() {
        return {
            form: this.$inertia.form({
                name: this.course.name,
                duration: this.course.duration,
                description: this.course.description,
                id: this.course.id
            }),
            classForm: this.$inertia.form({
                name: '',
                description: '',
                classLink: '',
                course_id: this.course.id,
                order:''
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
                onFinish: () => swal("Isso ai!", "Aula adicionada com sucesso !", "success")
            })
        }
    }
})
</script>
