<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full md:w-1/2 lg:w-1/3 p-6 bg-white shadow-md rounded-xl">
            <h2 class="text-2xl font-bold mb-4 text-gray-700">Sign in</h2>
            <form :action="route('login')" method="post">
                <input type="hidden" name="_token" v-bind:value="csrf">
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Email</label>
                    <input id="email" name="email" type="email" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-600 mb-2">Password</label>
                    <input id="password" name="password" type="password" class="w-full p-2 border border-gray-300 rounded-md" required>
                </div>
                <button type="submit" class="w-full py-2 px-4 text-white bg-blue-500 rounded-md hover:bg-blue-700">Sign in</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            //csrf token
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }
}
</script>
