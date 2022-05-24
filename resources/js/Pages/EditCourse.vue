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
                    <a class="inline-block
                    shadow rounded hover:border-gray-200
                    cursor-pointer
                     py-1 px-3"
                     v-bind:class="visualizationType.dataCourse === visualization?'bg-blue-500 text-white':'hover:bg-gray-200  bg-gray-100  text-blue-500'"
                       @click="setVisualization(visualizationType.dataCourse)"> Curso </a>
                </li>
                <li class="mr-3">
                    <a class="inline-block
                    rounded shadow
                    py-1 px-3
                    cursor-pointer
                    " v-bind:class="visualizationType.classes === visualization?'bg-blue-500 text-white':'hover:bg-gray-200 bg-gray-100  text-blue-500'"
                       @click="setVisualization(visualizationType.classes)">Aulas</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block
                    shadow rounded hover:border-gray-200
                    cursor-pointer
                     py-1 px-3"
                       v-bind:class="visualizationType.modules === visualization?'bg-blue-500 text-white':'hover:bg-gray-200  bg-gray-100  text-blue-500'"
                       @click="setVisualization(visualizationType.modules)">Módulos</a>
                </li>
                <li class="mr-3">
                    <a @click="setVisualization(visualizationType.quiz)" class="inline-block shadow rounded
                   py-1 px-3 "
                       v-bind:class="visualizationType.quiz === visualization?'bg-blue-500 text-white':'hover:bg-gray-200 bg-gray-100  text-blue-500'"
                       href="#">Questionários</a>
                </li>
            </ul>
        </div>

        <!-- course data -->
        <div class="sm:grid sm:grid-cols-1 " v-if="visualization === visualizationType.dataCourse">
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
        </div>

        <!-- class data -->
        <div class="sm:grid sm:grid-cols-2" v-if="visualization === visualizationType.classes">
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
                    <div class="mt-4">
                        <jet-label for="módulo" value="Selecione o módulo" />
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring
                    focus:ring-indigo-200
                    focus:ring-opacity-50 rounded-md shadow-sm" name="category" v-model="classForm.module_id">
                            <option v-for="module in modules" :value="module.id">{{module.name}}</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <jet-button class="ml-4" :class="{ 'opacity-25': classForm.processing }"
                                    :disabled="classForm.processing">
                            adicionar nova aula
                        </jet-button>
                    </div>
                </form>
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

        <!-- modules -->
        <div class="sm:grid sm:grid-cols-2" v-if="visualization === visualizationType.modules">
            <div
                class="w-full mt-4 sm:max-w-xl mx-auto  p-1 mt-2 px-6 py-4 bg-white
                    shadow-md overflow-hidden sm:rounded-lg   ">
                <p class="pb-2 text-xl text-gray-400 font-bold">Cadastrar novo módulo</p>
                <form @submit.prevent="submitModule">
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

            <div>
                <div
                    class="w-full  mt-4 sm:max-w-xl overflow-y-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-scroll sm:rounded-lg">
                    <p class="font-bold text-gray-600">módulos cadastrados</p>
                    <div v-for="module in modules"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-4
                        p-2 text-black mt-2 px-6 py-4 bg-white border-2 border-gray-200
                        overflow-hidden sm:rounded-lg"
                    >

                        <div class="col-span-2">{{ module.name }}</div>

                        <div class="">
                            <button @click="confirmExclusion(module.id)" class="bg-purple-500
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

        <!-- questionarios -->
        <div class="sm:grid sm:grid-cols-2" v-if="visualization === visualizationType.quiz">
            <div
                class="w-full mt-4 sm:max-w-xl mx-auto  p-1 mt-2 px-6 py-4 bg-white
                    shadow-md overflow-hidden sm:rounded-lg   ">
                <p class="pb-2 text-xl text-gray-400 font-bold">Cadastrar novo questionário</p>
                <form @submit.prevent="submitQuiz">
                    <div>
                        <jet-label for="question" value="Qual sua questão?"/>
                        <jet-input id="question" type="text" class="mt-1 block w-full" v-model="quizForm.question"
                                   required
                                   autofocus />
                    </div>

                    <div class="mt-4">
                        <jet-label for="answer" value="resposta correta para sua pergunta"/>
                        <jet-input id="answer" type="text" class="mt-1 block w-full"
                                   v-model="quizForm.answer" required
                                   autofocus />
                    </div>
                    <div class="mt-4">
                        <jet-label for="orderQuestion" value="qual a ordem desta pergunta?"/>
                        <jet-input id="orderQuestion" type="number" class="mt-1 block w-full"
                                   v-model="quizForm.order" required
                                   autofocus />
                    </div>
                    <div class="mt-4">
                        <jet-label for="módulo" value="Selecione o módulo" />
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring
                    focus:ring-indigo-200
                    focus:ring-opacity-50 rounded-md shadow-sm" name="category" id="" v-model="quizForm.module_id">
                            <option v-for="module in modules" :value="module.id">{{module.name}}</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <jet-button class="ml-4" :class="{ 'opacity-25': classForm.processing }"
                                    :disabled="quizForm.processing">
                            adicionar novo questionário
                        </jet-button>
                    </div>
                </form>
            </div>

            <div>
                <div
                    class="w-full  mt-4 sm:max-w-xl overflow-y-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-scroll sm:rounded-lg">
                    <p class="font-bold text-gray-600">questões cadastradas</p>
                    <div v-for="quiz in quizzes"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-4
                        p-2 text-black mt-2 px-6 py-4 bg-white border-2 border-gray-200
                        overflow-hidden sm:rounded-lg"
                    >

                        <div class="col-span-2">{{ quiz.question }}</div>

                        <div class="">
                            <button @click="confirmExclusion(quiz.id)" class="bg-purple-500
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
    props: ['course', 'classes', 'modules','quizzes'],
    data() {
        return {
            visualizationType:
                {
                    dataCourse: 'dataCourse',
                    classes: 'classes',
                    modules: 'modules',
                    quiz : 'quiz'
                },
            visualization: 'dataCourse',
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
                module_id: '',
                order: ''
            }),
            deleteForm: this.$inertia.form({
                id: ''
            }),
            moduleForm: this.$inertia.form({
                name: '',
                description: '',
                course_id:''
            }),
            quizForm: this.$inertia.form({
                question:'',
                answer: '',
                module_id: '',
                order:''
            })
        }
    },
    methods: {
        setVisualization(expression) {
            this.visualization = expression;
        },
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
                onFinish: () => swal(
                    "Está feito",
                    "alterado com sucesso, as informações foram atualizadas ",
                    "success")
            })
        },
        submitClass() {
            this.classForm.post(this.route('newClass'), {
                onFinish: () => swal("Isso ai!", "Aula adicionada com sucesso !", "success")
            })
        },
        submitModule() {
            this.moduleForm.course_id = this.course.id;
            this.moduleForm.post(this.route('newModule'), {
                onFinish: () => swal("Isso ai!", "Novo módulo adicionado", "success")
            })
        },
        submitQuiz(){
            this.quizForm.post(this.route("newQuiz"),{
                onFinish: () => swl("Isso ai!","Novo questionário adicionado","success")
            })
        }
    }
})
</script>
