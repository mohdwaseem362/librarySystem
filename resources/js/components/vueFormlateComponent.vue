<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4">Add Books</div>
                <div class="card-body">

                    <listButton-component></listButton-component>

                    <form @submit.prevent="submit">

                        <div class="alert alert-success" v-show="success">book created successfully.</div>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">Author Name</label>

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
                                <input id="publish_date" type="date" class="form-control" name="publish_date" v-model="fields.publish" required autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.publish">
                                    {{ errors.publish[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rent_price" class="col-md-4 col-form-label text-md-right">Rent Price</label>

                            <div class="col-md-6">
                                <input id="author" type="number" class="form-control" name="rent_price"  v-model="fields.rent" required autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.rent">
                                    {{ errors.rent[0] }}
                                </div>
                            </div>
                        </div>

                        <!--        <div class="form-group row">
                                    <label for="category_id" class="col-md-4 col-form-label text-md-right">Ticket Category</label>
                        
                                    <div class="col-md-6">
                                        <select class="form-control" id="category_id" name="category_id" v-model="fields.category_id">
                                            <option v-for="category in categories"
                                                    :value="category.id">{{ category.name }}
                                            </option>
                                        </select>
                                        <div class="alert alert-danger" v-if="errors && errors.category_id">
                                            {{ errors.category_id[0] }}
                                        </div>
                                    </div>
                                </div>-->

                        <!--        <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Ticket Description</label>
                        
                                    <div class="col-md-6">
                                        <textarea id="description" rows="5" class="form-control" name="description" v-model="fields.description" required></textarea>
                                        <div class="alert alert-danger" v-if="errors && errors.description">
                                            {{ errors.description[0] }}
                                        </div>
                                    </div>
                                </div>-->

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Book
                                </button>
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
        data() {
            return {
                categories: null,
                fields: {},
                success: false,
                errors: {}
            }
        },
//        mounted() {
//            axios.get('/api/categories').then(response => {
//                this.categories = response.data.data;
//            })
//        },
        methods: {
            submit() {
                axios.post('/laravel/vuejs/public/store-book', this.fields).then(response => {
                    //console.log(response.data.message);//getting message from response
                    if (response.data.status == true) {
                        this.fields = {}; //clear field data
                        this.success = true;
                        this.errors = {};
                    }
                    if (response.data.status == false) {
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