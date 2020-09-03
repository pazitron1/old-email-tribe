<template>
    <div>
        <div class="bg-indigo-100 rounded-t-lg border-t border-b-0 border-gray-200 p-8 md:p-16">
            <div class="w-auto h-auto mb-4">
                <img class="block w-10 md:w-16 mx-auto rounded-full" src="https://www.staralliance.com/documents/20184/442914180/Round+the+World.png?v=latest" alt="Company logo">
            </div>
            <span class="flex justify-center text-sm md:text-base text-gray-500 mb-4 md:mb-6">
                {{form.companyName}}
            </span>
            <h1
                class="text-gray-900 text-lg md:text-3xl text-center tracking-wide leading-10 font-bold mb-2 md:mb-4">
                 {{form.jobTitle}}
            </h1>
            <div class="relative flex justify-center">
                <a
                    :href="form.linkToApply"
                    target="_blank"
                    class="md:hidden w-full absolute bottom-0 -mb-13 rounded-md shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                    Apply for this role
                </a>

                <a
                    :href="form.linkToApply"
                    target="_blank"
                    class="hidden md:block absolute bottom-0 -mb-22 rounded-md shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                    Apply for this role
                </a>
                <span class="hidden md:block absolute bottom-0 -mb-28 text-xs text-gray-500">redirects to {{getHostName}}</span>
                <span class="block md:hidden absolute bottom-0 -mb-18 text-tiny text-gray-500">redirects to {{getHostName}}</span>
            </div>
        </div>
        <div class="bg-white rounded-b-lg border-b border-t-0 border-gray-200 p-8 md:p-24 md:pb-16">
            <div class="flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                      <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                    </svg>
                    {{form.employmentType}}
                </div>
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    {{form.location}}
                </div>
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    {{form.salary}}
                </div>
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                    <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    Closing on January 9, 2020
                </div>
            </div>
            <div class="w-24 border-2 border-indigo-100 my-6 md:my-12 rounded-lg"></div>
            <div v-html="form.jobDescription" class="text-gray-900 text-sm md:text-base mb-4 leading-relaxed">
            </div>
            <div class="w-24 border-2 border-indigo-100 my-6 md:my-12 rounded-lg"></div>
            <div class="flex justify-center mt-6 md:mt-12">
                <a
                    :href="form.linkToApply"
                    target="_blank"
                    class="rounded-md w-full md:w-auto shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                    Apply for this role
                </a>
            </div>
            <span class="text-tiny md:text-xs text-gray-500 text-center mx-auto block mt-2">redirects to {{getHostName}}</span>
        </div>
        <progress-status :step="2"></progress-status>
    </div>
</template>

<script>
    import EventBus from '../../../app';
    export default {
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
                    aboutCompany: ''
                 }

            }
        },
        created() {
            EventBus.$on('formChanged', (data) => {
                this.form = data;
            });
        },

        computed: {
            getHostName() {
                let pathArray = this.form.linkToApply.split( '/' );
                // let protocol = pathArray[0];
                let host = pathArray[2];
                // let url = protocol + '//' + host;

                return host;

            }
        }
    }
</script>
