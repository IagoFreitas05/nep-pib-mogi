<template>
    <Head title="Bem vindo"/>

    <div class="w-full ">
        <nav class="flex flex-row bg-gray-100 p-4">
            <jet-application-mark class=" object-cover object-center rounded"/>

                <Link :href="route('login')"
                      class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0
                      py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg ">
                    acessar
                </Link>

                <Link v-if="canRegister" :href="route('register')"
                      class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0
                      py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                    me cadastrar
                </Link>
                <Link v-if="$page.props.user" :href="route('dashboard')"
                      class="inline-flex text-white bg-indigo-500 border-0 py-2
                       px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    Dashboard
                </Link>
        </nav>
    </div>

    <div class=" w-full">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                            <h1 class="title-font font-bold sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                Núcleo de ensino PIB Mogi
                            </h1>
                            <p class="mb-8 leading-relaxed">
                                Seja muito bem vindo ao núcleo de ensino da Primeira Igreja Batista em Mogi das Cruzes,
                                nosso propósito é espalhar a palavra de Deus, e garantir que mais pessoas tenham acesso ao
                                ensino da Palavra do nosso Deus.
                            </p>
                            <Link v-if="canRegister" :href="route('register')"
                                  class="bg-green-500  inline-flex text-white bg-gray-100 border-0
                                    py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                                quero fazer parte
                            </Link>
                        </div>
                    </div>
                </section>
            </div>
            <Welcome/>
        </div>
    </div>

    <div class="w-full mx-auto mb-6 mt-6 sm:px-6 lg:px-8">
        <h1 class=" sm:text-3xl text-2xl mb-4 font-bold text-gray-800">
            Categorias de cursos
        </h1>
        <p class="mb-8 leading-relaxed text-gray-600">
           Dentro do ministério NEP (Núcleo de ensino Pib Mogi), existem 3 categorias de treinamentos:
        </p>
        <div class="grid xl:grid-cols-3 md:grid-cols-3 gap-10 sm:grid-cols-1">
            <div class="rounded bg-gray-200 border border-gray-300 p-4 flex-col flex justify-center items-center" >
                <p class="text-center text-gray-600 font-bold font-mono text-xl">Integração</p>
                <p class="text-justify p-4 color-gray-400">
                    Os cursos de integração, tem por objetivo trabalhar com as bases do evangelho e também
                    com as diretrizes batistas acerta que assuntos introdutórios da teologia.
                </p>
                <button class="rounded bg-green-600 p-2 text-white">
                    conhecer mais
                </button>
            </div>
            <div class="rounded  bg-gray-200 border border-gray-300 flex-col flex justify-center items-center p-4">
                <p class="text-center text-gray-600 font-mono font-bold text-xl">
                    Avance
                </p>
                <p class="text-justify p-4 color-gray-400">
                    Os cursos Avance, tem o propósito de fazer com que você se aprofunde no conhecimento da palavra de Deus,
                    analisando livros da Bíblia por completo, com o objetivo de expor o contexto e a mensagem passada na época.
                </p>
                <button class="rounded bg-green-600 p-2 text-white">
                    conhecer mais
                </button>
            </div>
            <div class="rounded bg-gray-200 border border-gray-300 p-4 flex-col flex justify-center items-center">
               <p class="text-center text-gray-600 font-mono font-bold text-xl">
                   Treinamentos
               </p>
                <p class="text-justify p-4 color-gray-400">
                    Os cursos de treinamentos, tem como objetivo trabalhar com habilidades práticas do dia a dia do evangelho:
                    Pregações, ensino da palavra entre outros assuntos relacionados a técnica da aplicação da palavra de Deus
                </p>
                <button class="rounded bg-green-600 p-2 text-white">
                    conhecer mais
                </button>
            </div>
        </div>
    </div>

</template>
<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import Welcome from '@/Jetstream/Welcome'

export default defineComponent({
    components: {
        Welcome,
        Head,
        Link,
        JetApplicationMark,

    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    }
})
</script>
