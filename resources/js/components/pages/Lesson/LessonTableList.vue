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
                <li class="breadcrumb-item active" aria-current="page">Lessons</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <base-button class="btn btn-sm btn-neutral"  @click="modals.modal0 = true">
              New
            </base-button>
            <modal class="modal fade"  :show.sync="modals.modal0">
              <template slot="header">
                  <h5 class="modal-title"><i class="ni ni-folder-17">  Lesson</i></h5> 
                  <a class="btn" @click.prevent="ModalClose">x</a>                     
              </template>
              <div>
                <v-form ref="form" @submit.prevent="LessonCreate">
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
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.title" name="title" type="text" label="Category Name" id="input_category"/>
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.title">
                            <strong>Warning!</strong> {{errors.title[0]}}
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6"> 
                          <v-select style="color:#825ee4;" class="form-control" :items="items" v-model="form.author" label="Author"></v-select>
                        </div>
                         <div class="form-group col-md-6"> 
                          <v-select style="color:#825ee4;" class="form-control" :items="items" v-model="form.category" label="Category"></v-select>
                        </div>                                
                      </div>

                      <div class="form-row">
                        <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.detail">
                              <strong>Warning!</strong> {{errors['detail.author'][0]}}
                          </div>
                        </div>
                        <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.detail">
                              <!-- <strong>Warning!</strong> {{errors.category[0]}} -->
                          </div>
                        </div>    
                      </div>

                      <div class="form-group"> 
                        <v-textarea filled style="color:#825ee4;" v-model="form.description" label="Descripción del curso">
                        </v-textarea>
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.detail">
                              <strong>Warning!</strong> {{errors['detail'][0]}}
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
            <modal class="modal fade"  :show.sync="modals.modal1">
              <template slot="header">
                  <h5 class="modal-title"><i class="ni ni-folder-17">  Lesson</i></h5> 
                  <a class="btn" @click.prevent="ModalClose">x</a>                     
              </template>
              <div>
                <v-form ref="form" @submit.prevent="LessonCreate">
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
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.title" name="title" type="text" label="Category Name" id="input_category"/>
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.title">
                            <strong>Warning!</strong> {{errors.title[0]}}
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6"> 
                          <v-select style="color:#825ee4;" class="form-control" :items="items" v-model="form.author" label="Author"></v-select>
                        </div>
                         <div class="form-group col-md-6"> 
                          <v-select style="color:#825ee4;" class="form-control" :items="items" v-model="form.category" label="Category"></v-select>
                        </div>                                
                      </div>

                      <div class="form-row">
                        <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.detail">
                              <strong>Warning!</strong> {{errors['detail.author'][0]}}
                          </div>
                        </div>
                        <div class="text-center">
                          <div class="alert alert-warning" role="alert" v-if="errors.detail">
                              <!-- <strong>Warning!</strong> {{errors.category[0]}} -->
                          </div>
                        </div>    
                      </div>

                      <div class="form-group"> 
                        <v-textarea filled style="color:#825ee4;" v-model="form.detail" label="Descripción del curso">
                        </v-textarea>
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.detail">
                              <strong>Warning!</strong> {{errors['detail'][0]}}
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
            <h3 class="text-white mb-0">Lessons</h3>
              <div class="swtich-container">
                <input type="checkbox" style="margin:auto;" @click="LessonCharge" class="btn btn-sm btn-neutral" id="switch" v-model="status.withDisabled" checked>
                <label for="switch" class="lbl"></label>
              </div>
              <v-form ref="form" @submit.prevent="LessonsSearch">
                <v-text-field class="text-white" v-model="filter.title" append-icon="mdi-magnify" style="color:white; text-color:white;" label="Search" single-line hide-details clearable></v-text-field>
              </v-form>
          </div>
          <div class="table-responsive">
              <base-table 
              class="table align-items-center table-flush"
              :class="type === 'dark' ? 'table-dark' : ''"
              :thead-classes="type === 'dark' " 
              tbody-classes="list"
              :data="Lessons"> <!--? 'thead-dark' : 'thead-light' -->             
                <template slot="columns">
                  <th>Lessons</th>
                  <th>Context</th>
                  <th>Curso</th>
                  <th>Status</th>
                  <th></th>
                </template>
                <template slot-scope="{ row }">
                    <td scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img :src="row.detail.photo" />
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ row.detail.title }}</span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <!-- Descripcion -->
                      <div class="media-body" style="flex: 1 1; width: 230px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                        <span class="name mb-0 text-sm">{{row.detail.description.context}}</span>
                        </div>
                    </td>

                    <td>
                        <!--  Categories  -->
                      <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" :src="'https://personajeshistoricos.com/wp-content/uploads/2018/04/edgar-allan-poe-1.jpg'">
                          </a>
                          <div class="media-body">
                              <span class="name mb-0 text-sm">{{ row.curso }}</span>
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
                          <button v-if="row.enabled == true" class="dropdown-item" @click.prevent="LessonDetail(row.id)" ><i class="ni ni-settings" style="color:purple;"></i>Update</button>
                          <button class="dropdown-item" @click.prevent="LessonDisable(row.id)" ><i class="ni ni-button-power" style="color:red;"></i>Disabled</button>                    
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
          Lessons: [
            axios.get('/lesson/all?withDisabled=false').then(res=>{
              this.Lessons = res.data.data.courses;
            })
          ],
          filter:{
            title: null
          },
          form :{
            id:null,
            title:null,
            url:null,
            context:null,
            course:null,
            enabled:'',
          },
          status:{
              withDisabled:true
          },
          errors:{},
          message:[],
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
        LessonCharge(){          
          axios.get('/lesson/all?withDisabled='+this.status.withDisabled).then(res=>{
            this.Lessons = res.data.data.courses;
          })
        },
        LessonCreate(){
          const fd = new FormData();
          // fd.append("Lesson_ico",this.form.photo.name);
          // fd.append("Lesson_title",this.form.Lesson);
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.post('/lesson/create-lesson',fd,config).then(data=>{
            this.message = data.data.message;            
            this.LessonCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        LessonDetail(id){
          console.log(id);
          axios.get('/lesson/detail/'+id).then(res=>{
            this.form = res.data.data;
            this.miniatura =res.data.data.photo;
            this.modals.modal1 = true;
          });
        },
        LessonUpdate(){
          const fd = new FormData();
          // fd.append("Lesson_ico",this.form.Lesson_ico.name);
          // fd.append("Lesson_title",this.form.Lesson_title);
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.post('/lesson/update-lesson/'+this.form.id,fd,config).then(data=>{
            this.message = data.data.message;
            this.LessonCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        LessonsSearch(){
          axios.post('/lesson/search',{
            filters : this.filter
            }).then(res=>{
             this.Lessons = res.data.data.Lessons;
             console.log(this.filter.title);
             console.log(res.data.data.Lessons);
          }).catch((error)=>{
            this.LessonCharge();
          })
        },
        LessonDisable(id){
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.put('/lesson/remove-lesson/' + id).then(data=>{
            this.message = data.data.message;
            this.LessonCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          });
        },
        ModalClose(){
          this.form.title ="";
          this.form.url="";
          this.form.context="";
          this.form.course="";
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
            BaseButton
      }
    }
</script>