<template>
    <app-layout title="Adicionar nova categoria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar nova categoria
            </h2>
        </template>
        <div class="sm:grid  sm:grid-cols-2 xs:grid-cols-1">
            <div class="w-full h-2/6 mt-4 sm:max-w-xl  mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
                <form @submit.prevent="newCategory">
                    <div>
                        <jet-label for="name" value="Nome da categoria" />
                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.category" required autofocus autocomplete="name" />
                        <div v-if="errors.category">{{ errors.category }}</div>
                    </div>
                    <div class="mt-4">
                        <jet-label for="duration" value="Descrição da categoria" />
                        <jet-input id="duration" type="text" class="mt-1 block w-full" v-model="form.description" required />
                        <div v-if="errors.description">{{ errors.description }}</div>
                    </div>
                    <div class="flex items-center justify-end mt-4">

                        <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            adicionar
                        </jet-button>
                    </div>
                </form>
            </div>

            <div class="w-full mt-4 sm:max-w-xl h-5/6 overflow-y-auto mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <p class="font-bold text-gray-600">categorias criadas</p>
                <div v-for="category in categories"
                     class="w-full mt-4 sm:max-w-xl grid grid-cols-2
                        p-2 text-black mt-2 px-6 py-4 bg-white border
                        overflow-y-auto shadow-lg sm:rounded-lg"
                >
                    <div class=" w-max">{{ category.category }}</div>

                    <div class=" w-max">
                        <button @click="toggleCategory(category.id)" v-bind:class="category.status === 0?'shadow-green-500':'bg-red-500'" class="
            rounded shadow-md block
            text-white pl-1 py-1 pr-1 "><span v-if="category.status === 0">ativar categoria</span> <span v-else>desativar categoria</span>
                        </button>
                    </div>
                </div>
            </div>
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

export default defineComponent( {
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
    props:['errors','categories'],
    name: "NewCategory",
    data() {
        return {
            form: this.$inertia.form({
                category: '',
                description: '',
                status: 1,
            })
        }
    },
    methods:{
        newCategory(){
            this.form.post(this.route('newCategory'), {
                onFinish: () => this.form.reset('category', 'description'),
            })
        },
        toogleCategory(){

        }

    }
})
</script>

<style scoped>

</style>
