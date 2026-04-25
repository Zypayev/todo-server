<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900">Create Account</h2>
                <p class="text-gray-500 mt-2">Join us to start managing your tasks</p>
            </div>
            
            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Full Name</label>
                    <input 
                        v-model="form.name" 
                        type="text" 
                        placeholder="John Doe"
                        class="w-full border rounded-lg p-2.5 mt-1 border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" 
                    />
                    <p v-if="form.errors.name" class="text-red-500 text-xs mt-1 font-medium">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Email Address</label>
                    <input 
                        v-model="form.email" 
                        type="email" 
                        placeholder="john@example.com"
                        class="w-full border rounded-lg p-2.5 mt-1 border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" 
                    />
                    <p v-if="form.errors.email" class="text-red-500 text-xs mt-1 font-medium">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Password</label>
                    <input 
                        v-model="form.password" 
                        type="password" 
                        placeholder="••••••••"
                        class="w-full border rounded-lg p-2.5 mt-1 border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" 
                    />
                    <p v-if="form.errors.password" class="text-red-500 text-xs mt-1 font-medium">{{ form.errors.password }}</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                    <input 
                        v-model="form.password_confirmation" 
                        type="password" 
                        placeholder="••••••••"
                        class="w-full border rounded-lg p-2.5 mt-1 border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" 
                    />
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 active:transform active:scale-95 transition font-bold shadow-md"
                    :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                    :disabled="form.processing"
                >
                    {{ form.processing ? 'Registering...' : 'Sign Up' }}
                </button>
            </form>
            
            <div class="mt-6 text-center border-t pt-4">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <Link href="/login" class="text-blue-600 hover:text-blue-800 font-semibold transition">Login here</Link>
                </p>
            </div>
        </div>
    </div>
</template>