<template>
<app-layout title="Cursos">
<template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Catálogo cursos do NEP
    </h2>
</template>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            cursos do nep aqui
        </div>
    </div>
</div>
</app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
    },
})
</script>
