  <!-- Template: -->
<template>
  <div id="app">
    <!-- Calling components here: -->
    <CreateTodo v-on:create-todo="addTodo"></CreateTodo>
    <ToDoList v-bind:todos="todos"></ToDoList> 
  </div>
</template>

  <!-- Script - write app here: -->
<script>
import ToDoList from './components/ToDoList'
import CreateTodo from './components/CreateTodo'
import axios from 'axios';

export default {
  name: 'App',
  components: {
    ToDoList, //Defining component here
    CreateTodo
  },
   // Define the data of the component:
    data: function(){
        return {
            todos: [ //Need to bind these to the ToDoList component above
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
    },

    methods: {
      addTodo: function(todo){ // getting a todo from the form
        console.log(todo);
        this.todos.push(todo);

        axios.post('http://todo/api/add-todo', todo).then(function(response){ // This will save the todo to the database 
          console.log(response);  // Will console log the response
        }).catch(function (error) { 
          console.log(error); // Will console log the error, if there is one
         }); 
      }
    }
}
</script>

<style>

/*  Styling: */
/* #app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
} */
</style>
