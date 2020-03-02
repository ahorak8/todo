<template>
    <div>
        <h1>My new component</h1>
        <ul> 
            <li v-for="todo in todos">
                <h3>{{todo.title }}</h3>
                {{ todo.description }}
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios'; // Vue auomatically knows to look in node_modules

export default {
    name: 'ToDoList', //Name component
    // Define the data of the component:
    data: function(){
        return {
            todos: [
                // Array of todos
            ]
        }
    },
    mounted: function () {
        // Define a variable called _self, and assign it 'this'
        var _self = this;

        axios.get('http://todo/api/todos').then(function (response){ // URL from where we are getting the data
        _self.todos = response.data;
        }) 
    }
}
</script>

<style scoped>

</style>