<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from "@inertiajs/vue3";

const createPost = ()=>{
router.post(route('create.post'))
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />

                </div>
                <div class="mt-10">
                    <div>
                        <PrimaryButton @click="createPost">
                            Create post
                       </PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
