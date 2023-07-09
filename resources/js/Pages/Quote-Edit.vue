<template>
    <div class="flex items-center justify-content-center min-h-screen bg-gray-100" style="margin-top: -250px">
        <div class="w-full md:w-2/2 lg:w-2/3 p-6 bg-white shadow-md rounded-xl">
            <div class="flex justify-content-between">
                <h2 class="text-xl mb-6">{{ quote.number }} | {{ quote.client.name }} - {{ quote.title }}</h2>
                <p :class="quote.status.name === 'Draft' ? 'quote-table-status-draft' : 'quote-table-status-sent'" class="text-right mb-4">{{ quote.status.name }}</p>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="rounded-md bg-gray-200">{{ quote.client.contact_name }}</div>
                <div class="rounded-md bg-gray-200">{{ quote.client.contact_email }}</div>
                <div class="rounded-md bg-gray-200">{{ quote.currency }}</div>
            </div>

            <div class="mb-4">
                <div v-for="(lineItem, index) in quote.lineItems" :key="lineItem.id" class="grid grid-cols-6 gap-2 items-center mb-2 bg-gray-200 p-4 rounded-md">
                    <input type="text" v-model="lineItem.supplier" placeholder="Supplier" />
                    <input type="text" v-model="lineItem.name" placeholder="Name" />
                    <input type="text" v-model="lineItem.description" placeholder="Description" />
                    <input type="number" v-model="lineItem.quantity" placeholder="Quantity" />
                    <select v-model="lineItem.currency_code">
                        <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
                    </select>
                    <input type="number" v-model="lineItem.amount" placeholder="Amount" />
                    <div class="flex">
                        <button @click="saveLineItem(index)" class="bg-green-500 text-white px-4 py-2 rounded-md">Save</button>
                        <button @click="removeLineItem(index)" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Remove</button>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="text" v-model="newLineItem.supplier" class="w-1/6 mr-2" placeholder="Supplier" />
                    <input type="text" v-model="newLineItem.name" class="w-1/6 mr-2" placeholder="Name" />
                    <input type="text" v-model="newLineItem.description" class="w-1/6 mr-2" placeholder="Description" />
                    <input type="number" v-model="newLineItem.quantity" class="w-1/6 mr-2" placeholder="Quantity" />
                    <select v-model="newLineItem.currency_code" class="w-1/6 mr-2">
                        <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
                    </select>
                    <input type="number" v-model="newLineItem.amount" class="w-1/6 mr-2" placeholder="Amount" />
                    <button @click="addLineItem" class="ml-2">Add</button>
                </div>
            </div>

            <div class="flex justify-end mb-4">
                <p class="mr-4">Total: {{ totalAmount.toFixed(2) }} GBP</p>
            </div>

            <div class="flex justify-end">
                <button @click="updateQuote" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Quote</button>
                <button @click="deleteQuote" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Delete Quote</button>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, reactive } from 'vue';

export default {
    props: ['quote', 'currencies'],
    setup(props) {
        const { quote, currencies } = props;

        // New line item form
        const newLineItem = reactive({
            supplier: '',
            name: '',
            description: '',
            quantity: 0,
            currency_code: '',
            amount: 0,
        });

        // Total amount
        const totalAmount = 0;

        if (quote.lineItems) {
            const totalAmount = computed(() => quote.lineItems.reduce((total, item) => total + item.amount, 0));
        }

        // Add a new line item
        const addLineItem = () => {
            quote.lineItems.push({ ...newLineItem });
            resetNewLineItem();
        };

        // Save a line item
        const saveLineItem = (index) => {
            // Implement API call or local state update
        };

        // Remove a line item
        const removeLineItem = (index) => {
            quote.lineItems.splice(index, 1);
        };

        // Reset new line item form
        const resetNewLineItem = () => {
            newLineItem.name = '';
            newLineItem.description = '';
            newLineItem.quantity = 0;
            newLineItem.currency_code = '';
            newLineItem.amount = 0;
        };

        // Update the quote
        const updateQuote = () => {
            // Make API call to update the quote with the updated data
        };

        // Delete the quote
        const deleteQuote = () => {
            // Make API call to delete the quote
        };

        return {
            newLineItem,
            totalAmount,
            currencies,
            addLineItem,
            saveLineItem,
            removeLineItem,
            resetNewLineItem,
            updateQuote,
            deleteQuote,
        };
    },
};
</script>
