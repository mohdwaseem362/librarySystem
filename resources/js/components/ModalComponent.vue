<template>
    <modal v-if="showModal" @close="showModal=false">
                        <h3 slot="header">Edit Item</h3>
                        <div slot="body">

                            <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                   required  :value="this.e_id">
                            Name: <input type="text" class="form-control" id="e_name" name="name"
                                         required  :value="this.e_name">
                            Age: <input type="number" class="form-control" id="e_author" name="authoe"
                                        required  :value="this.e_author">
                            Profession: <input type="text" class="form-control" id="e_publish_date" name="publishdate"
                                               required  :value="this.e_publish_date">


                        </div>
                        <div slot="footer">
                            <button class="btn btn-default" @click="showModal = false">
                                Cancel
                            </button>

                            <button class="btn btn-info" @click="editItem()">
                                Update
                            </button>
                        </div>
                    </modal>
</template>

<script>
    
  


</script>