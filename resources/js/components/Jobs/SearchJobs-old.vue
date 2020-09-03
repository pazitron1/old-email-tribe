<template>
    <section class="pt-6 md:pt-10">
        <label for="search" class="hidden">Search</label>
        <input
            @keyup="searchJobs"
            ref="search"
            v-model="query"
            type="text"
            name="search"
            class="transition-colors duration-100 ease-in-out focus:outline-0 border border-transparent focus:bg-white focus:border-gray-300 placeholder-gray-600 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-6 block w-full appearance-none leading-normal"
            placeholder="Search job title, company or location...">
    </section>
</template>

<script>
    import EventBus from '../../app';

    export default {
        data() {
            return  {
                query: ''
            }
        },
        methods: {
            searchJobs() {
                EventBus.$emit('performSearch', this.query);
            }
        }
    }

</script>
