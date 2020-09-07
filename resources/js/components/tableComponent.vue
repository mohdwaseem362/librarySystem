
<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header mb-4">Books list</div>
                <div class="card-body">

                    <div class="table table-borderless" id="table">

                        <table class="table table-borderless" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Author Name</th>
                                    <th>Publish Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tr v-for="item in items">
                                <td>{{ item.id }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.author }}</td>
                                <td>{{ item.publish_date }}</td>

                                <td @click="goToEvents(item)" class="btn btn-info btn-sm mr-2" ><span
                                        class="glyphicon glyphicon-pencil">Edit</span></td>
                                <td @click="deleteItem(item)" class="btn btn-danger btn-sm"><span
                                        class="glyphicon glyphicon-trash">Delete</span></td>
                            </tr>
                        </table>


                    </div>

                </div>
            </div>

        </div>
    </div>

</template>

<script>

    export default {

        data() {
            return {

                items: []

            }
        },

        mounted: function mounted() {
            this.getVueItems();
        },
        methods: {
            goToEvents: function (item) {
                location.href = 'http://localhost/laravel/vuejs/public/edititems/'+item.id
            },
            getVueItems: function getVueItems() {
                var _this = this;

                axios.get('/laravel/vuejs/public/vueitems').then(function (response) {
                    _this.items = response.data;

                    console.log(response.data);
                });
            },

            deleteItem: function (item) {
            
            var _this = this;
            axios.post('/laravel/vuejs/public/deleteitems/' + item.id).then(function (response) {
                _this.getVueItems();
                // _this.hasDeleted = false
            });
        }

        },


    }


</script>
