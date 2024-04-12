<template>
    <!-- component -->
    <div
        class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12"
    >
        <div class="relative py-3 sm:w-96 mx-auto text-center">
            <span class="text-2xl font-light">Login to your account</span>
            <div class="mt-4 bg-white shadow-md rounded-lg text-left">
                <div class="h-2 bg-purple-400 rounded-t-md"></div>
                <form @submit.prevent="store" class="px-8 py-6">
                    <label class="block font-semibold">
                        Username or Email
                    </label>
                    <input
                        type="text"
                        v-model="form.email"
                        placeholder="Email"
                        class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md"
                    />
                    {{ form.errors.email }}

                    <label class="block mt-3 font-semibold">
                        Username or Email
                    </label>
                    <input
                        type="password"
                        v-model="form.password"
                        placeholder="Password"
                        class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md"
                    />
                    {{ form.errors.password }}

                    <div class="flex justify-between items-baseline">
                        <button
                            type="submit"
                            class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-600"
                        >
                            Login
                        </button>
                        <a href="#" class="text-sm hover:underline"
                            >Forgot password?</a
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import {  useForm } from "@inertiajs/vue3";
const form = useForm({
    email: "",
    password: "",
});
const store = () => {
    form.post(route("login.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>
