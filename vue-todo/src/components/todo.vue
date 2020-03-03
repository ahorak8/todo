<template>
    <div class="todo">
        <h2>{{todo.title}}</h2>
        <div>{{todo.description}}</div>
        
    </div>
</template>

<script>
export default {

    name: 'todo',
    props: ['todo']
}
</script>

<style scoped>

</style>