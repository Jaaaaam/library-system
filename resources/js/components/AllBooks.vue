<template>
    <ul>
        <li v-for="book in books" :key="book.id">
            {{ book.name }}
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                books: []
            }
        },
        created() {
            axios.get('/books').then((res) => {
                this.books = res.data
            })
        }
    }
</script>
