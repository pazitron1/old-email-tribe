<template>
    <div class="relative bg-white">
      <div>
        <div class="flex justify-between items-center py-2 md:py-6 md:justify-start md:space-x-10">
          <div class="lg:w-0 lg:flex-1">
            <a href="#" class="flex">
              <img class="h-8 w-auto sm:h-10" src="/img/logos/workflow-mark-on-white.svg" alt="Workflow" />
            </a>
          </div>
          <div class="-mr-2 -my-2 md:hidden">
            <button
              type="button"
              @click="isOn =! isOn"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-600 transition duration-150 ease-in-out">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
            </button>
          </div>
          <nav class="hidden md:flex space-x-10">
            <div class="relative">
              <button type="button" class="text-gray-600 group inline-flex items-center space-x-2 text-base leading-6 font-medium hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
                <span>Email jobs</span>
              </button>
            </div>

            <a href="#" class="text-base leading-6 font-medium text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
              Companies
            </a>
            <div class="relative">
              <button
                    @click="dropDown =! dropDown"
                    type="button"
                    :class="dropDown ? 'text-gray-900' : 'text-gray-600' "
                    class="text-gray-600 inline-flex items-center space-x-2 text-base leading-6 font-medium hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
                <span>More</span>
                <svg
                    class="text-gray-400 h-5 w-5 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150"
                    :class="dropDown ? 'text-gray-600' : 'text-gray-400' "
                    fill="currentColor"
                    viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
              </button>
               <transition
                  enter-active-class="transition ease-out duration-200"
                  enter-class="opacity-0 translate-y-1"
                  enter-to-class="opacity-100 translate-y-0"
                  leave-active-class="transition ease-in duration-150"
                  leave-class="opacity-100 translate-y-0"
                  leave-to-class="opacity-0 translate-y-1"
                >
                  <div
                    v-show="dropDown"
                    class="absolute left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0">
                    <div class="rounded-lg shadow-lg">
                      <div class="rounded-lg shadow-xs overflow-hidden">
                        <div class="z-20 relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                          <a href="#" class="-m-3 p-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                              <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <div class="space-y-1">
                              <p class="text-base leading-6 font-medium text-gray-900">
                                Help Center
                              </p>
                              <p class="text-sm leading-5 text-gray-600">
                                Get all of your questions answered in our forums or contact support.
                              </p>
                            </div>
                          </a>
                          <a href="#" class="-m-3 p-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                              <path d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <div class="space-y-1">
                              <p class="text-base leading-6 font-medium text-gray-900">
                                Guides
                              </p>
                              <p class="text-sm leading-5 text-gray-600">
                                Learn how to maximize our platform to get the most out of it.
                              </p>
                            </div>
                          </a>
                          <a href="#" class="-m-3 p-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <div class="space-y-1">
                              <p class="text-base leading-6 font-medium text-gray-900">
                                Events
                              </p>
                              <p class="text-sm leading-5 text-gray-600">
                                See what meet-ups and other events we might be planning near you.
                              </p>
                            </div>
                          </a>
                          <a href="#" class="-m-3 p-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                              <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <div class="space-y-1">
                              <p class="text-base leading-6 font-medium text-gray-900">
                                Security
                              </p>
                              <p class="text-sm leading-5 text-gray-600">
                                Understand how we take your privacy seriously.
                              </p>
                            </div>
                          </a>
                        </div>
                        <div class="px-5 py-5 bg-gray-100 space-y-5 sm:px-8 sm:py-8">
                          <div class="space-y-4">
                            <h3 class="text-sm leading-5 tracking-wide font-medium text-gray-600 uppercase">
                              Recent Posts
                            </h3>
                            <ul class="space-y-4">
                              <li class="text-base leading-6 truncate">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                                  Boost your conversion rate
                                </a>
                              </li>
                              <li class="text-base leading-6 truncate">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                                  How to use search engine optimization to drive traffic to your site
                                </a>
                              </li>
                              <li class="text-base leading-6 truncate">
                                <a href="#" class="font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                                  Improve your customer experience
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="text-sm leading-5">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                              View all posts &rarr;
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </transition>
            </div>
            <a href="#" class="text-base leading-6 font-medium text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition ease-in-out duration-150">
              About
            </a>
          </nav>
          <div class="hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
            <span class="inline-flex rounded-md shadow-sm">
              <a href="/jobs/create" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                Post a job
              </a>
            </span>
          </div>
        </div>
      </div>

        <transition
          enter-active-class="duration-200 ease-out"
          enter-class="opacity-0 scale-95"
          enter-to-class="opacity-100 scale-100"
          leave-active-class="duration-100 ease-in"
          leave-class="opacity-100 scale-100"
          leave-to-class="opacity-0 scale-95"
        >
          <div v-show="isOn" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-lg">
              <div class="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5 space-y-6">
                  <div class="flex items-center justify-between">
                    <div>
                      <img class="h-8 w-auto" src="/img/logos/workflow-mark-on-white.svg" alt="Workflow" />
                    </div>
                    <div class="-mr-2">
                      <button
                        type="button"
                        @click="isOn =! isOn"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-600 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div>
                    <nav class="grid row-gap-8">
                      <a href="#" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <div class="text-base leading-6 font-medium text-gray-900">
                          Analytics
                        </div>
                      </a>
                      <a href="#" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                        <div class="text-base leading-6 font-medium text-gray-900">
                          Engagement
                        </div>
                      </a>
                      <a href="#" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                          <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <div class="text-base leading-6 font-medium text-gray-900">
                          Security
                        </div>
                      </a>
                      <a href="#" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"/>
                        </svg>
                        <div class="text-base leading-6 font-medium text-gray-900">
                          Integrations
                        </div>
                      </a>
                      <a href="#" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                          <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        <div class="text-base leading-6 font-medium text-gray-900">
                          Automations
                        </div>
                      </a>
                    </nav>
                  </div>
                </div>
                <div class="py-6 px-5 space-y-6">
                  <div class="grid grid-cols-2 row-gap-4 col-gap-8">
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Pricing
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Docs
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Enterprise
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Blog
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Help Center
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Guides
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Security
                    </a>
                    <a href="#" class="text-base leading-6 font-medium text-gray-900 hover:text-gray-700 transition ease-in-out duration-150">
                      Events
                    </a>
                  </div>
                  <div class="space-y-6">
                    <span class="w-full flex rounded-md shadow-sm">
                      <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                        Sign up
                      </a>
                    </span>
                    <p class="text-center text-base leading-6 font-medium text-gray-600">
                      Existing customer?
                      <a href="#" class="text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                        Sign in
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                dropDown: false,
                isOn: false
            }
        },
        created() {
            let self = this;
            window.addEventListener('click', function(e){
                // close dropdown when clicked outside
                if (!self.$el.contains(e.target)){
                  self.dropDown = false
                }
            })
        }
    }
</script>
