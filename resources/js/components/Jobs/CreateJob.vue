<template>
    <section class="relative py-16 md:py-32 pb-4 z-0">
         <div class="flex inline-flex text-gray-400 text-xs md:text-sm items-center my-2">
            <a class="text-gray-500 hover:text-gray-600" href="/">Back to all jobs</a>
        </div>
        <step-one-form v-show="step === 1"></step-one-form>
        <step-two-preview v-show="step == 2"></step-two-preview>
        <step-three-payment :intentId="this.intentId" :intentSecret="this.intentSecret" v-show="step == 3"></step-three-payment>
        <div class="invisible" id="dialog"></div>
    </section>
</template>

<script>
    import EventBus from '../../app';
    import StepOneForm from './Wizard/CreateJobStepOne';
    import StepTwoPreview from './Wizard/CreateJobStepTwo';
    import StepThreePayment from './Wizard/CreateJobStepThree';

    export default {
        props: ['intentId', 'intentSecret'],
        components: {
            'step-one-form': StepOneForm,
            'step-two-preview': StepTwoPreview,
            'step-three-payment': StepThreePayment
        },
        data() {
            return {
                step: 1,
                data: []
            }
        },
        created() {
            EventBus.$on('formChanged', (data) => {
                this.data = data;
            });

            EventBus.$on('goToReview', (data) => {
                this.step = 2;
            });

            EventBus.$on('goToCreateAd', (data) => {
                this.step = 1;
            });

            EventBus.$on('goToCheckout', (data) => {
                this.step = 3;
            });

            //Prevent accidental browser closure
            window.onbeforeunload = function (e) {
                var message = "Anything you added to the form will be lost. Leave the page?";
                var firefox = /Firefox[\/\s](\d+)/.test(navigator.userAgent);
                if (firefox) {
                    //Add custom dialog
                    //Firefox does not accept window.showModalDialog(), window.alert(), window.confirm(), and window.prompt() furthermore
                    var dialog = document.createElement("div");
                    document.body.appendChild(dialog);
                    dialog.id = "dialog";
                    dialog.style.visibility = "hidden";
                    dialog.innerHTML = message;
                    var left = document.body.clientWidth / 2 - dialog.clientWidth / 2;
                    dialog.style.left = left + "px";
                    dialog.style.visibility = "visible";
                    var shadow = document.createElement("div");
                    document.body.appendChild(shadow);
                    shadow.id = "shadow";
                    //tip with setTimeout
                    setTimeout(function () {
                        document.body.removeChild(document.getElementById("dialog"));
                        document.body.removeChild(document.getElementById("shadow"));
                    }, 0);
                }
                return message;
            };
        },

        methods: {
            onSubmit(data){
                alert("check console");
                console.log(this.data);
            }
        }
    }
</script>
