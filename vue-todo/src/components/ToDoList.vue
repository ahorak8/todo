<template>
    <div>
        <div class="row">
            <div class="columns large-6">
                <h2>ToDo ({{ uncompletedTodos.length}})</h2>
                <todo v-for="todo in uncompletedTodos" :todo="todo" :key="todo.id" @delete-todo="deleteTodo(todo)"></todo>
            </div>
                <div class="columns large-6">
                    <h2>Completed ({{completedTodos.length}})</h2>
                <todo v-for="todo in completedTodos" :todo="todo" :key="todo.id" @delete-todo="deleteTodo(todo)"></todo>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'; // Vue auomatically knows to look in node_modules
import todo from './todo';

export default {
    name: 'ToDoList', //Name component
    props: ['todos'],
    components: { // Define component
    
        todo

    },
    computed: { // computed properties
        completedTodos: function () { 
            return this.todos.filter(function(todo){ // Wanted to filter all the todos that 
                return todo.status == 1;            // have a status of 1 (completed)
            })
         },
        uncompletedTodos: function () { 
            return this.todos.filter(function(todo){ // Wanted to filter all the todos that 
                return todo.status == 0;            // have a status of 0 (uncompleted)
            })
         }
    },

    methods: {
        deleteTodo: function(todo){
            console.log(todo); // Check what todo 
            console.log("id:", todo.id); // Check id of todo 
            var todoIndex = this.todos.indexOf(todo);

            console.log("index:", todoIndex); // Check index of todo 

            // We can splice the array to remove that todo from the array:
            this.todos.splice(todoIndex, 1);

            // Send the id of that item to October and tell it to delete from DB:
            axios.post('http://todo/api/delete-todo', todo); // sending to route
        }
    }
}
</script>

<style scoped>

</style>