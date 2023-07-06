<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full md:w-1/2 lg:w-1/3 p-6 bg-white shadow-md rounded-xl">
            <h2 class="text-2xl font-bold mb-4 text-gray-700">Welcome, {{ user.name }}</h2>
            <p class="text-gray-600">Your email: {{ user.email }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: Object
    },
    data() {
        return {
            // your data here
        }
    }
}
</script>
