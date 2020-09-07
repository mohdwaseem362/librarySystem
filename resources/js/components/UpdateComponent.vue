<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4">Update Books details</div>
                <div class="card-body">


                    <form @submit.prevent="submit">

                        <div class="alert alert-success" v-show="success">book updated successfully.</div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Books Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.name">
                                    {{ errors.name['0'] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Author" class="col-md-4 col-form-label text-md-right">Author Name</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" v-model="fields.author" required autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.author">
                                    {{ errors.author[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publish_date" class="col-md-4 col-form-label text-md-right">Publish Date</label>

                            <div class="col-md-6">
                                <input id="publish_date" type="date" class="form-control" name="publish_date" v-model="fields.publish_date" required autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.publish">
                                    {{ errors.publish[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Rent Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price"  v-model="fields.price" required autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.rent">
                                    {{ errors.rent[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Book
                                </button>
                                <a href="http://localhost/laravel/vuejs/public/show-table"><button type="button" class="btn btn-primary">
                                    return back
                                </button></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>



export default {

    // mounted() {
    //     var id =  window.location.href.split('/').pop();
    //     this.id = id
    //     console.log(id);
    // },
    mounted: function mounted() {
            this.getBookEdit();
        },

    data() {
        return {
            categories: null,
            id :'',
            fields: [],
            userdata: [],
            success: false,
            errors: {}
        }
    },
    methods: {

        getBookEdit: function getBookEdit() {
                 var id =  window.location.href.split('/').pop()
                 console.log(id);
                 var _this = this;

                axios.post('/laravel/vuejs/public/book-edit',[id]).then(function (response) {
                    _this.fields = response.data;

                    console.log(fields);
                });
            },

        submit() {
            axios.post('/laravel/vuejs/public/update-book' , this.fields).then(response => {
                //console.log(response.data.message);//getting message from response
                if (response.data.status == true) {
                    this.fields = {}; //clear field data
                    this.fields = response.data.data
                    this.success = true;
                    this.errors = {};
                }
                if (response.data.status == false) {
                    console.log(response.data);
                    this.errors = response.data.message
                }
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
                console.log('Error');
            });
        }

    }
}
</script>