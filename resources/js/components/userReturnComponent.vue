
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
                                <td>{{ item['0'].id }}</td>
                                <td>{{ item['0'].name }}</td>
                                <td>{{ item['0'].author }}</td>
                                <td>{{ item['0'].publish_date }}</td>

                                <td @click="goToEvents(item['0'])" class="btn btn-primary  btn-sm mr-2 mb-2" ><span> Return Book</span></td>
                                
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
               var _this =this
                
                axios.post('/laravel/vuejs/public/user-delete-booked',[item]).then(function (response) {
                   _this.getVueItems();
                    console.log(response.data);
                });

            },

            getVueItems: function getVueItems() {
                var _this = this;

                axios.get('/laravel/vuejs/public/rented-book-list').then(function (response) {
                   
                	_this.items =response.data
                   console.log(response.data)
                });
            }

            

        },


    }


</script>
