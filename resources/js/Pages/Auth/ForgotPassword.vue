<template>
    <Head title="Forgot Password"/>

    <jet-authentication-card>
        <template #logo>
            <jet-application-mark/>
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Esqueceu a sua senha? Não tem problema. Digite aqui o seu email para podermos te enviar um link para que
            você possa
            resetar sua senha
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4"/>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email"/>
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resetar minha senha
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import {defineComponent} from 'vue'
import {Head} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors,
        JetApplicationMark,
    },

    props: {
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: ''
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('password.email'))
        }
    }
})
</script>
