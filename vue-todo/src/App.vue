  <!-- Template: -->
<template>
  <div id="app">
    <!-- Calling component here: -->
    <ToDoList v-bind:todos="todos"></ToDoList> 
  </div>
</template>

  <!-- Script - write app here: -->
<script>
import ToDoList from './components/ToDoList'
import axios from 'axios';

export default {
  name: 'App',
  components: {
    ToDoList //Defining component here
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
