<template>
    <div>
        <!-- component -->
        <section class="container px-4 mx-auto">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 s-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                    >
                        <Link href="/users/create">Create User</Link>
                        <input type="search" v-model="search" class="border" />
                        <div
                            class="s-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg w-8/12 mx-auto my-3"
                        >
                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                        >
                                            User
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"
                                >
                                    <tr
                                        v-for="user in users.data"
                                        :key="user.id"
                                    >
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                                        >
                                            <div
                                                class="flex items-center gap-x-2"
                                            >
                                                <img
                                                    class="object-cover w-8 h-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                                    alt=""
                                                />
                                                <div>
                                                    <h2
                                                        class="text-sm font-medium text-gray-800 dark:text-white"
                                                    >
                                                        {{ user.name }}
                                                    </h2>
                                                    <p
                                                        class="text-xs font-normal text-gray-600 dark:text-gray-400"
                                                    >
                                                        {{ user.email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                                        >
                                            edit
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <Link
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800"
                    v-for="link in users.links"
                    :key="link.index"
                    v-html="link.label"
                    preserve-scroll
                    :href="link.url"
                    :class="{
                        'dark:bg-gray-600': !link.url,
                        'dark:bg-red-500': users.current_page == link.label,
                    }"
                >
                </Link>
            </div>
        </section>
    </div>
</template>
<script setup>
import Layout from "@/Layouts/admin.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
const props = defineProps(["users","search"]);
const search = ref(props.search);

watch(search, newvalue=> {
    router.get("/admin/users",{
        search: newvalue
    },{
            preserveState: true,
            preserveScroll:true,
            only: ["users"],
        })
});
// watch(search, (newvalue) => {
//     router.get(
//         "/admin/users",
//         {
//             search: newvalue,
//         },
//         {
//             preserveState: true,
//             only: "users",
//         }
//     );
// });
</script>
<script>
export default {
    layout: Layout,
};
</script>
