<template>
    <div class="todo">
        <div class="row">
            <div class="column large-1">
                <button class="todo-complete-icon" :class="{completed: todo.status == 1}" @click="toggleTodo(todo)"></button>
            </div>
            <div class="column large-11">
                <h3>{{todo.title}}</h3>
                <p>{{todo.description}}</p>
                <button class="button alert" v-on:click="deleteTodo(todo)">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    name: 'todo',
    props: ['todo'],
    methods: {
        deleteTodo: function(todo) {
            this.$emit('delete-todo', todo); //Creating new custom event, and sending to todo list
        },
        toggleTodo: function (todo) { 
            this.$emit('toggle-todo', todo); // Custom event created, to toggle to do 
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