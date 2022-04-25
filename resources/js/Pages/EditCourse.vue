<template>
    <app-layout title="Editar Curso">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar - {{ course.name }}
            </h2>
        </template>
        <div class=" w-full p-2 mt-2 grid place-content-center">
            <ul class="flex ">
                <li class="mr-3">
                    <a class="inline-block border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white" href="#">Dados do curso</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3" href="#">Aulas</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3" href="#">Módulos</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3 " href="#">Questionários</a>
                </li>
            </ul>
        </div>

        <div class="sm:grid sm:grid-cols-2 ">
            <div>
                <div
                    class="w-full mx-auto mt-4 overflow-y-auto
                    sm:max-w-xl  p-1 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
                    <p class="pb-2 text-xl text-gray-400 font-bold">Dados do curso</p>
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
            </div>
            <div>
                <div
                    class="w-full  mt-4 sm:max-w-xl overflow-y-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-scroll sm:rounded-lg">
                    <p class="font-bold text-gray-600">aulas</p>

                    <div v-for="classe in classes"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-5
                        p-2 text-black mt-2 px-6 py-4 bg-white border-2 border-gray-200
                        overflow-hidden sm:rounded-lg"
                    >
                        <div>#{{ classe.class_order }}</div>
                        <div class="col-span-2">{{ classe.name }}</div>

                        <div class="">
                            <button @click="confirmExclusion(classe.id)" class="bg-purple-500
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
        <div class="sm:grid sm:grid-cols-2">
            <div
                class="w-full mt-4 sm:max-w-xl mx-auto  p-1 mt-2 px-6 py-4 bg-white
                    shadow-md overflow-hidden sm:rounded-lg   ">
                <p class="pb-2 text-xl text-gray-400 font-bold">Cadastrar nova aula</p>
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
                        <jet-input id="order" type="number" class="mt-1 block w-full" v-model="classForm.order"
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
            <div
                class="w-full mt-4 sm:max-w-xl mx-auto  p-1 mt-2 px-6 py-4 bg-white
                    shadow-md overflow-hidden sm:rounded-lg   ">
                <p class="pb-2 text-xl text-gray-400 font-bold">Cadastrar novo módulo</p>
                <form @submit.prevent="submitClass">
                    <div>
                        <jet-label for="moduleName" value="Nome do módulo"/>
                        <jet-input id="moduleName" type="text" class="mt-1 block w-full" v-model="moduleForm.name"
                                   required
                                   autofocus autocomplete="moduleName"/>
                    </div>

                    <div class="mt-4">
                        <jet-label for="moduleDescription" value="Descrição do módulo"/>
                        <jet-input id="moduleDescription" type="text" class="mt-1 block w-full"
                                   v-model="moduleForm.description" required
                                   autofocus autocomplete="moduleDescription"/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <jet-button class="ml-4" :class="{ 'opacity-25': classForm.processing }"
                                    :disabled="classForm.processing">
                            adicionar novo módulo
                        </jet-button>
                    </div>


                </form>
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
                order: ''
            }),
            deleteForm: this.$inertia.form({
                id: ''
            }),
            moduleForm: this.$inertia.form({
                name: '',
                description: '',
                course_id: this.course.id
            })
        }
    },
    methods: {
        confirmExclusion(id) {
            swal({
                title: "você tem certeza que deseja excluir essa aula?",
                text: "uma vez deletado, você não poderá recupar!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        this.deleteForm.id = id;
                        this.deleteForm.delete(this.route('deleteClass', id), {
                            onFinish: () => swal("Sua aula foi deletada!", {
                                icon: "success",
                            })
                        });
                    } else {
                        swal("Sua aula não foi deletada!");
                    }
                });
        },
        submit() {
            this.form.put(this.route('editCourse', this.course.id), {
                onFinish: () => swal("Está feito", "alterado com sucesso, as informações foram atualizadas ", "success")
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
