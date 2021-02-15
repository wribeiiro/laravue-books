<template>
    <div>
        <h3 class="text-center text-white">All Books</h3><br/>

        <div class="row form-group">
            <div class="col-md-12">
                <router-link to="/add" class="btn btn-purple btn-sm" title="Add"><i class="fa fa-plus"></i> Add Book</router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-sm table-dark">
                    <thead class="">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="book in books" :key="book.id">
                            <td>{{ book.id }}</td>
                            <td>{{ book.name }}</td>
                            <td>{{ book.author }}</td>
                            <td>{{ book.created_at }}</td>
                            <td>{{ book.updated_at }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <router-link :to="{name: 'edit', params: { id: book.id }}" class="btn btn-purple btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</router-link>
                                    &nbsp;
                                    &nbsp;
                                    <button class="btn btn-danger btn-sm" @click="deleteBook(book.id)" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/books')
                .then(response => {
                    this.books = response.data;
                });
        },
        methods: {
            deleteBook(id) {
                this.axios
                    .delete(`http://localhost:8000/api/book/delete/${id}`)
                    .then(response => {
                        this.books.splice(
                            this.books.map(item => item.id).indexOf(id), 
                            1
                        )
                    });
            }
        }
    }
</script>
