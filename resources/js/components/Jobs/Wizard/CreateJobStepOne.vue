<template>
    <div class="shadow rounded-lg">
        <div class="bg-indigo-600 rounded-t-lg w-full bg-gradient-indigo">
            <h1 class="text-white text-lg md:text-3xl text-center tracking-wide leading-10 font-bold py-24">Hire your next Email professional</h1>
        </div>
        <div class="flex">
            <ValidationObserver class="w-full" v-slot="{ invalid, valid }">
                <form class="bg-white rounded-b-lg p-8 md:p-12 md:pb-8 w-full">
                    <div class="flex flex-col">
                        <h2 class="text-lg text-gray-800 font-semibold leading-relaxed mb-6">About the job</h2>
                        <div class="mb-8 relative">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="title">Job title   <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <validation-provider
                                rules="required"
                                v-slot="{ errors, classes }"
                                name="job title">
                                <input
                                    type="text"
                                    aria-label="Job title"
                                    v-model="form.jobTitle"
                                    :class="classes"
                                    @change="inputChanged"
                                    class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                    placeholder="Example: SFMC Email Developer">
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                            </validation-provider>
                        </div>
                        <div class="mb-8">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="type">Employment type <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <div class="relative flex items-center">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="employment type">
                                    <select
                                        aria-label="Employment type"
                                        v-model="form.employmentType"
                                        :class="classes"
                                        @change="inputChanged"
                                        class="form-select h-full focus:outline-none border-gray-200 bg-transparent text-gray-500 sm:leading-5 max-w-sm border border-gray-200 focus:bg-white focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block">
                                        <option selected disabled value=''>Select type</option>
                                        <option>Full-time</option>
                                        <option>Part-time</option>
                                        <option>Contract</option>
                                        <option>Other</option>
                                      </select>
                                    <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                                </validation-provider>
                            </div>
                        </div>
                        <div class="mb-8">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="salary">Salary  <span class="text-gray-500 font-normal">(recommended)</span>
                            </label>
                            <input
                                type="text"
                                aria-label="Salary"
                                v-model="form.salary"
                                @change="inputChanged"
                                class="transition-colors duration-100 focus:outline-none ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                placeholder="Example: £60k pa, plus bonus">
                        </div>
                         <div class="mb-8">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="category">        Category <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <div class="flex items-center">
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, classes }"
                                    name="category">
                                    <select
                                        aria-label="Job category"
                                        v-model="form.category"
                                        @change="inputChanged"
                                        :class="classes"
                                        class="form-select h-full border border-gray-200 bg-transparent text-gray-500 sm:leading-5 max-w-sm border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block">
                                        <option selected disabled value=''>Select category</option>
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
                        <div class="mb-8 relative">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="location">        Location  <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                             <validation-provider
                                rules="required"
                                v-slot="{ errors, classes }"
                                name="location">
                                <input
                                    type="text"
                                    aria-label="Location"
                                    :class="classes"
                                    v-model="form.location"
                                    @change="inputChanged"
                                    class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                    placeholder="Example: London, UK">
                                <span class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                            </validation-provider>
                        </div>
                        <div class="mb-8 relative">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="location">How to apply  <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                             <validation-provider
                                rules="required|url"
                                v-slot="{ errors, classes }"
                                name="link to apply">
                                <input
                                    type="text"
                                    v-model="form.linkToApply"
                                    :class="classes"
                                    @change="inputChanged"
                                    aria-label="How to apply"
                                    class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                    placeholder="Example: https://company.com/jobs/email-job/apply">
                                <span v-show="!errors[0]" class="text-xs mt-1 text-gray-500">Please include a full path to the webpage, including the protocol (http or https).</span>
                                <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>
                            </validation-provider>
                        </div>
                        <div class="relative block">
                            <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="location">Job description  <span class="text-gray-500 font-normal">(required)</span>
                            </label>
                            <validation-provider
                                rules="required"
                                v-slot="{ errors, classes }"
                                name="job description">
                                <wysiwyg
                                    name="description"
                                    v-model="form.jobDescription"
                                    :class="classes"
                                    @change="inputChanged">
                                </wysiwyg>
                               <!--  <textarea
                                    rows="6"
                                    v-model="form.jobDescription"
                                    :class="classes"
                                    @change="inputChanged"
                                    class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"></textarea> -->
                                <span v-show="!errors[0]" class="text-xs mt-1 text-gray-500">Don't worry if it's not 100% perfect, you will be able to edit it afterwards</span>
                                <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>
                            </validation-provider>
                        </div>

                    </div>
                    <div class="w-24 border-2 border-indigo-100 my-6 md:my-8 rounded-lg"></div>
                    <h2 class="text-lg text-gray-800 font-semibold leading-relaxed mb-6">About the company</h2>
                    <div class="mb-8 relative">
                        <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="company_name">Company name or recruitment company name <span class="text-gray-500 font-normal">(required)</span>
                        </label>
                        <validation-provider
                            rules="required"
                            v-slot="{ errors, classes }"
                            name="company name">
                            <input
                                type="text"
                                :class="classes"
                                v-model="form.companyName"
                                @change="inputChanged"
                                aria-label="Company name"
                                class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:border-gray-300 focus:outline-none placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                placeholder="Example: Acme, inc">
                            <span class="text-xs text-red-500 absolute" style="margin-top:0.2rem;">{{errors[0]}}</span>
                        </validation-provider>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="location">About your company  <span class="text-gray-500 font-normal">(recommended)</span>
                        </label>
                        <textarea
                            rows="6"
                            @change="inputChanged"
                            v-model="form.aboutCompany"
                            class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"></textarea>
                        <span class="text-xs mt-1 text-gray-500 leading-tight">We recommned adding the company description to help candidates to learn more about your organisation, work culture, etc.</span>
                    </div>
                    <div class="w-24 border-2 border-indigo-100 my-6 md:my-8 rounded-lg"></div>
                    <h2 class="text-lg text-gray-800 font-semibold leading-relaxed mb-6">About you</h2>
                    <div class="mb-8 relative">
                        <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="email">Your email address <span class="text-gray-500 font-normal">(required)</span>
                        </label>
                        <validation-provider
                            rules="required|email"
                            v-slot="{ errors, classes }"
                            name="email">
                            <input
                                type="text"
                                :class="classes"
                                v-model="form.email"
                                @change="inputChanged"
                                aria-label="Email"
                                class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:outline-none focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                placeholder="john.doe@email.com">
                            <span v-show="!errors[0]" class="text-xs mt-1 text-gray-500">Your email address won't be publicly available. We'll only use it to send updates on your job listing and receipts.</span>
                                <span v-show="errors[0]" class="text-xs text-red-500 mt-1">{{errors[0]}}</span>
                        </validation-provider>
                    </div>
                </form>
                <progress-status :invalid="invalid" :valid="valid" :step="1"></progress-status>
            </ValidationObserver>
        </div>

    </div>
</template>

<script>
    import EventBus from '../../../app';
    import Wysiwyg from './Wysiwyg';

    export default {
        components: {
            'wysiwyg': Wysiwyg
        },
        data() {
            return {
                form: {
                    jobTitle: '',
                    employmentType: '',
                    salary: '',
                    category: '',
                    location: '',
                    linkToApply: '',
                    jobDescription: '',
                    companyName: '',
                    aboutCompany: '',
                    email: ''

                },
                categories: []
            }
        },

        mounted() {
            this.fetchCategories();
        },

        methods: {
            inputChanged() {
                EventBus.$emit('formChanged', this.form);
            },
            fetchCategories() {
                axios.get('/categories')
                    .then(response => {
                      this.categories = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        }
    }
</script>
