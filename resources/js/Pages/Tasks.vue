<script setup>
import { useForm, router } from '@inertiajs/vue3' // We import router for quick actions

defineProps({
    tasks: Array
})

const form = useForm({
    title: '',
})

const submit = () => {
    form.post('/tasks', {
        onSuccess: () => form.reset(),
    })
}

const deleteTask = (id) => {
    if (confirm('Are you sure?')) {
        router.delete(`/tasks/${id}`)
    }
}

// New function: Update the task status
const toggleTask = (task) => {
    router.patch(`/tasks/${task.id}`, {
        is_completed: !task.is_completed // Note: Laravel handles the boolean flip
    })
}

const profile = () => {
    router.visit('/profile')
}

const logout = () => {
    router.post('/logout')
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Task Manager</h1>

            <form @submit.prevent="submit" class="flex gap-2 mb-8">
                <input v-model="form.title" type="text" placeholder="New task..."
                    class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Add
                </button>
            </form>

            <ul class="space-y-3">
                <li v-for="task in tasks" :key="task.id"
                    class="flex items-center justify-between bg-gray-50 p-3 rounded-md border border-gray-200">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" :checked="task.is_completed" @change="toggleTask(task)"
                            class="h-5 w-5 text-blue-600" />
                        <span :class="{ 'line-through text-gray-400': task.is_completed }" class="text-gray-700">
                            {{ task.title }}
                        </span>
                    </div>
                    <button @click="deleteTask(task.id)" class="text-red-500 hover:text-red-700 text-sm font-medium">
                        Delete
                    </button>
                </li>
            </ul>
        </div>
        <div class="max-w-md mx-auto mt-6 flex justify-end gap-4">
            <button @click="profile">Profile</button>
        </div>
        <div class="max-w-md mx-auto mt-6 flex justify-end gap-4">
            <button @click="logout">Logout</button>
        </div>
    </div>
</template>