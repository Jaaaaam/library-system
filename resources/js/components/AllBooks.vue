<template>
    <div class="container">
        <h2>All books</h2>
        <button class="btn btn-primary" @click="showAddBookForm()">Add book</button>
        <br>
        <br>
        <form v-show="shouldShowAddBookForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="formData.name"  class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea v-model="formData.description"  class="form-control" id="description" placeholder="Enter description" />
            </div>
            <div class="form-group">
                <label for="no_of_pages">Number of Pages</label>
                <input v-model="formData.no_of_pages"  class="form-control" type="number" id="no_of_pages" placeholder="Enter number of pages">
            </div>
            <button @click="addBook($event)" class="btn btn-primary">Submit</button>
            <br>
            <br>
        </form>

        <div v-for="book in books" :key="book.id" class="card">
            <div class="card-header">{{ book.name }}</div>
            <div class="card-body">
                <p>{{ book.description }}</p>
                <div v-if="!book.borrowed_at">
                    <p>STATUS: Available</p>
                    <p v-show="book.returned_at">Returned last: {{ book.returned_at }}</p>
                </div>
                <div v-else>
                    <p>STATUS: Borrowed</p>
                    <p>Borrowed on: {{ book.borrowed_at }}</p>
                </div>
                <button @click="borrowBook(book.id)" class="btn btn-primary">Borrow</button>
                <button @click="returnBook(book.id)" class="btn btn-primary">Return</button>
                <button @click="showEditBookForm(book)" class="btn btn-primary">Edit</button>
                <button @click="deleteBook(book.id, $event)" class="btn btn-danger">Delete</button>
                <br>
                <br>
                <form v-show="shouldShowEditBookForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="formData.name"  class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea v-model="formData.description"  class="form-control" id="description" placeholder="Enter description" />
                    </div>
                    <div class="form-group">
                        <label for="no_of_pages">Number of Pages</label>
                        <input v-model="formData.no_of_pages"  class="form-control" type="number" id="no_of_pages" placeholder="Enter number of pages">
                    </div>
                    <button @click="editBook(book.id, $event)" class="btn btn-primary">Submit</button>
                    <br>
                    <br>
                </form>
            </div>

        </div>
        
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                books: [],
                formData: {
                    name: '',
                    description: '',
                    no_of_pages: ''
                },
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
            showEditBookForm(book) {
                this.formData.name = book.name
                this.formData.description = book.description
                this.formData.no_of_pages = book.no_of_pages

                this.shouldShowEditBookForm = true
            },
            borrowBook(id) {
                axios.post('/borrow-book', {id}).then((res) => {

                })
            },
            returnBook(id) {
                axios.post('/return-book', {id}).then((res) => {

                })
            },
            addBook(e) {
                e.preventDefault()
                console.log(this.formData, 'formData')
                axios.post('/add-book', this.formData).then((res) => {
                    this.shouldShowAddBookForm = false
                    this.books.push(res.data)
                })
            },
            editBook(id, e) {
                e.preventDefault()
                let edittedData = {...this.formData, id}
                console.log(edittedData, 'edittedData')
                axios.post('/edit-book', edittedData).then((res) => {
                    this.shouldShowEditBookForm = false
                })
            },
            deleteBook(id, e) {
                e.preventDefault()
                axios.post('/delete-book', {id}).then((res) => {
                    const deletedData = _.remove(this.books, {id})

                    console.log(deletedData)
                })
            }
        }
    }
</script>
