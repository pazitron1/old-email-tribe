<template>
    <transition appear
        name="fade">
        <div class="bg-indigo-600 border-t shadow border-indigo-600 fixed bottom-0 inset-x-0 z-100">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                <div class="relative">
                  <div>
                    <div class="flex justify-between items-center py-2 md:py-3 md:space-x-4">
                        <div class="flex items-center space-x-4 mr-0 md:mr-10">
                            <div class="bg-indigo-700 rounded-lg p-2">
                                <svg class="w-5 h-5 text-indigo-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="inline text-base text-white">Current progress</span>
                        </div>
                        <ul class="list-none flex items-center space-x-6 text-white text-sm">
                            <li class="font-normal flex items-center space-x-2">
                                <span>1. Create your ad</span>
                                <svg v-if="step === 1" class="w-3 h-3 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                <svg v-else class="w-4 h-4 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 13l4 4L19 7"></path></svg>
                            </li>
                            <li v-if="step === 1" class="text-indigo-400 flex items-center space-x-2">
                                <span>2. Review your ad</span>
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </li>
                            <li v-else class="font-normal flex items-center space-x-2">
                                <span>2. Review your ad</span>
                                <svg v-if="step === 2" class="w-4 h-4 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg v-else class="w-4 h-4 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 13l4 4L19 7"></path></svg>
                            </li>
                            <li v-if="step === 1 || step === 2" class="text-indigo-400 font-normal flex items-center space-x-2">
                                <span>3. Confirm & pay</span>
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </li>
                            <li v-else class="font-normal flex items-center space-x-2">
                                <span>3. Confirm & pay</span>
                                <svg class="w-4 h-4 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </li>
                        </ul>
                        <div class="flex items-center justify-end">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button
                                    v-if="step === 1"
                                    :disabled="invalid"
                                    @click="goToReview"
                                    class="ml-0 md:ml-16 whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-600 bg-white hover:text-indigo-400 transition ease-in-out duration-150">
                                    Go to review
                                </button>
                                <button
                                    v-if="step === 2"
                                    @click="goToCreateAd"
                                    class="whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-100 bg-transparent hover:text-white transition ease-in-out duration-150">
                                    Go back
                                </button>
                                <button
                                    v-if="step == 2"
                                    :disabled="invalid"
                                    @click="goToCheckout"
                                    class="whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-600 bg-white hover:text-indigo-400 transition ease-in-out duration-150">
                                    Go to checkout
                                </button>

                                <button
                                    v-if="step === 3"
                                    @click="goToReview"
                                    class="whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-100 bg-transparent hover:text-white transition ease-in-out duration-150">
                                    Go back
                                </button>
                                <button
                                    v-if="step == 3"
                                    :disabled="invalid || locked"
                                    @click="confirmAndPay"
                                    class="whitespace-no-wrap inline-flex items-center justify-center px-3 py-1 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-600 bg-white hover:text-indigo-400 transition ease-in-out duration-150">
                                    Confirm & pay
                                </button>
                            </span>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import EventBus from '../../../app';

    export default {
        props: ['valid', 'invalid', 'step', 'locked'],
        data() {
            return {

            }
        },
        computed: {
          displayButton() {
            if(this.valid === true) {
               return true;
             } else if (this.valid === false) {
                return false;
             }
             return false;
          },

          currentStep() {
            if (this.step === 1) {
                return true
            } else if (this.step === 2) {
                return true;
            } else if (this.step === 3) {
                return true;
            }
            return false;
          }
        },
        methods: {
            goToReview() {
                EventBus.$emit('goToReview');
            },
            goToCreateAd() {
                EventBus.$emit('goToCreateAd');
            },
            confirmAndPay() {
                EventBus.$emit('confirmAndPay');
            },
            goToCheckout() {
                EventBus.$emit('goToCheckout');
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active {
  transition: opacity .5s ease-in-out;
}

.fade-enter-to {
  opacity: 1;
}

.fade-enter {
  opacity: 0;
}
</style>



