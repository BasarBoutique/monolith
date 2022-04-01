
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
                <li class="breadcrumb-item"><router-link exact :to="{ name: 'boutique.dashboard.index' }"><i class="fas fa-home"></i></router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">Courses</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" @click="modals.modal0 = true">
              New
            </button>
            <modal :show.sync="modals.modal0">
              <template slot="header">
                  <h5 class="modal-title">Courses</h5>
              </template>
              <div>
                <v-form ref="form" @submit.prevent="CourseCreate">
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
                        <div class="alert alert-warning" role="alert" v-if="errors.Course_ico">
                            <strong>Warning!</strong> 
                        </div>
                      </div>
                      <div class="input-group">               
                          <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.Course" name="Course_title" type="text" label="Courses Name" id="example-search-input"/>
                      </div>




                      <!-- Categorias del Curso  -->
                      <div> 
                      <v-container fluid>
                          <v-row align="center">
                            <v-col
                              class="d-flex"
                              cols="12"
                              sm="14"
                            >
                              <v-select
                                :items="items"
                                label="Standard"
                              ></v-select>
                            </v-col>

                          </v-row>
                        </v-container>
                      
                      
                      
                      </div>
                      


                      <br>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.Course_title">
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
            <h3 class="text-white mb-0">Courses</h3>
              <div class="swtich-container">
                <input type="checkbox" style="margin:auto;" @click="CourseCharge" class="btn btn-sm btn-neutral" id="switch" v-model="status.withDisabled" checked>
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
              :data="courses"> <!--? 'thead-dark' : 'thead-light' -->             
                <template slot="columns">
                  <th>Courses</th>
                  <th>Description</th>
                  <th>Author</th>
                  <th>Status</th>
                  <th></th>
                </template>
                <template slot-scope="{ row }">
                    <td scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" :src="row.photo" />
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ row.title }}</span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <!-- Descripcion -->
                      <div class="media-body" style="flex: 1 1; width: 230px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                        <span class="name mb-0 text-sm">{{row.detail['about']}}</span>
                        </div>
                    </td>
                    <td>
                      <!--  Authores  -->
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" :src="'https://personajeshistoricos.com/wp-content/uploads/2018/04/edgar-allan-poe-1.jpg'">
                        </a>
                        <div class="media-body">
                            <span class="name mb-0 text-sm">Edgar Allan Poe</span>
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
                          <button v-if="row.enabled == true" class="dropdown-item" @click.prevent="CourseDetail(row.id)" ><i class="ni ni-settings" style="color:purple;"></i>Update</button>
                          <button class="dropdown-item" @click.prevent="CourseDisable(row.id)" ><i class="ni ni-button-power" style="color:red;"></i>Disabled</button>                    
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
          courses: [
            axios.get('/api/v1/courses/all?withDisabled=true').then(res=>{
              this.courses = res.data.data;
            })
          ],
          form :{
            id:'',
            photo:{
              name:''
            },
            Course :'',
            enabled:'',
          },
          status:{
              withDisabled:null
          },
          errors:{},
          message:[],
        }
      },
      methods: {
        onFileSelected(event){
            this.form.photo = event.target.files[0];
        },
        CourseCharge(){          
          axios.get('/api/v1/courses/all?withDisabled='+this.status.withDisabled).then(res=>{
            this.courses = res.data.data;
          })
        },
        CourseCreate(){
          const fd = new FormData();
          fd.append("Course_ico",this.form.photo.name);
          fd.append("Course_title",this.form.Course);

          axios.post('/api/v1/courses/create-course',fd,config).then(data=>{
            this.message = data.data.message;            
            this.CourseCharge();
            this.ModalClose();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        CourseDetail(id){
          axios.get('/api/v1/courses/detail/'+id).then(res=>{
            this.form = res.data.data[0];
          });
        },
        CourseUpdate(){
          const fd = new FormData();
          fd.append("Course_ico",this.form.Course_ico.name);
          fd.append("Course_title",this.form.Course_title);
          
          axios.post('/api/v1/courses/update-course/'+this.form.id,fd,config).then(data=>{
            this.message = data.data.message;
            this.CourseCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          })
        },
        CourseDisable(id){
          axios.put('/api/v1/courses/disable-course/' + id).then(data=>{
            this.message = data.data.message;
            this.CourseCharge();
          }).catch((error)=>{
            this.errors = error.response.data.errors;
          });
        },
        ModalClose(){
          this.form.photo="";
          this.form.Course =""; 
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