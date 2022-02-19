<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-2">
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Bem vindo ao Núcleo de ensino PIB Mogi
            </div>

            <div class="mt-6 text-gray-500">
                Nosso propósito é transmitir a mensagem do reino de forma clara e aplicável na vida de todos os que
                quiserem aprender. Nossos cursos são desenhados para evidênciar a mensagem de Deus afim de ser
                aplicada na vida cotidiana, mostrando de forma didática, dinâmica e eficaz o poder de transformação do ensino
                bíblico na vida de todos.
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="ml-12 text-lg text-gray-600 leading-7 font-semibold">Professores capacitados</div>
                </div>
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        O NEP conta com um corpo docente capacitado para te ensinar, com experiência e vivência diária na caminhada com cristo. Estando sempre de prontidão para dúvidas
                        e fazer o que estiver no alcance deles para te ajudar.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <div class="ml-12 text-lg text-gray-600 leading-7 font-semibold">Sólida base teorica</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Toda base de cursos do NEP é fundamentada em uma teologia sólida, e de acordo com as escríturas sagradas. Nossa maior preocupação é evidênciar as escrituras da maneira mais pura
                        e simples, como Jesus ensinava e nos deixou o exemplo para que fizessemos dessa forma quando fossêmos ensinar.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <div class="ml-12 text-lg text-gray-600 leading-7 font-semibold"><a href="https://tailwindcss.com/">Conteúdo livre </a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Todo conteúdo didático disponibilizado pelo NEP é livre de cobranças, produzimos todo conteúdo de qualidade e cristão, sem cobrar nada por isso. Acreditamos que todos devem ter o acesso
                        a todo conteúdo que ensina e evidência a verdade de Deus em nossas vidas.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <div class="ml-12 text-lg text-gray-600 leading-7 font-semibold">Conheça nossos cursos</div>
                </div>
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                         Estamos sempre atualizando nossos cursos e criando novos também, venha conhecer mais!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,

        },
    })
</script>

<style>
/* -----
SVG Icons - svgicons.sparkk.fr
----- */

.svg-icon {
    width: 1em;
    height: 1em;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
    fill: #4691f6;
}

.svg-icon circle {
    stroke: #4691f6;
    stroke-width: 1;
}
</style>
