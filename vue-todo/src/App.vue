  <!-- Template: -->
<template>
  <div id="app">
    <!-- Calling component here: -->
    <ToDoList></ToDoList> 
  </div>
</template>

  <!-- Script - write app here: -->
<script>
import ToDoList from './components/ToDoList'

export default {
  name: 'App',
  components: {
    ToDoList //Defining component here
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
