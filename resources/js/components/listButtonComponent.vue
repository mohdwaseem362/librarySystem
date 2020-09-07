<template>
    <div class="mb-5">
        <button @click="goToEvents()" class="btn btn-primary">Book list</button>

    </div>

</template>

<script>
    export default {
        methods: {
            goToEvents: function () {
                location.href = 'http://localhost/laravel/vuejs/public/show-table'
            }
        },
    }

</script>