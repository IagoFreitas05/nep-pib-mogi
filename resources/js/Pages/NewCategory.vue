<template>
    <app-layout title="Adicionar nova categoria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar nova categoria
            </h2>
        </template>
        <div class="sm:grid sm:grid-cols-2 xs:grid-cols-1">
            <div class="w-full mt-4 sm:max-w-xl  mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg   ">
                <form @submit.prevent="">
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

            <div class="w-full mt-4 sm:max-w-xl  mx-auto p-2 mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                listas de categorias
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
                status: 'true',
            })
        }
    },
})
</script>

<style scoped>

</style>
