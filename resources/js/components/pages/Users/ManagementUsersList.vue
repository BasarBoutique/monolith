<style>
  .theme--light.v-label {
    color: rgba(166, 165, 165, 0.6);
  }
  .table th, .table td {
  padding: 1rem;
  vertical-align: top;
  border-top: none;
  }
  .table thead th {
  border-bottom: none;
}
.table thead th {
  border-bottom: none;
}
</style>
<template>
    <div>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">User Info</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><router-link exact :to="{ name: 'boutique.dashboard.index' }"><i class="fas fa-home"></i></router-link></li>
                <li class="breadcrumb-item active" aria-current="page">User Info</li>
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" @click="modals.modal0 = true">
              New
            </button>
            <modal :show.sync="modals.modal0">
              <template slot="header">
                  <h5 class="modal-title">User Managemen</h5>
              </template>
              <div>
                <v-form ref="form" @submit.prevent="CategoryCreate">
                  <div class="modal-body">
                      <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                          <div class="card-profile-image">
                            <img id="imageResult" alt="" class="img-fluid shadow-sm mx-auto d-block rounded-circle img-responsive">
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
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> 
                          <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                          <small class="text-uppercase font-weight-bold text-muted">Choose file</small>
                        </label>
                        <input id="upload" type="file" name="photo" onchange="readURL(this);" class="form-control border-0"  @change="onFileSelected">
                        <div class="alert alert-warning" role="alert" v-if="errors.category_ico">
                            <strong>Warning!</strong> 
                        </div>
                      </div>
                      <div class="input-group">               
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.category" name="category_title" type="text" label="User Name" id="example-search-input"/>
                      </div><br>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.category_title">
                            <strong>Warning!</strong> 
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                      </div>
                    </div>
                </v-form>
              </div>
              <template slot="footer">
                  <button type="button" class="btn btn-secondary" @click="modals.modal0 = false">Close</button>
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
            <h3 class="text-white mb-0">User Management</h3>
              <div class="swtich-container">
                <input type="checkbox" style="margin:auto;" @click="CategoryCharge" class="btn btn-sm btn-neutral" id="switch" v-model="status.withDisabled" checked>
                <label for="switch" class="lbl"></label>
              </div>
              <v-text-field v-model="search" append-icon="mdi-magnify" style="color:white; text-color:white;" label="Search" single-line hide-details clearable></v-text-field>
          </div>
          <div class="table-responsive">
              <base-table 
              class="table align-items-center table-flush"
              :class="type === 'dark' ? 'table-dark' : ''"
              :thead-classes="type === 'dark' " 
              tbody-classes="list"
              :data="categories"> <!--? 'thead-dark' : 'thead-light' -->             
                <template slot="columns">
                  <th>Users</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Phone</th>
                  <th></th>
                </template>
                <template slot-scope="{ row }">
                    <td>
                    <!--  Usuarios   -->
                    <div class="media align-items-center">
                        
                        <a href="#" class="avatar rounded-circle mr-3">
                              <img alt="Image placeholder" :src="'https://i.pinimg.com/736x/49/c8/e4/49c8e403cd1929e9e7b02126824ff831.jpg'">
                        </a>

                        <div class="media-body">
                            <span class="name mb-0 text-sm">Kuno Anticucho</span>
                        </div>
                    </div>


                    </td>




                    <td>
                    <!-- Correo Electronico -->
                    
                    <div class="media-body">
                            <span class="name mb-0 text-sm">correo@gmail.com</span>
                    </div>

                    </td>

                    <td>
                    <!--  Roles   -->
                    <div class="media align-items-center">
                        <!--
                        <a href="#" class="avatar rounded-circle mr-3">
                              <img alt="Image placeholder" :src="'https://personajeshistoricos.com/wp-content/uploads/2018/04/edgar-allan-poe-1.jpg'">
                        </a>-->

                        <div class="media-body">
                            <span class="name mb-0 text-sm">Administrador</span>
                        </div>
                    </div>


                    </td>
                    <td>
                    <!-- Celular  -->
                    
                    <div class="media-body">
                            <span class="name mb-0 text-sm">995478124</span>
                    </div>

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
                          <v-form ref="form" @submit.prevent="CategoryDetail(row.id)" >
                            <button class="dropdown-item" @click="modals.modal0 = true"><i class="ni ni-settings" style="color:purple;"></i>Update</button>
                          </v-form>
                          <a class="dropdown-item" href="#"><i class="ni ni-button-power" style="color:red;"></i>Enabled</a>
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
          modals: {
            modal0: false
          },
          search: '',
          categories: [
            axios.get('/api/v1/categories/all?withDisabled=false').then(res=>{
              this.categories = res.data.data;
            })
          ],
          form :{
            id:'',
            photo:{
              name:''
            },
            category :'',
            enabled:'',
          },
          status:{
              withDisabled:'true'
          },
          errors:{},
          message:[],
        }
      },
      methods: {
        onFileSelected(event){
            this.form.photo = event.target.files[0];
        },
        CategoryCharge(){          
          axios.get('/api/v1/categories/all?withDisabled='+this.status.withDisabled).then(res=>{
            this.categories = res.data.data;
          })
        },
        CategoryCreate(){
          const fd = new FormData();
          fd.append("category_ico",this.form.photo.name);
          fd.append("category_title",this.form.category);

          axios.post('/api/v1/categories/create-category',fd,config).then(data=>{
            this.message = data.data.message;            
            this.CategoryCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        CategoryDetail(id){
          axios.get('/api/v1/categories/detail/'+id).then(res=>{
            this.form = res.data.data[0];
          });
        },
        CategoryUpdate(){
          const fd = new FormData();
          fd.append("category_ico",this.form.category_ico.name);
          fd.append("category_title",this.form.category_title);
          
          axios.post('/api/v1/categories/update-category/'+this.form.id,fd,config).then(data=>{
            this.message = data.data.message;
            this.CategoryCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        ModalClose(){
          this.form.photo="";
          this.form.category =""; 
          $("#imageResult")[0].setAttribute("src", "");
          this.modals.modal0 = false;                
        }
      },
      components:{
        "footer-auth":footer_auth,
            BaseButton
      }
    }
</script>