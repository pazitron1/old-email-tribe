<template>
    <section class="pt-6 md:pt-10">
        <form @submit.prevent="searchJobs" class="relative block md:flex md:items-center md:justify-between space-y-4">
            <label for="search" class="hidden">Search</label>
            <input
                ref="search"
                v-model="query"
                type="text"
                @change="inputCleared()"
                name="search"
                class="transition-colors duration-100 ease-in-out focus:outline-0 border border-transparent focus:bg-white focus:border-gray-300 placeholder-gray-600 rounded-lg bg-white shadow md:rounded-lg py-2 md:py-4 pr-6 pl-8 mr-0 md:mr-6 block w-full appearance-none leading-normal"
                placeholder='Search job title, company or location...'>

                <button
                    class="whitespace-no-wrap flex w-full md:w-auto md:inline-flex items-center justify-center px-4 md:px-8 py-2 md:py-4 mr-0 md:mr-6 border border-transparent text-base leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                Search</button>
                <button
                    class="whitespace-no-wrap flex w-full md:w-auto inline-flex items-center justify-center py-0 md:py-4
                    text-base leading-6 font-medium rounded-md text-indigo-600 hover:text-indigo-400 focus:outline-none transition ease-in-out duration-150 bg-transparent"
                    @click="resetSearch">
                Reset</button>
        </form>
        <div v-if="query && searchRequested" class="absolute mt-2">
            <div class="flex items-center">
                <span class="text-xs text-gray-500 mr-2">Displaying all results for <span class="font-semibold">{{query}}</span> <span v-if="getCategoryName">in</span> <span class="font-semibold">{{getCategoryName}}</span></span>
                <span @click="resetSearch" class="text-tiny text-indigo-500 cursor-pointer">
                    [Reset]
                </span>
            </div>
        </div>

    </section>
</template>

<script>
    import EventBus from '../../app';

    export default {
        data() {
            return  {
                query: '',
                searchRequested: false,
            }
        },

        computed: {
            getCategoryName(){
                let path = window.location.pathname.split('/');
                if (path[2]) {
                    return path[2].replace(/-/g," ");
                } else {
                    return 'all';
                }

            }
        },

        methods: {
            inputCleared() {
                if (this.query === '') {
                    return this.resetSearch();
                }
            },
            searchJobs() {
                EventBus.$emit('performSearch', this.query);
                this.searchRequested = true;
            },
            resetSearch() {
                this.query = '';
                EventBus.$emit('resetSearch');
                this.searchRequested = false;
            }
        }
    }

</script>
