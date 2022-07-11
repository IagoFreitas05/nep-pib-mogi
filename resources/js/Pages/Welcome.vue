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


    <div class="py-8 w-full">
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
