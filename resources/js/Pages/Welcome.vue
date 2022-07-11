<template>
    <Head title="Bem vindo"/>

    <div class="w-full">
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
            <Link v-if="$page.props.user" :href="route('dashboard')"
                  class="inline-flex  text-white bg-indigo-500 border-0 py-2
                       px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                sobre o projeto
            </Link>
        </nav>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600  body-font">
                    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                Área de aprendizagem

                            </h1>
                            <p class="mb-8 leading-relaxed">Seja bem vindo ao NEP, núcleo de ensino PIB Mogi, essa é a
                                nossa área
                                de aprendizagem, onde você pode conhecer os nossos cursos e se matricular neles.</p>
                            <div class="flex justify-center">
                                <Link :href="route('login')"
                                      class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    acessar
                                </Link>

                                <Link v-if="canRegister" :href="route('register')"
                                      class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                                    me cadastrar
                                </Link>
                                <Link v-if="$page.props.user" :href="route('dashboard')"
                                      class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    Dashboard
                                </Link>
                            </div>
                        </div>
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <jet-application-mark class=" object-cover object-center rounded"/>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


</template>
<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'


export default defineComponent({
    components: {
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
