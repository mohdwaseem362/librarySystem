<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    
                    <div class="card-body">
                       <span class="float-right" style="cursor:pointer">
                           x
                       </span>

                       <h4 class="card-title">add employee</h4>

                       <div class="books-from">

                        <input type="text" class="from-control mb-2"  placeholder="name">

                        <input type="text" class="from-control mb-2" placeholder="price">

                        <input type="text" class="from-control mb-2" placeholder="name">
                           
                       </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
