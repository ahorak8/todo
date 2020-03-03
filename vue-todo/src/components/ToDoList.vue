<template>
    <div>
        <todo v-for="todo in todos" :todo="todo" :key="todo.id"></todo>
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

    }
}
</script>

<style scoped>

</style>