<template>
    <div>
        <h3 class="text-center text-white">Add Book <i class="fa fa-book"></i></h3>

        <div class="row form-group">
            <div class="col-md-12">
                <router-link to="/" class="btn btn-purple btn-sm" title="Home"><i class="fa fa-home"></i> Back to Home</router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="addBook">
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
                            <button type="submit" class="btn btn-purple"> <i class="fa fa-plus"></i> Save Book</button>
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
                book: {
                    name: "",
                    author: ""
                },
                loading: true
            }
        },
        methods: {
            addBook() {

                this.validateFields()

                this.axios
                    .post('http://localhost:8000/api/book/add', this.book)
                    .then(response => (
                        this.$router.push({name: 'home'})
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            },
            validateFields() {
                var vm = this;

                if (this.book.name === "" || this.book.name == "undefined") {
                    alert("Name is empty")
                    return
                }

                if (this.book.author === "" || this.book.author == "undefined") {
                    alert("Author is empty")
                    return
                }
            }
        }
    }
</script>
