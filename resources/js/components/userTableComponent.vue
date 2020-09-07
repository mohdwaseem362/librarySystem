
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

                                <td  v-if="item.booked_status == 0" @click="goToEvents(item)" class="btn btn-info btn-sm mr-2 mb-1" >
                                    <button  type="button" class="btn btn-primary">Add this</button>
                                </td>
                                <td  v-if="item.booked_status == 1" class="btn btn-info btn-sm mr-2 mb-1" >
                                    <button  type="button" class="btn btn-success">Booked</button>
                                </td>
                                
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

                items: [],
                

            }
        },

        mounted: function mounted() {
            this.getVueItems();
        },
        methods: {
            goToEvents: function (item) {
                var _this = this;
                console.log(item);
                axios.post('/laravel/vuejs/public/user-rent-book',[item]).then(function (response) {
                    
                    if (response.data.status == true){
                        // _this.items = response.data.data;
                        _this.getVueItems();
                        console.log(response.data.data);
                    }
                    if(response.data.status == false){
                         // _this.items = response.data;
                         _this.getVueItems();
                        console.log(response.data);
                    }
                    
                });

            },
            getVueItems: function getVueItems() {
                var _this = this;

                axios.get('/laravel/vuejs/public/user-vueitems').then(function (response) {
                    _this.items = response.data;

                    console.log(response.data);
                });
            }

            

        },


    }


</script>
