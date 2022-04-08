<style>
.text-white input {
      color: rgb(255, 255, 255) !important;
}  
</style>
<template>
<div>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><router-link exact :to="{ path: '/boutique/dashboard/index' }"><i class="fas fa-home"></i></router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right" >
            <base-button class="btn btn-sm btn-neutral"  @click="modals.modal0 = true">
              New
            </base-button>
            <modal class="modal fade" :show.sync="modals.modal0">
              <template slot="header" >
                  <h5 class="modal-title"><i class="ni ni-folder-17">  Category</i></h5> 
                  <a class="btn" @click.prevent="ModalClose">x</a>                 
              </template>
              <div>
                <v-form  ref="form" @submit.prevent="CategoryCreate">
                  <div class="modal-body" style="width:100%">
                      <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                          <div class="card-profile-image">
                            <img :src="imagen" style="max-width: 120px;" class="img-fluid shadow-sm mx-auto d-block rounded-circle img-responsive">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <div class="text-center">
                        <input type="file" class="form-control border-0"  @change="onFileSelected">
                        <div class="alert alert-warning" role="alert" v-if="errors.category_ico">
                            <strong>Warning!</strong> {{errors.category_ico[0]}}
                        </div>
                      </div>
                      <div class="input-group">               
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.category" name="category_title" type="text" label="Category Name" id="input_category"/>
                      </div><br>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.category_title">
                            <strong>Warning!</strong> {{errors.category_title[0]}}
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                      </div>
                    </div>
                </v-form>
              </div>
              <template slot="footer">
                  <button type="button" class="btn btn-secondary" @click.prevent="ModalClose">Close</button>
              </template>
            </modal>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <modal id="MyModal" :show.sync="modals.modal1">
              <template slot="header">
                  <h5 class="modal-title"><i class="ni ni-folder-17">  Category</i></h5> 
              </template>   
              <div>
                <v-form ref="form" @submit.prevent="CategoryUpdate">
                  <div class="modal-body">
                      <div class="row justify-content-center" >
                        <div class="col-lg-3 order-lg-2">
                          <div class="card-profile-image">
                            <img :src="imagen" style="max-width: 120px;" class="img-fluid shadow-sm mx-auto d-block rounded-circle img-responsive">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <div class="text-center" >
                        <input type="file"  class="form-control border-0" @change="onFileSelected">
                        <div class="alert alert-warning" role="alert" v-if="errors.category_ico">
                            <strong>Warning!</strong> {{errors.category_ico[0]}}
                        </div>
                      </div>
                      <div class="input-group">               
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.title" name="category_title" type="text" label="Category Name" id="input_category"/>
                      </div><br>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors[0]">
                            <strong>Warning!</strong> {{errors[0]}}
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                      </div>
                    </div>
                </v-form>
              </div>
              <template slot="footer">
                  <button type="button" class="btn btn-secondary" @click.prevent="ModalClose">Close</button>
              </template>
            </modal>
          </div>
        </div>
        <div v-if="message != ''"  class="alert alert-secondary alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{message}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6" style="background:#f7fafc;">
    <div class="row">
      <div class="col">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Categories</h3> 
            <div style="margin-top:10px;">             
              <select name="example_length" v-model="status.perPage" style="width:65px;" @click.prevent="CategoryCharge" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
            <div class="swtich-container">
              <input type="checkbox" style="margin:auto;" @click="CategoryCharge" class="btn btn-sm btn-neutral" id="switch" v-model="status.withDisabled">
              <label for="switch" class="lbl"></label>
            </div>
            <v-form ref="form" @submit.prevent="">
              <v-text-field class="text-white" v-model="filter.title" append-icon="mdi-magnify" style="color:white; text-color:white;" label="Search" single-line hide-details clearable></v-text-field>
            </v-form>
          </div>
          <div class="table-responsive">
              <base-table 
              class="table align-items-center table-flush"
              :class="type === 'dark' ? 'table-dark' : ''"
              :thead-classes="type === 'dark' " 
              tbody-classes="list"
              :data="categories"> <!--? 'thead-dark' : 'thead-light' -->             
                <template slot="columns">
                  <th>Categories</th>
                  <th>Status</th>
                  <th></th>
                </template>
                <template slot-scope="{ row }">
                    <td scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img  :src="row['photo-url']" />
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ row.title }}</span>
                        </div>
                      </div>
                    </td>
                    <td class="media align-items-center">
                      <span  v-if="row.enabled == true" class="badge badge-sm bg-gradient-success">              
                        <i class="bg-success"></i>
                        Enabled
                      </span>
                      <span  v-if="row.enabled == false" class="badge badge-sm bg-gradient-danger">              
                        <i class="bg-danger"></i>
                        Disabled
                      </span>
                    </td>
                    <td class="text-right">
                      <base-dropdown class="dropdown" position="right">
                        <a
                          slot="title"
                          class="btn btn-sm btn-icon-only text-light"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-ellipsis-v"></i>
                        </a>

                        <template>
                          <button v-if="row.enabled == true" class="dropdown-item" @click.prevent="CategoryDetail(row.id)" ><i class="ni ni-settings" style="color:purple;"></i>Update</button>
                          <button class="dropdown-item" @click.prevent="CategoryDisable(row.id)" ><i class="ni ni-button-power" style="color:red;"></i>Disabled</button>                    
                        </template>    
                      </base-dropdown>
                    </td>
                </template>                
              </base-table>
          </div>
          <!-- <div class="card-footer d-flex justify-content-end bg-default shadow" :class="type === 'dark' ? 'bg-transparent' : ''">
            <base-pagination total="30"></base-pagination>
          </div> -->
        </div>
      </div>
    </div>
    <div class="container mt--10 pb-5"></div>
    <footer-auth></footer-auth>
  </div>
</div>
</template>

<script>
import BaseButton from '../../Base/BaseButton.vue';
import footer_auth from '../../Layouts/Footer/nav_auth.vue';
const config = {
  headers: { 'content-type': 'multipart/form-data' }
};

    export default {
      props: {
        type: {
          type: String,
        },
        title: String,
      },
      data() {
        return {
          miniatura :'',
          modals: {
            modal0: false,
            modal1:false
          },
          search: '',
          categories: [
            axios.get('/categories/all?withDisabled=false').then(res=>{
              this.categories = res.data.data.categories;
            })
          ],
          filter:{
            title: null
          },
          form :{
            id:null,
            photo:null,
            category:null,
            enabled:null,
          },
          status:{
              withDisabled:true,
              perPage:null
          },
          errors:{},
          message:[]
        }
      },
      methods: {
        onFileSelected(e){
            let file = e.target.files[0];
            this.form.photo = file;
            this.cargarImagen(file);
        },
        cargarImagen(file){
          let reader = new FileReader();
          reader.onload = (e) =>{
            this.miniatura = e.target.result;
          }
          reader.readAsDataURL(file);
        },
        CategoryCharge(){     
          axios.get('/categories/all',{params:{withDisabled:this.status.withDisabled,perPage:this.status.perPage}}).then(res=>{
            this.categories = res.data.data.categories;
          })
        },
        CategoryCreate(){
          let fd = new FormData();
          fd.append("category_ico",this.form.photo.name);
          fd.append("category_title",this.form.category);

          console.log(fd);

          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.post('/categories/create-category',fd,config).then(data=>{
            this.message = data.data.message;   
            this.CategoryCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          });
        },
        CategoryDetail(id){
          axios.get('/categories/detail/'+id).then(res=>{
            this.form = res.data.data;
            this.miniatura =res.data.data["photo-url"];
            this.modals.modal1 = true;
          });
        },
        CategoryUpdate(){
          let fd = new FormData();
          fd.append("_method", "put");
          fd.append("category_ico",this.form.photo['name']);
          fd.append("category_title", this.form.category);

          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          
          axios({
            methods: "put",
            url : "/categories/update-category/"+this.form.id,
            data : fd,
            headers : config
          }).then(data=>{
            this.message = data.data.message;
            this.CategoryCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          });
          // axios.put('/categories/update-category/'+this.form.id,fd,config).then(data=>{
          //   console.log(data.message);
          //   // this.message = data.data.message;
          //   this.CategoryCharge();
          //   this.ModalClose();
          // }).catch((error)=>{
          //   this.errors = error.response.data.errors;
          // });
        },
        CategoryDisable(id){
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.put('/categories/disable-category/' + id).then(data=>{
            this.message = data.data.message;
            this.CategoryCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          });
        },
        ModalClose(){
          this.form.category ="";
          this.form.photo="";
          this.miniatura="";
          this.errors={};
          this.modals.modal0 = false;  
          this.modals.modal1 = false;              
        }
      },
      computed: {
        imagen(){
          return this.miniatura;
        }
      },
      components:{
        "footer-auth":footer_auth,
            BaseButton,
      }
    }
</script>