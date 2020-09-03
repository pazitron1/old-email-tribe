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
            deleteUrl() {
                return '/manage/jobs/' + this.job.slug;
            }
        },

        methods: {
            deleteJob() {
                if(confirm("Do you want to delete this job?")){
                    axios.delete(this.deleteUrl)
                        .then(response => {
                            this.message = 'The job has been deleted';
                            this.showSuccessMessage = true;
                            setTimeout(()=> {
                                location.reload();
                            }, 1500);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            }
        }
    }
</script>
