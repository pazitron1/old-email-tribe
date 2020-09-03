
<script>
  export default {
    props: ['category-object'],
    data() {
      return {
        showError: false,
        showSuccessMessage: false,
        category: this.categoryObject,
        categoryName: this.categoryObject.name
      }
    },

    computed: {
      modalName() {
        return this.categoryObject.slug;
      }
    },

    methods: {
      onSubmit() {
        if (this.categoryName == null) {
          this.showError = true;
        } else {
          axios.put("/manage/categories/" + this.categoryObject.slug, {
            'name': this.categoryName
          })
          .then((response) => {
            this.$modal.hide(this.categoryObject.slug);
            this.$emit('editedSuccessfully', {name: this.categoryNamem});
          })
          .catch(error => {
              console.log(error.response.data.errors);
              this.showError = true;
          })
        }

    },

    }
  }
</script>

<style>
  .vm--modal {
    border-radius: 0.5rem!important;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)!important;
  }
  .v--modal-overlay {
      background:rgba(23,45,65, 0.95);
  }
  .fade-enter-active, .fade-leave-active {
    transition: opacity .6s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }
</style>
