<template>
    <div>
        <transition name="fade">
            <div class="bg-indigo-100 rounded-t-lg border-t border-b-0 border-gray-200 py-4 md:py-10 px-8 md:px-16">
                <div v-if="showAmountInput">
                    <h1 class="text-gray-900 text-xl md:text-2xl tracking-wide leading-8 font-bold mb-4 md:bm-6">How much would you like to pay?</h1>
                    <p class="text-gray-700 text-lg md:text-xl tracking-wide font-bold my-2 mb-8">For a limited time we're using a pay-what-you-want model</p>
                    <ValidationObserver class="w-full" v-slot="{ invalid, valid }">
                        <label class="block mb-1 text-sm leading-5 font-semibold text-gray-700" for="title">Payment amount<span class="text-gray-500 font-normal"> (required)</span>
                        </label>
                        <validation-provider
                                rules="required|numeric"
                                v-slot="{ errors, classes }"
                                name="job title">
                            <input
                                class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal"
                                type="text"
                                :class="classes"
                                placeholder="e.g. 95 or 115"
                                v-model="amount"
                            >
                            <span v-if="!errors[0]" class="text-xs mt-1 text-gray-700">Your credit card will be charged in pound sterling (GBP), the amount you indicate above.</span>
                            <span v-if="errors[0]" class="text-xs text-red-500 absolute" style="marging-top: 0.2rem;">{{errors[0]}}</span>
                        </validation-provider>
                        <transition name="fade">
                            <div class="block">
                                <button
                                    v-if="displayConfirmButton"
                                    @click.prevent="submitAmount"
                                    class="whitespace-no-wrap inline-flex items-center justify-center mt-8 px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                                    Confirm amount
                                </button>
                            </div>
                        </transition>
                        <progress-status :invalid="invalid" :valid="valid" :step="3"></progress-status>
                    </ValidationObserver>
                </div>
                <div v-if="showCheckoutInfo" >
                    <h1 class="text-gray-900 text-xl md:text-3xl tracking-wide leading-8 font-bold mb-8 md:bm-10">
                        Checkout
                    </h1>
                    <p class="text-xs text-gray-700">
                        Payment to [Name of the site]
                    </p>
                    <p class="text-gray-900 text-lg md:text-2xl tracking-wide font-bold my-2">
                        £{{formatPrice(amount)}} <sup>
                            <button
                                class="text-xs text-indigo-600 font-light underline"
                                @click.prevent="editAmount"
                            >edit</button>
                        </sup>
                    </p>
                    <p class="text-sm text-gray-700 tracking-normal">
                        Create 1 month job listing for {{form.jobTitle}}
                    </p>

                    <div class="w-24 border-2 border-indigo-200 my-6 md:my-8 rounded-lg"></div>

                    <span class="text-xs text-gray-700 tracking-normal">Once the payment is completed, your job listing will be reviewed and published within the next 24 hours</span>
                    <progress-status :step="3"></progress-status>
                </div>
            </div>
        </transition>
            <div v-show="showCheckoutInfo" class="bg-white rounded-b-lg border-b border-t-0 border-gray-200 py-4 md:py-10 px-8 md:px-16">
                <p class="text-gray-900 text-sm md:text-base tracking-wide font-bold mb-4 md:mb-6">
                    Pay with debit or credit card
                </p>
                <form @submit.prevent="processPayment" id="payment-form">
                    <div class="flex flex-wrap">
                        <div class="w-full">
                          <div id="card-element" class="transition-colors duration-100 ease-in-out focus:outline-0 border border-gray-200 focus:bg-white focus:border-gray-300 placeholder-gray-500 rounded-lg bg-white shadow md:rounded-lg py-3 pr-4 pl-4 block w-full appearance-none leading-normal" />
                          <span class="text-red-500 text-xs absolute mt-2" v-text="errorMessage"></span>
                        </div>
                    </div>

                    <button
                        id="submit"
                        :disabled="isLoading"
                        class="whitespace-no-wrap inline-flex items-center justify-center mt-8 px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                        Confirm & pay
                    </button>
                </form>
            </div>

        <div>
            <div class="text-center mt-8 mx-3">
                <small class="text-gray-500">Don't worry; your card information will never directly touch our servers. <br>It is processed by Stripe, a highly secure on-line payment system.</a></small>
            </div>
            <div class="text-center mt-2 mx-3">
                <small class="text-gray-500">Need help? Do not hesitate to <a class="text-gray-500 hover:text-indigo-600 underline" href="mailto:hello@domain.com">contact us</a></small>
            </div>

            <div class="w-full mt-10">
                <img class="mx-auto opacity-50" src="https://timelytarot.com/svg/powered_by_stripe.svg" alt="Stripe badge">
            </div>
        </div>
        <flash-fail v-if="showError" :message="this.errorMessage"></flash-fail>
        <flash-success v-if="showSuccessMessage" :message="this.successMessage" header="Order completed!"></flash-success>
    </div>
</template>

<script>
    let stripe = Stripe(process.env.MIX_STRIPE_KEY);
    console.log(process.env.MIX_STRIPE_KEY);
    let elements = stripe.elements({
        fonts: [
          {
            family: 'Montserrat',
            cssSrc: 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;1,400&display=swap',
            style: 'Normal',
          }
        ]
    });

    import FlashFail from '../Flash/Fail';
    import FlashSuccess from '../Flash/Success';
    import EventBus from '../../../app';
    let cardElement = undefined;

    export default {
        props: ['intentId', 'intentSecret'],
        components: {
            'flash-fail': FlashFail,
            'flash-success': FlashSuccess
        },
        data() {
            return {
                paymentIntent: this.intentSecret,
                isLoading: false,
                errorMessage: '',
                successMessage: '',
                showError: false,
                showSuccessMessage:false,
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
                 amount: '',
                 url: '/jobs',
                 locked: false,
                 showAmountInput: true,
                 showCheckoutInfo: false
            }
        },
        computed: {
            displayConfirmButton() {
                if (this.amount != '' && !isNaN(this.amount)) {
                    return true;
                }
            },
            amountInPence() {
                if (this.amount) {
                    return this.amount * 100;
                }
            },
        },
        mounted()  {
            cardElement = elements.create("card", {
                hidePostalCode: false,
                style: {
                  base: {
                    iconColor: '#5a67d8',
                    '::placeholder': {
                      color: 'rgba(96, 111, 123, 0.55)',
                    },
                    color: '#606f7b',
                    fontWeight: 200,
                    fontFamily: '"Montserrat", sans-serif',
                    fontSize: '16px',
                    fontStyle: "light",
                  }
                }
            });
            cardElement.mount("#card-element");
    },

    created() {
        EventBus.$on('formChanged', (data) => {
            this.form = data;
        });
        EventBus.$on('confirmAndPay', (data) => {
            this.processPayment();
        });
    },

    methods: {
        formatPrice(amount, decimalCount = 2, decimal = ".", thousands = ",") {
          try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
          } catch (e) {
            console.log(e)
          }
        },
        submitAmount() {
            this.showAmountInput = false;
            this.showCheckoutInfo = true;
            axios.post('/intent/update', {
                amount: this.amountInPence,
                intent: this.intentId
            })
            .then(({data}) => {
                   console.log('intent updated!');
                })
                .catch(err => {
                   console.log(result.error.message);
            });
        },
        editAmount() {
            this.showCheckoutInfo = false;
            this.showAmountInput = true;
            return;
        },
        processPayment() {
            this.isLoading = true;
            stripe.handleCardPayment(
                this.intentSecret,
                cardElement, {
                  payment_method_data: {
                    billing_details: {
                      name: this.cardHolderName,
                      email: this.email
                    }
                  }
                })
              .then(result => {
                if (result.error) {
                  // Display error.message in your UI.
                  console.log(`Card payment failed: ${result.error.message}`);
                  this.showError = true;
                  this.errorMessage = result.error.message;
                  this.isLoading = false;

                } else {
                    this.isLoading = true;
                    axios
                        .post(this.url, {
                            title: this.form.jobTitle,
                            location: this.form.location,
                            link_to_apply: this.form.linkToApply,
                            description: this.form.jobDescription,
                            category_id: this.form.category,
                            amount: this.amount,
                            email: this.form.email,
                            about_company: this.form.aboutCompany,
                            company: this.form.companyName,
                            salary: this.form.salary,
                            type: this.form.employmentType
                        })
                        .then(({data}) => {
                            this.showSuccessMessage = true;
                            this.successMessage = "We've received your job listing and will review it shortly"
                          setTimeout(() => {
                              window.location = '/thank-you';
                            }, 1500)
                          return;
                        })
                        .catch(error => {
                          this.showError = true;
                          this.errorMessage = result.error.message;
                          this.isLoading = false;
                });
            }
        });
      }
    }

}
</script>

<style scoped>
    .v--modal-overlay {
        background:rgba(240, 244, 248, 0.75);
    }
    .fade-enter-active, .fade-leave-active {
      transition: opacity .6s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }
</style>
