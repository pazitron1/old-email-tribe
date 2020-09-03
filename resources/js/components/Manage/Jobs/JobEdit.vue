<template>
    <section class="mb-16">
        <ValidationObserver class="w-full" v-slot="{ invalid, valid }">
            <form>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                  <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                      {{jobTitle}}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                      Job description and company information.
                    </p>
                  </div>
                  <div>
                    <dl>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Job title
                            </dt>
                            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job title">

                                    <input
                                        type="text"
                                        :class="classes"
                                        aria-label="Job title"
                                        class="transition-colors duration-100 ease-in-out focus:outline-0 text-base border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                        v-model="job.title">
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Company
                            </dt>
                            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job title">

                                    <input
                                        type="text"
                                        :class="classes"
                                        aria-label="Company name"
                                        class="transition-colors duration-100 ease-in-out focus:outline-0 text-base border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                        v-model="job.company">
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Location
                            </dt>
                            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job location">

                                    <input
                                        type="text"
                                        :class="classes"
                                        aria-label="job location"
                                        class="transition-colors duration-100 ease-in-out focus:outline-0 text-base border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                        v-model="job.location">
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                          </div>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Type
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job type">

                                    <select
                                        aria-label="Job category"
                                        :class="classes"
                                        v-model="job.type"
                                        class="form-select h-full border text-base border-gray-200 bg-transparent text-gray-500 sm:leading-5 max-w-sm border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block">
                                        <option selected disabled :value='job.type'>{{job.type}}</option>
                                        <option>Full-time</option>
                                        <option>Part-time</option>
                                        <option>Contract</option>
                                        <option>Other</option>
                                    </select>
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                          </div>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Category
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job category">

                                    <select
                                        v-model="job.category_id"
                                        :class="classes"
                                        aria-label="Job category"
                                        class="h-full border border-gray-200 bg-transparent text-gray-500 text-base sm:leading-5 max-w-sm border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block">
                                        <option
                                            v-for="(category, id) in categories"
                                            :value="category.id">
                                        {{category.name}}
                                        </option>
                                    </select>
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Salary (recommended)
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <input
                                    type="text"
                                    aria-label="Salary"
                                    v-model="job.salary"
                                    class="transition-colors duration-100 text-base ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 appearance-none leading-normal">
                            </dd>
                          </div>
                          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Job description
                            </dt>
                            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job description">

                                    <wysiwyg
                                        :class="classes"
                                        v-model="job.description"
                                        name="job description">
                                    </wysiwyg>
                                    <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Link to apply
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required|url"
                                    v-slot="{ errors, classes }"
                                    name="link to apply">

                                    <input
                                        type="text"
                                        :class="classes"
                                        aria-label="Link to apply"
                                        class="transition-colors duration-100 text-base ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                        v-model="job.link_to_apply">
                                    <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Created at
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="created at">

                                    <input
                                        type="text"
                                        :class="classes"
                                        aria-label="created date"
                                        class="transition-colors duration-100 text-base ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                        v-model="job.created_at">
                                    <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>
                                </validation-provider>
                            </dd>
                        </div>
                    </dl>
                    </div>
                    <div class="px-4 py-5 bg-gray-100 border-t border-gray-200 sm:px-6 flex items-center justify-end">
                        <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                            <a
                                href="/manage/jobs"
                                class="px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                Cancel
                            </a>
                        </span>

                        <span class="sm:ml-3 shadow-sm rounded-md">
                            <button
                                type="button"
                                @click="saveChanges"
                                class="px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                                Edit & save
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </ValidationObserver>

        <flash-fail v-if="showError" :message="this.failMessage" header="Oops!"></flash-fail>
        <flash-success v-if="showSuccessMessage" :message="this.successMessage" header="Successfully saved!"></flash-success>
    </section>
</template>

<script>
    import Wysiwyg from '../../Jobs/Wizard/Wysiwyg';
    import FlashFail from '../../Jobs/Flash/Fail';
    import FlashSuccess from '../../Jobs/Flash/Success';

    export default {
        components: {
            'wysiwyg': Wysiwyg,
            'flash-fail': FlashFail,
            'flash-success': FlashSuccess
        },
        props: ['jobObject', 'allCategories'],
        data() {
            return {
                job: this.jobObject,
                categories: this.allCategories,
                jobTitle: this.jobObject.title,

                showSuccessMessage: false,
                showError: false,
                successMessage: '',
                failMessage: ''
            }
        },

        computed: {
            putUrl() {
                return '/manage/jobs/' + this.jobObject.slug;
            }
        },

        methods: {
            saveChanges() {
                axios.post(this.putUrl, {
                    _method: 'put',
                    id: this.job.id,
                    title: this.job.title,
                    description: this.job.description,
                    location: this.job.location,
                    link_to_apply: this.job.link_to_apply,
                    type: this.job.type,
                    category_id: this.job.category_id,
                    company: this.job.company,
                    salary: this.job.salary,
                    created_at: this.job.created_at
                })
                .then(response => {
                    this.successMessage = 'Your job listing details have been saved';
                    this.showSuccessMessage = true;
                })
                .catch(errors => {
                    this.errorMessage = 'Something went wrong, sorry about that';
                });
            }
        }
    }
</script>
