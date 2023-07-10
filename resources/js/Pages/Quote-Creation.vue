<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full md:w-1/2 lg:w-1/3 p-6 bg-white shadow-md rounded-xl">
            <h2 class="text-2xl font-bold mb-4 text-gray-700">Hi {{ user.name }}</h2>
            <form @submit.prevent="createQuote">
                <p>{{ status }}</p>
                <div class="mb-4">
                    <label class="text-gray-600">Quote Title</label>
                    <input type="text" id="title" v-model="quote.title" class="w-full px-3 py-2 mt-1 border rounded-md text-gray-600" placeholder="Quote title" required>
                </div>

                <div class="mb-4">
                    <label class="text-gray-600">Client Name</label>
                    <input type="text" id="client_name" v-model="quote.client_name" class="w-full px-3 py-2 mt-1 border rounded-md text-gray-600" placeholder="Client name" required>
                </div>

                <div class="mb-4">
                    <label class="text-gray-600">Client Contact Name</label>
                    <input type="text" id="contact_name" v-model="quote.contact_name" class="w-full px-3 py-2 mt-1 border rounded-md text-gray-600" placeholder="Contact name" required>
                </div>

                <div class="mb-4">
                    <label class="text-gray-600">Client Contact Email</label>
                    <input type="email" id="contact_email" v-model="quote.contact_email" class="w-full px-3 py-2 mt-1 border rounded-md text-gray-600" placeholder="Contact email" required>
                </div>

                <div class="mb-4">
                    <label class="text-gray-600">Quote Currency</label>
                    <select v-model="quote.currency" class="w-full px-3 py-2 mt-1 border rounded-md text-gray-600" required>
                        <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
                    </select>
                </div>

                <button type="submit" class="w-full px-3 py-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600">Create Quote</button>
            </form>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        user: Object,
        currencies: Array,
        status: Number
    },
    data() {
        return {
            quote: {
                title: '',
                client_name: '',
                contact_name: '',
                contact_email: '',
                currency: this.currencies[0] || 'GBP'
            }
        }
    },
    methods: {
        createQuote() {
            $.ajax({
                url: '/api/quotes-create',
                type: 'POST',
                data: this.quote,
                success: function(quote) {
                    Inertia.visit('/quotes-view');
                },
                error: function(xhr) {
                    let error = xhr.responseJSON;
                    for (let errorKey in error) {
                        let errorField = $('#'+errorKey);

                        errorField.addClass('quote-input-error');
                        errorField.prop('placeholder', error[errorKey]);
                    }
                }
            });
        }
    }
}
</script>
