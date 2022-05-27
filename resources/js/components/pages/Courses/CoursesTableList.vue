<style>
.text-white input {
      color: rgb(255, 255, 255) !important;
}  
</style>
<template>
<div data-app>
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
                  <li class="breadcrumb-item active" aria-current="page">Courses</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <base-button class="btn btn-sm btn-neutral"  @click="modals.modal0 = true">
                New
              </base-button>
              <modal class="modal fade"  :show.sync="modals.modal0">
                <template slot="header">
                    <h5 class="modal-title"><i class="ni ni-folder-17">  Course</i></h5> 
                    <a class="btn" @click.prevent="ModalClose">x</a>                     
                </template>
                <div>
                  <v-form ref="form" @submit.prevent="CourseCreate">
                    <div class="modal-body">
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
                          <div class="alert alert-warning" role="alert" v-if="errors.photo">
                              <strong>Warning!</strong> {{errors.photo[0]}}
                          </div>
                        </div>

                        <div class="form-group">               
                            <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.title" name="title" type="text" label="Course Name" id="input_courses"/>
                        </div>
                        <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.title">
                              <strong>Warning!</strong> {{errors.title[0]}}
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6"> 
                            <template>
                              <v-select style="color:#825ee4;" class="form-control" :items="authors" item-value="id" item-text="name" label="Author" v-model="form.author" v-validate="'required'">  
                              </v-select>
                            </template>
                          </div>   

                          <div class="form-group col-md-6"> 
                            <template>
                              <v-select style="color:#825ee4;" class="form-control" :items="categories" item-value="id" item-text="title" label="Category" v-model="form.category" v-validate="'required'">  
                              </v-select>
                            </template>
                          </div>                        
                        </div>

                        <div class="form-row">
                          <div class="alert alert-warning" role="alert" v-if="errors['detail.author']">
                            <strong>Warning!</strong> {{errors['detail.author'][0]}}
                          </div>
                          
                          <!-- <div class="alert alert-warning" role="alert" v-if="errors.detail">
                            <strong>Warning!</strong> {{errors.detail[0]}}
                          </div> -->
                        </div>

                        <div class="form-group"> 
                          <v-textarea filled style="color:#825ee4;" v-model="form.description" label="Descripción del curso">
                          </v-textarea>
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.price" name="Precio" type="text" label="Precio" id="input_courses"/>
                        </div>
                        <!-- <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.detail">
                                <strong>Warning!</strong> {{errors.detail[0]}}
                          </div>
                        </div> -->

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
              <modal class="modal fade"  :show.sync="modals.modal1">
                <template slot="header">
                    <h5 class="modal-title"><i class="ni ni-folder-17">  Course</i></h5> 
                    <a class="btn" @click.prevent="ModalClose">x</a>                     
                </template>
                <div>
                  <v-form ref="form" @submit.prevent="CourseUpdate">
                    <div class="modal-body">
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
                          <div class="alert alert-warning" role="alert" v-if="errors.photo">
                              <strong>Warning!</strong> {{errors.photo[0]}}
                          </div>
                        </div>

                        <div class="form-group">               
                            <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.title" name="title" type="text" label="Course Name" id="input_courses"/>
                        </div>
                        <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.title">
                              <strong>Warning!</strong> {{errors.title[0]}}
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6"> 
                            <template>
                              <v-select style="color:#825ee4;" class="form-control" :items="authors" item-value="id" item-text="name" label="Author" v-model="form.author" v-validate="'required'">  
                              </v-select>
                            </template>
                          </div>   

                          <div class="form-group col-md-6"> 
                            <template>
                              <v-select style="color:#825ee4;" class="form-control" :items="categories" item-value="id" item-text="title" label="Category" v-model="form.category" v-validate="'required'">  
                              </v-select>
                            </template>
                          </div>                        
                        </div>

                        <div class="form-row">
                          <div class="alert alert-warning" role="alert" v-if="errors['detail.author']">
                            <strong>Warning!</strong> {{errors['detail.author'][0]}}
                          </div>
                          
                          <!-- <div class="alert alert-warning" role="alert" v-if="errors.detail">
                            <strong>Warning!</strong> {{errors.detail[0]}}
                          </div> -->
                        </div>

                        <div class="form-group"> 
                          <v-textarea filled style="color:#825ee4;" v-model="form.description" label="Descripción del curso">
                          </v-textarea>
                        </div>
                        <!-- <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.detail">
                                <strong>Warning!</strong> {{errors.detail[0]}}
                          </div>
                        </div> -->

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
              <h3 class="text-white mb-0">Courses</h3>

              <div class="form-row"> 
                <div class="col">           
                  <select v-model="paginate" style="width:20%;" @click.prevent="CoursesSearch" aria-controls="example" label="Cantidad" class="custom-select custom-select-sm form-control">
                    <option value="5" selected="true">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>

                <div class="col"> 
                    <template>
                      <v-select multiple class="custom-select form-control" :items="authors" @change="CoursesSearch" item-value="id" item-text="name" label="Author" v-model="filter.authors" v-validate="'required'">  
                      </v-select>
                    </template>
                </div>

                <div class="col">  
                  <template>
                    <v-select multiple class="custom-select form-control" :items="categories" @change="CoursesSearch" item-value="id" item-text="title" label="Category" v-model="filter.categories" v-validate="'required'">  
                    </v-select>
                  </template>
                </div> 

 <!-- <div class="swtich-container">
                </div> -->
                <div class="col"> 
                  <input type="checkbox" style="margin:auto;" @click="CourseCharge" class="btn btn-sm btn-neutral" id="switch" v-model="status.withDisabled" checked>
                  <label for="switch" class="lbl"></label>
                </div>
              </div>
              
              <v-text-field class="text-white" @change="CoursesSearch" v-model="filter.title" append-icon="mdi-magnify" style="color:white; text-color:white;" label="Search" single-line hide-details clearable></v-text-field>

            </div>
            <div class="table-responsive">
                <base-table 
                class="table align-items-center table-flush"
                :class="type === 'dark' ? 'table-dark' : ''"
                :thead-classes="type === 'dark' " 
                tbody-classes="list"
                :data="courses"> <!--? 'thead-dark' : 'thead-light' -->             
                  <template slot="columns">
                    <th>Courses</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th></th>
                  </template>
                  <template slot-scope="{ row }">
                      <td scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img :src="row.photo" />
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ row.title }}</span><br>
                            <span class="name mb-0 text-sm">S/. {{ row.detail.about.price }}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <!-- Descripcion -->
                        <div class="media-body" style="flex: 1 1; width: 230px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                          <span class="name mb-0 text-sm">{{ row.detail.about.description }}</span>
                        </div>
                      </td>

                      <td>
                          <!--  Authores  -->
                        <div class="media align-items-center">
                            <a href="#" class="avatar rounded-circle mr-3">
                              <img :src="row.detail.author.photo_url" />
                            </a>
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ row.detail.author.name }}</span>
                            </div>
                        </div>
                      </td>

                      <td>
                          <!--  Categories  -->
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{row.category}}</span>
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
                          <a slot="title" class="btn btn-sm btn-icon-only text-light" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <template>
                            <button v-if="row.enabled == true" class="dropdown-item" @click.prevent="CourseDetail(row.id)" ><i class="ni ni-settings" style="color:purple;"></i>Update</button>
                            <button class="dropdown-item" @click.prevent="CourseDisable(row.id)" ><i class="ni ni-button-power" style="color:red;"></i>Disabled</button>                    
                          </template> 
                        </base-dropdown>
                      </td>
                  </template>                
                </base-table>
            <base-pagination :page-count="pagination.total" @changestr="changePage" align="center" size="sm"></base-pagination>
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
          courses: this.CourseCharge(),
          pagination:{},
          filter:{
            categories:[],
            authors: [],
            title: null,
          },
          paginate:5,
          form :{
            id:null,
            title:null,
            photo:null,
            category:null,
            author:null,
            description:null,
            price:null,
            enabled:null,
          },
          status:{
            withDisabled:true,
          },
          authors:[
            this.AuthorsCharge()
          ],
          categories : [
            this.category()
          ],
          errors:{},
          message:[],
        }
      },
      methods: {
        changePage(v1){
          this.status.perPage = v1;
          axios.post('/courses/search',{filters : this.filter ,paginate : this.paginate, page:v1}).then(res=>{
            this.courses = res.data.data.courses;
            this.pagination = res.data.data.pagination;
          })
        },
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
        category(){
          axios.get('/categories/all',{params:{withDisabled:false}}).then(res=>{
              this.categories = res.data.data.categories;
          })
        },
        AuthorsCharge(){        
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token,  
          axios.post('/auth/users/search',{filters:{withDisabled:false,roles:[3]}}).then(res=>{
            this.authors = res.data.data.users;
          })
        },
        CourseCharge(){   
          axios.post('/courses/search',{filters : this.filter,paginate : this.paginate}).then(res=>{
              this.courses = res.data.data.courses;
              this.pagination = res.data.data.pagination;
          }).catch((error)=>{
            this.CourseCharge();
          })
        },
        CourseCreate(){
          const fd = new FormData();
          fd.append("title",this.form.title);
          fd.append("image",this.form.photo);
          fd.append("category",this.form.category);
          fd.append("detail[author]",this.form.author);
          fd.append("detail[metadata][about]",this.form.description);
          fd.append("detail[metadata][price]",this.form.price);

          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token;
          axios.post('/courses/create-course',fd,config).then(data=>{
            this.message = data.data.message;            
            this.CourseCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        CourseDetail(id){
          axios.get('/courses/detail/'+id).then(res=>{
            this.form = res.data.data;
            this.miniatura =res.data.data['photo'];
            this.modals.modal1 = true;
          });
        },
        CourseUpdate(){
          const fd = new FormData();
          fd.append("title",this.form.title);
          fd.append("photo-url",this.form.photo.name);
          fd.append("detail[author]",this.form.author);
          fd.append("detail[description][about]",this.form.description);
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token;       
          axios.put('/courses/update-course/'+this.form.id,fd,config).then(data=>{
            this.message = data.data.message;
            this.CourseCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        CoursesSearch(){
          axios.post('/courses/search',{
            filters : this.filter,paginate : this.paginate
            }).then(res=>{
              this.courses = res.data.data.courses;
              this.pagination = res.data.data.pagination;
          }).catch((error)=>{
            this.CourseCharge();
          })
        },
        CourseDisable(id){
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.put('/courses/disable-course/' + id).then(data=>{
            this.message = data.data.message;
            this.CourseCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          });
        },
        ModalClose(){
          this.form.title =null;
          this.form.photo=null;
          this.form.author=null;
          this.form.category=null;
          this.form.description=null;
          this.miniatura=null;
          this.errors={};
          this.modals.modal0 = false;   
          this.modals.modal1 = false;         
        }
      },
      computed: {
        imagen(){
          return this.miniatura;
        },
      },
      components:{
        "footer-auth":footer_auth,
            BaseButton
      }
    }
</script>