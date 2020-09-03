<script>
    import FlashSuccess from '../../Jobs/Flash/Success';
    export default {
        props: ['jobObject'],
        components: {
            'flash-success': FlashSuccess
        },
        data() {
            return {
                job: this.jobObject,
                showSuccessMessage: false,
                message: ''
            }
        },

        computed: {
            putUrl() {
                return '/manage/jobs/status/' + this.job.slug;
            }
        },

        methods: {
            changeStatus() {
                axios.put(this.putUrl, {})
                     .then(response =>{
                        this.showSuccessMessage = true;
                        this.message = "The job's status has been updated";
                        setTimeout(()=> {
                            location.reload();
                        }, 1500);
                     })
                     .catch(errors =>{
                        console.log(errors.data);
                     });
            }
        }
    }
</script>
