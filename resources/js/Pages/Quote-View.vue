<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full md:w-full lg:w-2/3 p-6 bg-white shadow-md rounded-xl">
            <div class="overflow-x-auto">
                <table class="quote-table">
                    <thead>
                    <tr>
                        <th><p>Number</p></th>
                        <th><p>Title</p></th>
                        <th><p>Client Name</p></th>
                        <th><p>Contact Name</p></th>
                        <th><p>Status</p></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="quote in quotes" :key="quote.id" @click="openEditPage(quote.id)">
                        <td>{{ quote.number }}</td>
                        <td>{{ quote.title }}</td>
                        <td>{{ quote.client_name }}</td>
                        <td>{{ quote.contact_name }}</td>
                        <td>
                            <p :class="quote.status === 'Draft' ? 'quote-table-status-draft' : 'quote-table-status-sent'">{{ quote.status }}</p>
                        </td>
                        <td><button class="btn-edit" @click="openEditPage(quote.id)">Edit</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        user: Object,
        quotes: Array
    },
    methods: {
        openEditPage(id) {
            Inertia.visit(`/quotes/${id}/edit`);
        },
        formatDate(date) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(date).toLocaleDateString(undefined, options);
        }
    }
}
</script>
