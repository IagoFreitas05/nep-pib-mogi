<template>
    <app-layout title="Cursos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                área de aprendizagem
            </h2>
        </template>
        <div class="py-12 w-full">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4  max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div style="height: 80vh"
                     class="w-full mx-auto p-3  bg-white shadow-md overflow-auto sm:rounded-lg">
                    <p class="font-bold text-gray-600"> {{ course.name }}</p>
                    <div v-for="module in modules"
                         class="w-full mt-4 sm:max-w-xl grid grid-cols-1
                        p-2 text-black mt-2 px-6 py-4 bg-white border
                        overflow-y-auto sm:rounded-lg"
                    >
                        <div class="text-cyan-600 font-bold rounded p-2">{{ module.name }}</div>
                        <div v-for="classe in module.class"
                             class="w-full mt-4 sm:max-w-xl grid grid-cols-4
                        p-2 text-black mt-2 px-6 py-4 bg-white border
                        overflow-y-auto sm:rounded-lg"
                             v-bind:class="classe.class_link === justTheCode?'border-green-400':$page.props.watchedClasses
                                        .find(element => element.class_id === classe.id)
                                        ?'border-green-500':'border-gray-400'">
                            <div class="col-span-2">#{{ classe.class_order }} {{ classe.name }}</div>
                            <div class="">
                                <button @click="setCode(classe.class_link);
                                                setWatchedClass(classe.id, 1)"
                                        v-bind:class="
                                        classe.class_link === justTheCode?'bg-green-500':
                                        $page.props.watchedClasses
                                        .find(element => element.class_id === classe.id)
                                        ?'bg-green-500':'bg-purple-500'"
                                        class=" rounded  block text-white pl-1 pr-1 ">
                                    <span v-if="classe.class_link === justTheCode">reproduzindo</span>
                                    <span v-else-if="$page.props.watchedClasses
                                    .find(element => element.class_id === classe.id)">assistido</span>
                                    <span v-else>assistir</span>
                                </button>
                            </div>
                        </div>

                        <div v-for="quiz in quizzes">
                            <div v-if="quiz.module_id === module.id"
                                 class="w-full mt-4 sm:max-w-xl grid grid-cols-2
                                p-2 text-black mt-2 px-6 py-4 bg-white border
                                overflow-y-auto sm:rounded-lg" v-bind:class="$page.props.answerQuizzes
                                        .find(element => element.question_id === quiz.id)
                                        ?'border-green-500':''">
                                <div>questão - {{ quiz.order }}</div>

                                <div class="">
                                    <button @click="setQuiz(quiz)" class="
                                     rounded  block
                                    text-white pl-1 pr-1 "
                                            v-bind:class="$page.props.answerQuizzes
                                        .find(element => element.question_id === quiz.id)
                                        ?'bg-green-500':' bg-purple-500'">

                                        <span v-if="$page.props.answerQuizzes
                                            .find(element => element.question_id === quiz.id)">respondido</span>
                                        <span v-else>responder</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 80vh" class="w-full mx-auto   col-span-2  bg-white shadow-md overflow-scroll sm:rounded-lg">
                    <iframe v-if="code" width="100%" style="height:80vh" :src=code title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                    <div v-if="Object.keys(currentQuiz).length !== 0" class="p-6 justify-center mt-7 flex-col items-center align-middle">
                        <form @submit.prevent="confirmResponse()">
                            <div>
                                <jet-label for="moduleName" class="font-bold text-2xl" :value=currentQuiz.question />
                                <jet-input id="moduleName" type="text" class="mt-1 block w-full"
                                           required v-model="this.answerForm.answer"
                                           autofocus autocomplete="moduleName"/>
                            </div>
                            /* mostrar aqui caso ele já tenha respondido */

                            <div class="flex items-center justify-end mt-4">
                                <jet-button class="ml-4">
                                    responder
                                </jet-button>
                            </div>
                        </form>
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
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import swal from "sweetalert";


export default defineComponent({
    components: {
        JetButton,
        JetInput,
        JetLabel,
        AppLayout,
        Welcome,
        JetNavLink,
    },
    data() {
        return {
            currentQuiz : {},
            code: '',
            justTheCode: '',
            answer :'',
            watchedClassForm: this.$inertia.form({
                class_id: '',
                user_id: '',
                course_id: ''
            }),
            answerForm: this.$inertia.form({
                question_id: '',
                answer: '',
                course_id: '',
                module_id: '',
                user_id: ''
            }),
        }
    },
    props: ['classes', 'course', 'modules', 'quizzes', 'watchedClasses','answerQuizzes'],
    methods: {
        setCode(code) {
            this.currentQuiz = {};
            this.justTheCode = code;
            this.code = `https://www.youtube.com/embed/${code}`;
        },
        setQuiz(Quiz){
            this.currentQuiz = Quiz
            this.code = "";
            console.log(Quiz);
        },
        setWatchedClass(class_id, user_id) {
            this.watchedClassForm.class_id = class_id;
            this.watchedClassForm.user_id = user_id;
            this.watchedClassForm.course_id = this.course.id;
            this.watchedClassForm.post(this.route('setWatchedClass'))
        },
        responseQuiz(){
            this.answerForm.question_id = this.currentQuiz.id;
            this.answerForm.course_id = this.course.id;
            this.answerForm.module_id = this.currentQuiz.module_id;
            this.answerForm.post(this.route('setAnswerQuiz'),{
                onSuccess: () => swal("Boa resposta!","Sua resposta foi enviada com sucesso","success"),
                onFailure: () => swal("Opa!","Sua resposta não pode ser enviada","warning")
            });
        },
        confirmResponse(){
            swal({
                title: "Você tem certeza?",
                text: "Confirma o envio da sua resposta?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        this.responseQuiz();
                    } else {
                        swal("Envio cancelado!");
                    }
                });
        }
    }
})
</script>
