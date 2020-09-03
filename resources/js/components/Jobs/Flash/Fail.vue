<template>
    <transition name="fade">
        <div class="alert-flash-fail bg-white shadow-lg border border-gray-300 px-4 py-4 rounded-lg relative flex items-start justify-between" role="alert" v-show="show">
            <div class="flex items-center">
                <svg fill="none" class="text-red-600 w-6 h-6 mr-2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div class="flex flex-col">
                <span class="block text-gray-700 font-semibold sm:inline text-base">{{ title }}</span>
                <span class="block text-gray-500 sm:inline text-sm">{{ body }}</span>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: ['message', 'header'],

        data() {
            return {
                title: this.header,
                body: this.message,
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on('flash', message => {
                this.flash('message');
            });
        },

        methods: {
            flash(message) {
                this.body = message;
                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 5000);
            }
        }
    }
</script>

<style scoped>
    .alert-flash-fail {
        position: fixed;
        top: 100px;
        right: 20px;
    }
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
