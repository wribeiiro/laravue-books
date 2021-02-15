<template>
    <div>
        <h3 class="text-center text-white">Edit Book <i class="fa fa-book"></i></h3>
        
        <div class="row form-group">
            <div class="col-md-12">
                <router-link to="/" class="btn btn-purple btn-sm" title="Home"><i class="fa fa-home"></i> Back to Home</router-link>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="updateBook">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" for="">Name</label>
                                <input type="text" class="form-control" v-model="book.name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" for="">Author</label>
                                <input type="text" class="form-control" v-model="book.author">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-purple"> <i class="fa fa-edit"></i> Update Book </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                book: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/book/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.book = response.data;
                });
        },
        methods: {
            updateBook() {
                this.axios
                    .post(`http://localhost:8000/api/book/update/${this.$route.params.id}`, this.book)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
