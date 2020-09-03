<template>
    <div class="bg-indigo-600 border-t shadow border-indigo-600 fixed bottom-0 inset-x-0 z-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div class="relative">
              <div>
                <div class="flex justify-between items-center py-2 md:py-3 md:space-x-4">
                    <div class="flex items-center space-x-4 mr-0 md:mr-10">
                        <div class="bg-indigo-700 rounded-lg p-2">
                            <svg class="w-5 h-5 text-indigo-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <span class="inline text-base text-white">Preview and edit your job listing</span>
                    </div>
                    <div class="flex items-center justify-end">
                        <span class="inline-flex rounded-md shadow-sm">
                            <button
                                @click="goToEditMode"
                                v-if="!this.status"
                                class="ml-0 md:ml-16 whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-600 bg-white hover:text-indigo-400 transition ease-in-out duration-150">
                                Go to edit mode
                            </button>
                            <button
                                :disabled="invalid"
                                @click="saveChanges"
                                v-if="this.status"
                                class="ml-0 md:ml-16 whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-600 bg-white hover:text-indigo-400 transition ease-in-out duration-150">
                                Save changes
                            </button>
                            <a
                                v-if="!this.status"
                                href="/"
                                class="whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-100 bg-transparent hover:text-white transition ease-in-out duration-150">
                                Back to home page
                            </a>
                            <button
                                v-if="this.status"
                                @click="goToPreview"
                                class="cursor-pointer whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-100 bg-transparent hover:text-white transition ease-in-out duration-150">
                                Back to preview
                            </button>
                        </span>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['valid', 'invalid', 'status'],

        methods: {
            goToEditMode() {
                this.$emit('goToEditMode');
            },

            goToPreview() {
                this.$emit('goToPreview');
            },

            saveChanges() {
                this.$emit('saveChanges');
            }
        }
    }
</script>
