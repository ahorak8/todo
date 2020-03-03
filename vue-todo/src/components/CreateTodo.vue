<template>
    <div>
        <button class="button success" v-on:click="openForm" v-show="!isCreating">Create Todo</button>
        <div class="todo-create" v-show="isCreating"> 
            <input type="text" placeholder="Enter title" ref="title" v-model="titleText">
            <textarea placeholder="Enter description" ref="project" v-model="descriptionText"></textarea>

            <button class="button success" v-on:click="sendForm">Create</button>
            <button class="button alert" v-on:click="closeForm">Cancel</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateToDo',
    data: function () {  
        return {
            isCreating: false, // This will be used to hide the create todo section until set to true
            titleText: '',
            descriptionText: ''
        }
    },
    methods: {
        openForm: function () {  
            this.isCreating = true; // This will set isCreating to true
        },
        closeForm: function() {
            this.isCreating = false; // This will set isCreating to false
        },
        sendForm: function () { // Take the data from title and description field and send it
            var title = this.titleText; // Setting variable
            var description = this.descriptionText;

            this.$emit('create-todo', { // emitting the data to our App.vue file
                title,
                description,
                status: 0 // Status of newly created todo item will be 0 (aka uncompleted)
            });

            this.isCreating = false; // This will close the form after a todo has been created
        }
    }
}
</script>

<style scoped>
    .todo-create{
        margin: 20px;
        width: 500px;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .todo-create textarea{
        height: 150px;
    }
</style>