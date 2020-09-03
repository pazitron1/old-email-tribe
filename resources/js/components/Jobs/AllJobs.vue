<template>
    <div class="w-full md:w-9/12">
        <loading-jobs v-if="loading"></loading-jobs>
        <transition-group name="list" tag="div" appear>
            <a v-for="job in jobs" :key="job.id"
                :href="'/jobs/' + job.category.slug + '/' + job.slug"
                class="flex justify-between bg-white p-4 rounded-lg border shadow border-gray-200 group hover:bg-indigo-100 mb-4">
                <div class="flex items-center space-x-4">
                    <div>
                        <div class="flex">
                            <h2 class="text-sm sm:text-lg font-semibold mb-1 text-gray-800 group-hover:text-gray-900">{{job.title}}</h2><span v-if="isNew(job.created_at)" class="text-tiny font-semibold text-green-600 ml-2">NEW</span>
                        </div>
                        <div class="flex space-x-2 text-xs text-gray-600">
                            <span class="text-indigo-600 font-semibold">{{job.type}}</span>
                            <span>&bull;</span>
                            <span>{{job.company}}</span>
                            <span>&bull;</span>
                            <span>{{job.location}}</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center md:block">
                    <div class="hidden md:block mb-4">
                        <span class="w-auto inline-block rounded-full bg-indigo-100 hover:bg-indigo-400 text-indigo-400 hover:text-white uppercase px-2 py-1 text-tiny font-bold cursor-pointer md:m-0 mr-3 mb-3">{{job.category.name}}</span>
                    </div>
                    <div class="flex justify-end">
                        <span class="text-xs text-gray-500">{{formattedDate(job.created_at)}}</span>
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
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    dayjs.extend(relativeTime);

    export default {
        props: ['category'],
        components: {
            'loading-jobs': LoadingJobs
        },
        data() {
            return  {
                jobs: [],
                query: '',
                url: '',
                loading: true,
            }
        },

        mounted() {

            if (this.category) {
                this.url = '/api/jobs/' + this.category;
            } else {
                this.url = '/api/all-email-jobs';
            }

            this.getJobs(this.url);

            EventBus.$on('performSearch', (data) => {
                this.searchJobs(data);
            });

             EventBus.$on('resetSearch', (data) => {
                this.getJobs(this.url);
            });

             EventBus.$on('fetchCategoryJobs', (data) =>{
                this.getJobs(data);
             })
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
                    }, 300)

                })
                .catch(function() {
                    this.loading = false;
                }.bind(this));
            },
            searchJobs(uri) {
                let searchString = this.url + '?search=' + uri;
                this.getJobs(searchString);
            },
            formattedDate(date) {
                let now = dayjs();
                let days = now.diff(dayjs(date), 'days');

                if (days >= 25) {
                    return 'expires soon';
                }
                    return dayjs(date).fromNow();
            },
            isNew(date) {
                return dayjs().format('YYYY-MM-DD') == dayjs(date).format('YYYY-MM-DD');
            }
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
    .list-enter-leave {
      transition: all 1s;
    }
    .list-leave/* .list-leave-active below version 2.1.8 */ {
      opacity: 0;
      transform: translateY(30px);
    }
</style>
