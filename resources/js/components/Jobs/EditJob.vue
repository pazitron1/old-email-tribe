<template>
    <section class="py-16 md:py-32 pb-4">
        <ValidationObserver class="w-full" v-slot="{ invalid, valid }">
            <form class="shadow rounded-lg">
                <div class="bg-indigo-100 rounded-t-lg border-t border-b-0 border-gray-200 p-8 md:p-16">
                    <transition tag="div" name="component-fade" mode="out-in">
                        <span
                            v-if="!editing"
                            v-text="job.company"
                            class="flex justify-center text-sm md:text-base text-gray-500 mb-4 md:mb-6 mr-3">
                        </span>
                        <div class="flex flex-col justify-center" v-if="editing">
                            <label class="mb-1 text-sm leading-5 font-semibold text-gray-700" for="Company name">Company name   <span class="text-gray-500 font-normal">(required)</span></label>
                            <validation-provider
                                rules="required"
                                v-slot="{ errors, classes }"
                                name="company name">

                                <input
                                    type="text"
                                    :class="classes"
                                    aria-label="Company name"
                                    class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 mb-1.5 block w-full appearance-none leading-normal"
                                    v-model="job.company">
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                            </validation-provider>
                        </div>
                    </transition>

                    <div class="flex relative justify-center mt-6">
                        <transition tag="div" name="component-fade" mode="out-in">
                            <h1
                                v-if="!editing"
                                class="text-gray-900 text-lg md:text-3xl text-center tracking-wide leading-9 font-bold mb-2 md:mb-4 mr-3"
                                v-text="job.title">
                            </h1>

                            <div class="block w-full justify-center" v-if="editing">
                                <label class="mb-1 text-sm leading-5 font-semibold text-gray-700" for="Company name">Job title   <span class="text-gray-500 font-normal">(required)</span></label>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job title">

                                    <input
                                        type="text"
                                        :class="classes"
                                        aria-label="Job title"
                                        class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 mb-2.5 block w-full appearance-none leading-normal"
                                        v-model="job.title">
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </div>
                        </transition>
                    </div>
                    <div class="flex relative justify-center mt-6">
                        <transition tag="div" name="component-fade" mode="out-in">
                            <div v-if="editing" class="w-full">
                                <label class="mb-1 text-sm leading-5 font-semibold text-gray-700" for="Linke to apply">Link to apply   <span class="text-gray-500 font-normal">(required)</span></label>
                                <validation-provider
                                    rules="required|url"
                                    v-slot="{ errors, classes }"
                                    name="link to apply">

                                    <input
                                        :class="classes"
                                        type="text"
                                        aria-label="Link to apply"
                                        class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 mb-2.5 block w-full appearance-none leading-normal"
                                        v-model="job.link_to_apply">
                                    <span v-show="!errors[0]" class="text-xs mt-1 text-gray-500">Please include a full path to the webpage, including the protocol (http or https).</span>
                                    <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>

                                    </validation-provider>
                            </div>
                            <a
                                v-if="!editing"
                                :href="job.link_to_apply"
                                target="_blank"
                                class="hidden md:block absolute bottom-0 -mb-22 rounded-md shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                                Apply for this role
                            </a>
                        </transition>
                    </div>
                </div>
                <div class="bg-white rounded-b-lg border-b border-t-0 border-gray-200 p-8 md:p-18 md:pb-16">
                    <div class="flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <div
                            v-if="!editing"
                            class="mt-2 rounded-lg flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            {{job.category.name}}
                        </div>
                        <div v-if="editing">
                            <label class="block mb-1 text-sm md:text-xs leading-5 font-semibold text-gray-700" for="category">        Category <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <div class="flex items-center sm:mr-4">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job category">

                                    <select
                                        :class="classes"
                                        v-model="job.category_id"
                                        aria-label="Job category"
                                        class="h-full border border-gray-200 bg-transparent text-gray-500 text-sm sm:leading-5 max-w-sm border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-1 pr-2 pl-2 block">
                                        <option
                                            v-for="(category, id) in categories"
                                            :value="category.id">
                                        {{category.name}}
                                        </option>
                                    </select>
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>

                                </validation-provider>

                            </div>
                        </div>
                        <div v-if="!editing" class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                              <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                            </svg>
                            {{job.type}}
                        </div>
                        <div v-if="editing">
                            <label class="block mb-1 text-sm md:text-xs leading-5 font-semibold text-gray-700" for="category">        Type <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <div class="flex items-center sm:mr-4">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="job type">

                                    <select
                                        aria-label="Job category"
                                        :class="classes"
                                        v-model="job.type"
                                        class="form-select h-full border text-sm border-gray-200 bg-transparent text-gray-500 sm:leading-5 max-w-sm border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-1 pr-2 pl-2 block">
                                        <option selected disabled :value='job.type'>{{job.type}}</option>
                                        <option>Full-time</option>
                                        <option>Part-time</option>
                                        <option>Contract</option>
                                        <option>Other</option>
                                    </select>

                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </div>
                        </div>

                        <div v-if="!editing" class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            {{job.location}}
                        </div>
                        <div class="sm:mr-4" v-if="editing">
                            <label class="block mb-1 text-sm md:text-xs leading-5 font-semibold text-gray-700" for="location">        Location  <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <validation-provider
                                rules="required"
                                v-slot="{ errors, classes }"
                                name="job location">

                                <input
                                    type="text"
                                    :class="classes"
                                    aria-label="Location"
                                    v-model="job.location"
                                    class="transition-colors duration-100 text-sm ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-1 pr-2 pl-2 block appearance-none leading-normal">

                                <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                            </validation-provider>
                        </div>

                        <div
                            v-if="job.salary && !editing"
                            class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-4">
                            <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            {{job.salary}}
                        </div>
                        <div v-if="editing">
                            <label class="block mb-1 text-sm md:text-xs leading-5 font-semibold text-gray-700" for="location">        Salary  <span class="text-gray-500 font-normal">(recommended)</span>
                            </label>
                            <input
                                type="text"
                                aria-label="Salary"
                                v-model="job.salary"
                                class="transition-colors duration-100 text-sm ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 text-gray-800 rounded-lg bg-white shadow md:rounded-lg py-1 pr-2 pl-2 appearance-none leading-normal">
                        </div>

                        <div v-if="!editing" class="mt-2 flex items-center text-sm leading-5 text-gray-600">
                            <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            Closing on January 9, 2020 -----make dynamic
                        </div>
                    </div>
                    <div class="w-24 border-2 border-indigo-100 my-6 md:my-12 rounded-lg"></div>
                    <transition name="component-fade" mode="out-in">
                        <div
                            v-if="!editing"
                            class="text-gray-900 text-sm md:text-base mb-4 leading-relaxed content"
                            v-html="job.description">
                        </div>
                        <div v-if="editing">
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
                        </div>
                    </transition>
                    <div class="w-24 border-2 border-indigo-100 my-6 md:my-12 rounded-lg"></div>
                    <div class="flex justify-center mt-6 md:mt-12">
                        <a :href="job.link_to_apply" class="rounded-md w-full md:w-auto shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                            Apply for this role
                        </a>
                    </div>
                </div>
            </form>
            <edit-job-panel
                @goToEditMode="editing = true"
                @goToPreview="editing = false"
                @saveChanges="saveChanges"
                :status="editing"
                :invalid="invalid"
                :valid="valid">
            </edit-job-panel>
        </ValidationObserver>

        <flash-fail v-if="showError" :message="this.successMessage" header="Oops!"></flash-fail>
        <flash-success v-if="showSuccessMessage" :message="this.successMessage" header="Successfully saved!"></flash-success>
    </section>
</template>

<script>
    import Wysiwyg from './Wizard/Wysiwyg';
    import EditJobPanel from './EditJobPanel';
    import FlashFail from './Flash/Fail';
    import FlashSuccess from './Flash/Success';

    export default {
        components: {
            'wysiwyg': Wysiwyg,
            'edit-job-panel': EditJobPanel,
            'flash-fail': FlashFail,
            'flash-success': FlashSuccess
        },
        props: ['jobObject', 'allCategories'],
        data() {
            return {
                job: this.jobObject,
                categories: this.allCategories,
                editing: false,
                showError: false,
                showSuccessMessage: false,
                errorMessage: '',
                successMessage: ''
            }
        },

        computed: {
            putUrl() {
                return '/api/jobs/' + this.jobObject.category.slug + '/' + this.jobObject.access_token;
            }
        },

        methods: {
            editingOn() {
                this.editing = true;
            },
            saveChanges(){
                axios.post(this.putUrl, {
                    _method: 'put',
                    title: this.job.title,
                    description: this.job.description,
                    location: this.job.location,
                    link_to_apply: this.job.link_to_apply,
                    type: this.job.type,
                    category_id: this.job.category_id,
                    company: this.job.company,
                    salary: this.job.salary
                })
                .then(response => {
                    this.editing = false;
                    this.successMessage = 'Your job listing details have been saved';
                    this.showSuccessMessage = true;
                })
                .catch(errors => {
                    this.errorMessage = 'Something went wrong, sorry about that'
                    this.showError = true;
                });
            }
        }
    }
</script>

<style scoped>
    .component-fade-enter-active, .component-fade-leave-active {
      transition: opacity .3s ease;
    }
    .component-fade-enter, .component-fade-leave-to
    /* .component-fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }

</style>
