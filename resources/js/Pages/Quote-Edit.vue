<template>
<!--    TODO: Finish up edit page-->
    <div class="flex items-center justify-content-center min-h-screen bg-gray-100">
        <div style="margin-bottom: 500px" class="w-full md:w-1/2 lg:w-1/3 p-6 bg-white shadow-md rounded-xl">
            <h2 class="text-xl mb-4">{{ quote.number }} | {{ quote.client.name }} - {{ quote.title }}</h2>
            <p class="text-right mb-4">{{ quote.status.name }}</p>

            <div class="mb-4">
                <!-- Line items list -->
                <div v-for="(lineItem, index) in quote.lineItems" :key="lineItem.id" class="flex items-center mb-2">
                    <input type="text" v-model="lineItem.name" class="w-1/5 mr-2" />
                    <input type="text" v-model="lineItem.description" class="w-2/5 mr-2" />
                    <input type="number" v-model="lineItem.quantity" class="w-1/5 mr-2" />
                    <input type="text" v-model="lineItem.currency_code" class="w-1/5 mr-2" />
                    <input type="number" v-model="lineItem.amount" class="w-1/5 mr-2" />
                    <button @click="removeLineItem(index)" class="ml-2">Remove</button>
                </div>

                <!-- Add new line item form -->
                <div class="flex items-center">
                    <input type="text" v-model="newLineItem.name" class="w-1/5 mr-2" placeholder="Name" />
                    <input type="text" v-model="newLineItem.description" class="w-2/5 mr-2" placeholder="Description" />
                    <input type="number" v-model="newLineItem.quantity" class="w-1/5 mr-2" placeholder="Quantity" />
                    <input type="text" v-model="newLineItem.currency_code" class="w-1/5 mr-2" placeholder="Currency" />
                    <input type="number" v-model="newLineItem.amount" class="w-1/5 mr-2" placeholder="Amount" />
                    <button @click="addLineItem" class="ml-2">Add</button>
                </div>
            </div>

            <div class="flex justify-end">
                <button @click="updateQuote" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Quote</button>
                <button @click="deleteQuote" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Delete Quote</button>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue';

export default {
    props: ['quote'],
    setup(props) {
        const { quote } = props;

        // New line item form
        const newLineItem = reactive({
            name: '',
            description: '',
            quantity: 0,
            currency_code: '',
            amount: 0,
        });

        // Add a new line item
        const addLineItem = () => {
            quote.lineItems.push({ ...newLineItem });
            resetNewLineItem();
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
            addLineItem,
            removeLineItem,
            resetNewLineItem,
            updateQuote,
            deleteQuote,
        };
    },
};
</script>

<style>
/* Add your CSS styles here */
</style>
