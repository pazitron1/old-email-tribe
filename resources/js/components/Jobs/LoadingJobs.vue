<template>
    <div class="relative">
        <div class="absolute inset-0 rounded-lg" style="background-image:linear-gradient(0deg, #f7fafc, transparent);"></div>
        <div
            v-for="job in jobs"
            class="flex justify-between bg-white p-4 rounded-lg border shadow border-gray-200 mb-4 select-none">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <span class="bg-gray-200 w-16 h-16 block rounded-full"></span>
                </div>
                <div>
                    <h2 class="text-sm sm:text-base font-semibold mb-1 bg-gray-200 text-transparent rounded">{{job.title}}</h2>
                    <div class="flex space-x-2 text-xs text-gray-600">
                        <span class="bg-gray-200 text-transparent rounded">{{job.company}}</span>
                        <span class="bg-gray-200 text-transparent rounded">|</span>
                        <span class="bg-gray-200 text-transparent rounded">{{job.location}}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center md:block">
                <div class="hidden md:block mb-4">
                    <span class="w-auto inline-block rounded bg-gray-200 text-transparent uppercase px-2 py-1 text-tiny font-bold md:m-0 mr-3 mb-3">{{job.tag}}</span>
                    <span class="w-auto inline-block rounded bg-gray-200 text-transparent uppercase px-2 py-1 text-tiny font-bold md:m-0 mr-3 mb-3">Email Marketing</span>
                    <span class="w-auto inline-block rounded bg-gray-200 text-transparent uppercase px-2 py-1 text-tiny font-bold md:m-0 mr-3 mb-3">Email</span>
                </div>
                <div class="flex justify-end">
                    <span class="text-xs text-transparent rounded bg-gray-200">{{job.posted}}</span>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                jobs: [
                    {
                        title: 'Marketing manager fdsf dsf',
                        location: 'Leeds, UK',
                        company: 'Acme Ltd',
                        tag: 'fdfdfdf',
                        posted: '3 days'
                    },
                    {
                        title: 'Email design manager',
                        location: 'New York, NY',
                        company: 'Acme Ltd',
                        tag: 'fdfdfdf dsfs',
                        posted: '13 days'
                    },
                    {
                        title: 'Email developer fsf',
                        location: 'London, UK',
                        company: 'Acme Corp.',
                        tag: 'fdfdfdf fdsf dfd',
                        posted: 'today'
                    },
                    {
                        title: 'Marketing manager fsf sfs fsssss',
                        location: 'Leeds, UK',
                        company: 'Acme Ltd',
                        tag: 'fdfdfdf',
                        posted: '3 days'
                    },
                    {
                        title: 'Email Marketing Specialist',
                        location: 'Manchester, UK',
                        company: 'Email Marketing Agency Ltd',
                        tag: 'fdfdfdf fdf',
                        posted: '11 days'
                    },

                ]
            }
        }
    }
</script>
