<template>
    <div class="container">
        <h2>All Users</h2>
        <button class="btn btn-primary" @click="showAddUserForm()">Add user</button>
        <br>
        <br>
        <form v-show="shouldShowAddUserForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="formData.name"  class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="name">Student Number</label>
                <input v-model="formData.student_number"  class="form-control" id="student_number" placeholder="Enter Student Number">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                v-model="formData.email"  class="form-control" id="email" 
                type="email"
                placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input 
                v-model="formData.password"  class="form-control" id="password" 
                type="password" >
            </div>
            <div class="form-group">
                <label for="confirm_password">confirm_password</label>
                <input 
                v-model="formData.confirm_password"  class="form-control" id="confirm_password" 
                type="password" >
            </div>
            <button @click="addUser($event)" class="btn btn-primary">Submit</button>
            <br>
            <br>
        </form>

        <div v-for="user in users" :key="user.id" class="card">
            <div class="card-header">{{ user.name }}</div>
            <div class="card-body">
                <p>{{ user.student_number }}</p>

                <button @click="showEditUserForm(user)" class="btn btn-primary">Edit</button>
                <button @click="deleteUser(user.id, $event)" class="btn btn-danger">Delete</button>
                <br>
                <br>
                <form v-show="shouldShowEditUserForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="formData.student_number"  class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                        v-model="formData.email"  class="form-control" id="email" 
                        type="email"
                        placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input 
                        v-model="formData.password"  class="form-control" id="password" 
                        type="password" >
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">confirm_password</label>
                        <input 
                        v-model="formData.confirm_password"  class="form-control" id="confirm_password" 
                        type="password" >
                    </div>
                    <button @click="editUser(user.id, $event)" class="btn btn-primary">Submit</button>
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
                users: [],
                formData: {
                    student_number: '',
                    email: '',
                    name: '',
                    password: '',
                    confirm_password: ''
                },
                shouldShowAddUserForm: false,
                shouldShowEditUserForm: false
            }
        },
        created() {
            axios.get('/users').then((res) => {
                this.users = res.data
            })
        },
        methods: {
            showAddUserForm() {
                this.shouldShowAddUserForm = true
            },
            showEditUserForm(user) {
                this.formData.name = user.name
                this.formData.email = user.email
                this.formData.student_number = user.student_number

                this.shouldShowEditUserForm = true
            },
            addUser(e) {
                e.preventDefault()
                console.log(this.formData, 'formData')
                axios.post('/add-user', this.formData).then((res) => {
                    this.shouldShowAddUserForm = false
                    this.users.push(res.data)
                })
            },
            editUser(id, e) {
                e.preventDefault()
                let edittedData = {...this.formData, id}
                console.log(edittedData, 'edittedData')
                axios.post('/edit-user', edittedData).then((res) => {
                    this.shouldShowEditUserForm = false
                })
            },
            deleteUser(id, e) {
                e.preventDefault()
                axios.post('/delete-user', {id}).then((res) => {
                    const deletedData = _.remove(this.users, {id})

                    console.log(deletedData)
                })
            }
        }
    }
</script>
