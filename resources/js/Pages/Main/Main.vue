<script setup>
import { router } from '@inertiajs/vue3' // We import router for quick actions 

</script>

<template>
    <main>
        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md text-center">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">Welcome to Task Manager</h1>
                <p class="text-gray-600 mb-6">Your simple solution to manage tasks efficiently.</p>
                <a href="/login" class="text-blue-600 hover:text-blue-800 font-semibold transition">Go to Login</a>
            </div>
        </div>
    </main>
</template>