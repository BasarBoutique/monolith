<template>
<div class="modal fade" id="exampleModal" ref="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <br>
            <div class="modal-body">
                <form>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <img id="imageResult" src="#" alt="" class="img-fluid shadow-sm mx-auto d-block rounded-circle img-responsive">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        <input id="upload" type="file" name="category_ico" onchange="readURL(this);" class="form-control border-0">
                    </div>
                    <div class="form-group">
                        <label for="category_title">Category</label>
                        <input type="text" name="category_title" id="category_title" class="form-control form-control-alternative" required autofocus>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    methods:{
        closeModal(){
            $('#exampleModal').modal('hide')
        },
        registerCategory(){
            const article = { title: "Vue POST Request Example" };
            axios.post('/api/v1/categories/create-category',).then(res=>{
            this.categories = res.data.data;
          })
        }
    }
}
</script>

