<template>
    <div class="w-full md:w-9/12">
        <input v-model="search" type="text" placeholder="Search...">
        <transition-group name="fade-list" tag="div">
            <a v-for="job in filteredList" :key="job.id"
                href=""
                class="flex justify-between bg-white p-4 rounded-lg border shadow border-gray-200 group hover:bg-indigo-100 mb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="block w-10 md:w-16" src="https://www.staralliance.com/documents/20184/442914180/Round+the+World.png?v=latest" alt="Company logo">
                    </div>
                    <div>
                        <h2 class="text-sm sm:text-base font-semibold mb-1 text-gray-800 group-hover:text-gray-900">{{job.title}}</h2>
                        <div class="flex space-x-2 text-xs text-gray-600">
                            <span>ACME Corporation</span>
                            <span>|</span>
                            <span>{{job.location}}</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center md:block">
                    <div class="hidden md:block mb-4">
                        <span class="w-auto inline-block rounded-full bg-indigo-100 hover:bg-indigo-400 text-indigo-400 hover:text-white uppercase px-2 py-1 text-tiny font-bold cursor-pointer md:m-0 mr-3 mb-3">Email Dev</span>
                        <span class="w-auto inline-block rounded-full bg-indigo-100 hover:bg-indigo-400 text-indigo-400 hover:text-white uppercase px-2 py-1 text-tiny font-bold cursor-pointer md:m-0 mr-3 mb-3">Email Marketing</span>
                        <span class="w-auto inline-block rounded-full bg-indigo-100 hover:bg-indigo-400 text-indigo-400 hover:text-white uppercase px-2 py-1 text-tiny font-bold cursor-pointer md:m-0 mr-3 mb-3">Email Design</span>
                    </div>
                    <div class="flex justify-end">
                        <span class="text-xs text-gray-500">3 days ago</span>
                    </div>
                </div>
            </a>
        </transition-group>
        <div class="warning" v-if="filteredList.length<=0">
            <span>No results found.</span>
        </div>
    </div>

</template>

<script>
    import _ from 'lodash';

    export default {
        data() {
            return  {
                jobs: [],
                url: '/api/all-email-jobs',
                search: '',
            }
        },

        created() {
            this.getJobs(this.url);
        },

        computed: {
            filteredList() {
              return this.jobs.filter(job => {
                return job.title.toLowerCase().includes(this.search.toLowerCase())
              })
            }
        },

        methods: {
            async getJobs(url) {
                await axios.get(url)
                .then(response => {
                    this.jobs = response.data;
                });
            },
        }

    }
</script>

<style scoped>
    .fade-list-move {
    transition: transform 0.25s ease;
}

.fade-list-leave-to {
    transition: all 0.5s ease;
    opacity: 0;
}
</style>
