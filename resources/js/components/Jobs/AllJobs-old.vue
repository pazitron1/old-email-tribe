<template>
    <div class="w-full md:w-9/12">
        <loading-jobs v-if="loading"></loading-jobs>
        <transition-group name="list" tag="div" appear>
            <a v-for="job in jobs" :key="job.id"
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
        <div class="warning" v-if="jobs.length<=0">
            <span>No results found.</span>
        </div>
    </div>

</template>

<script>
    import _ from 'lodash';
    import EventBus from '../../app';
    import LoadingJobs from './LoadingJobs';

    export default {
        components: {
            'loading-jobs': LoadingJobs
        },
        data() {
            return  {
                jobs: [],
                query: '',
                url: '/api/all-email-jobs',
                loading: true,
            }
        },

        mounted() {
            // this.jobs = (await axios.get('/api/all-email-jobs')).data;
            // getJobs();
            this.getJobs(this.url);

            EventBus.$on('performSearch', (data) => {
                this.searchJobs(data);
            });
        },
        watch: {
            query: {
                handler: _.debounce(function () {
                    this.searchJobs();
                }, 300)
            }
        },

        methods: {
            async getJobs(url) {
                await axios.get(url)
                .then(response => {
                    this.jobs = response.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 900)

                })
                .catch(function() {
                    this.loading = false;
                }.bind(this));
            },
            searchJobs(uri) {
                let searchString = this.url + '?search=' + uri;
                this.getJobs(searchString);
                //alert('searching');
            },
        }

    }
</script>

<style scoped>
    .list-enter-active {
      transition: all 1s;
    }
    .list-enter/* .list-leave-active below version 2.1.8 */ {
      opacity: 0;
      transform: translateY(30px);
    }
</style>
