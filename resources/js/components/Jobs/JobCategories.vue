<template>
    <section class="pt-6 md:pt-10 flex md:space-x-5 overflow-x-auto">
        <a href="/"
            class="pill md:m-0"
            @click="resetSearch()"
            :class="activeClass('/')"
        >
        All</a>
        <a
            v-for="category in categories"
            :key="category.id"
            :class="activeClass('/jobs/' + category.slug)"
            :href="'/jobs/' + category.slug"
            class="pill md:m-0"
            @click="fetchCategoryJobs('/api/jobs/' + category.slug)"
        >{{category.name}}</a>
    </section>
</template>

<script>
    import EventBus from '../../app';

    export default {
        data() {
            return {
                categories: [],
                uri: location.pathname,
            }
        },
        mounted() {
            this.fetchCategories();
        },
        methods: {
            activeClass(segment) {
                return segment == this.uri ? 'bg-indigo-400 text-white' : ''
            },
            fetchCategories() {
                axios.get('/categories')
                    .then(response => {
                        this.categories = response.data;
                    })
            },
            fetchCategoryJobs(uri){
                EventBus.$emit('fetchCategoryJobs', uri);
            },
            resetSearch() {
                EventBus.$emit('resetSearch');
            }
        }
    }
</script>
