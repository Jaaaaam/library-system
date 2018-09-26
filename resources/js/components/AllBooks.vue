<template>
    <div class="container">
        <h2>All books</h2>
        <button class="btn btn-primary" @click="showAddBookForm()">Add book</button>
        <br>
        <br>
        <form v-show="shouldShowAddBookForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea class="form-control" id="description" placeholder="Enter description" />
            </div>
            <div class="form-group">
                <label for="no_of_pages">Number of Pages</label>
                <input class="form-control" type="number" id="no_of_pages" placeholder="Enter number of pages">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <br>
            <br>
        </form>

        <div v-for="book in books" :key="book.id" class="card">
            <div class="card-header">{{ book.name }}</div>
            <div class="card-body">
                <p>{{ book.description }}</p>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                books: [],
                shouldShowAddBookForm: false,
                shouldShowEditBookForm: false
            }
        },
        created() {
            axios.get('/books').then((res) => {
                this.books = res.data
            })
        },
        methods: {
            showAddBookForm() {
                this.shouldShowAddBookForm = true
            },
            addBook(book) {

            }
        }
    }
</script>
