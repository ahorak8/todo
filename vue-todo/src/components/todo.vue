<template>
    <div class="todo">
        <div class="row">
            <div class="column large-1">
                <button class="todo-complete-icon" :class="{completed: todo.status == 1}" @click="toggleTodo(todo)"></button>
            </div>
            <div class="column large-11" v-show="!editing">
                <h3>{{todo.title}}</h3>
                <p>{{todo.description}}</p>
                <button class="button pimary" v-on:click="showForm(todo)">Edit</button>
                <button class="button alert" v-on:click="deleteTodo(todo)">Delete</button>
            </div>
            <!-- Div for editing todo: -->
            <div class="columns large-11" v-show="editing"> 
                <input type="text" placeholder="Enter title" ref="title" v-model="todo.title">
                <textarea placeholder="Enter description" ref="project" v-model="todo.description"></textarea>

                <button class="button success" v-on:click="updateForm(todo.id, todo.title, todo.description, todo.status)">Update</button>
                <button class="button alert" v-on:click="closeForm">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {

    name: 'todo',
    props: ['todo'],
    data: function () { 
        return {
            editing: false // When this is false, don't show the form
        }
     },
    methods: {
        deleteTodo: function(todo) {
            this.$emit('delete-todo', todo); //Creating new custom event, and sending to todo list
        },
        toggleTodo: function (todo) { 
            this.$emit('toggle-todo', todo); // Custom event created, to toggle to do 
        },
        updateForm: function (id, title, description, status) { 
            // Because we bound the areas to the model of todo, they will update on vue side automatically
            // So we just need to use this method to send the data to October
            var data = {
                id: id,
                title: title,
                description: description,
                status: status
            }

            axios.post('http://todo/api/update-todo', data); // Sending data to updat-todo route

            this.editing = false;
        },
        showForm: function () { 
            this.editing = true; // So that the form will show
        },
        closeForm: function() {
            this.editing = false;
        }
    }
}
</script>

<style scoped>
    .todo{
        padding: 20px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
    }

    .todo-complete-icon{
        width: 30px;
        height: 30px;
        border: 2px solid #ccc;
        border-radius: 50%;
        margin-right: 40px;
        /* margin-left: 40px; */
        position: relative;
        cursor: pointer;
    }

    .todo-complete-icon.completed{
        border-color: #00c996;
    }

    .todo-complete-icon.completed::before{
        content: "\2714";
        font-size: 36px;
        position: absolute;
        top: -10px;
        left: 4px;
        color: #00c996;
    }
</style>