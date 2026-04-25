<script setup>
import { router } from '@inertiajs/vue3' // We import router for quick actions 
defineProps({
    // You can pass user data as props if needed
    user: Object
})

</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Profile</h2>
            <p class="text-gray-700 mb-4">Welcome to your profile page!</p>
            <!-- You can display user information here -->
            <p class="text-gray-700 mb-4">Name: {{ user.name }}</p>
            <p class="text-gray-700 mb-4">Email: {{ user.email }}</p>
            <button @click="router.visit('/tasks')" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Back to Tasks
            </button>
        </div>
    </div>
</template>