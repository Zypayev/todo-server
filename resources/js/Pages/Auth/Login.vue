<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
})

const submit = () => {
    form.post('/login')
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>
            
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input v-model="form.email" type="email" class="w-full border rounded-md p-2 mt-1" />
                    <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input v-model="form.password" type="password" class="w-full border rounded-md p-2 mt-1" />
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                    Sign In
                </button>
                <button class="w-full bg-gray-200 text-gray-700 py-2 rounded-md hover:bg-gray-300 transition mt-2">
                    <a href="/register">Don't have an account? Register</a>
                </button>
            </form>
        </div>
    </div>
</template>