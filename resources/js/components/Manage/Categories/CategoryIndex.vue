<template>
    <div class="h-screen">
        <div v-for="(category, index) in categories" :key="category.id" class="lg:flex lg:items-center lg:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:leading-9 sm:truncate">
                    {{category.name}}
                </h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                      <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                      {{numberOfJobs(category)}}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        {{category.slug}}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                      <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      {{formattedDate(category.created_at)}}
                    </div>
                </div>
            </div>
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <span class="hidden sm:block shadow-sm rounded-md">
                    <button
                        @click.prevent="$modal.show(category.slug)"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                      </svg>
                      Edit
                    </button>
                    <category-edit
                        :category-object="category"
                        @editedSuccessfully="FlashEditSuccess"
                    inline-template>
                        <transition name="fade">
                            <modal :name="modalName"
                                   classes="bg-white rounded-lg shadow"
                                   height="auto"
                                   :width="360"
                                   scrollable>
                              <div class="w-full">
                                <form @submit.prevent="onSubmit" class="bg-white p-6">
                                  <h2 class="text-lg text-gray-900 mb-3">Editing job category</h2>
                                  <div class="mb-8 relative">
                                    <input
                                      type="text"
                                      aria-label="Category name"
                                      v-model="categoryName"
                                      class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal">
                                    <span v-if="showError" class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">Category name is required</span>
                                  </div>

                                  <div class="flex mt-6 justify-end">
                                    <button
                                        class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-6 font-medium rounded-md bg-green-600 text-green-100 hover:bg-green-500 hover:text-white focus:outline-none focus:shadow-outline-indigo active:bg-green-500 transition ease-in-out duration-150">
                                      Edit & close
                                    </button>
                                  </div>
                                </form>
                              </div>
                              <flash-success v-if="showSuccessMessage" message="The category has been edited" header="Success!"></flash-success>
                            </modal>
                          </transition>

                    </category-edit>
                </span>

                <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                    <a
                        :href="'/jobs/' + category.slug"
                        target="_blank"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                        </svg>
                        View active
                    </a>
                </span>

                <span class="sm:ml-3 shadow-sm rounded-md">
                    <button
                        @click="deleteCategory(category, index)"
                        type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Delete
                    </button>
                </span>

                <!-- Dropdown -->
                <span class="ml-3 relative shadow-sm rounded-md sm:hidden">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out" id="mobile-menu" aria-haspopup="true">
                      More
                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!--
                      Dropdown panel, show/hide based on dropdown state.

                      Entering: "transition ease-out duration-200"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg" aria-labelledby="mobile-menu" role="menu">
                        <div class="py-1 rounded-md bg-white shadow-xs">
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">View</a>
                        </div>
                    </div>
                </span>
            </div>
        </div>
        <flash-success v-if="showSuccessMessage" :message="message" header="Success!"></flash-success>
    </div>
</template>

<script>
    import FlashSuccess from '../../Jobs/Flash/Success';
    import CategoryEdit from './CategoryEdit';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    dayjs.extend(relativeTime);

    export default {
        components: {
            'flash-success': FlashSuccess,
            'category-edit': CategoryEdit
        },
        data() {
            return {
                categories: [],
                showSuccessMessage: false,
                message: ''
            }
        },

        mounted() {
            this.fetchCategories();
        },

        methods: {
            fetchCategories() {
                axios.get('/categories')
                    .then(response => {
                        this.categories = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },

            deleteCategory(category, index) {
                if(confirm("Do you want to delete this category?")){
                    this.categories.splice(index, 1);
                    axios.delete('/manage/categories/' + category.slug)
                        .then(response => {
                            this.message = 'The category has been deleted';
                            this.showSuccessMessage = true;
                            this.categories.splice(index, 1);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            },

            formattedDate(date) {
                return dayjs(date).fromNow();
            },

            numberOfJobs(category) {
                if (category.jobs.length == 1) {
                    return category.jobs.length + ' ' + 'job';
                }
                    return category.jobs.length + ' ' + 'jobs';
            },

            FlashEditSuccess(data) {
                this.fetchCategories();
                this.message = "The caregory has been edited";
                this.showSuccessMessage = true;
            }

        }
    }
</script>
