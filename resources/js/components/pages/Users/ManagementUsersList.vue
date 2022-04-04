<style>
.display_select{
  display: none;
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
              <base-button class="btn btn-sm btn-neutral"  @click="modals.modal0 = true">
                New
              </base-button>
              <modal class="modal fade"  :show.sync="modals.modal0">
                <template slot="header">
                    <h5 class="modal-title"><i class="ni ni-folder-17">Register a new User</i></h5> 
                    <a class="btn" @click.prevent="ModalClose">x</a>                     
                </template>
                <div>
                  <v-form ref="form" @submit.prevent="UsersCreate">
                    <div class="modal-body">

                      <div class="form-group input-group input-group-alternative"><!---->
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="ni ni-hat-3"></i>
                          </span>
                        </div>
                        <v-text-field class="form-control" style="color:#825ee4;" v-model="form.name" type="text" label="User name" id="input_user"/>
                      </div>                      
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.name">
                            <strong>Warning!</strong> {{errors.name[0]}}
                        </div>
                      </div>

                      <div class="form-group input-group input-group-alternative"><!---->
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="ni ni-email-83"></i>
                          </span>
                        </div>
                        <v-text-field class="form-control" style="color:#825ee4;" v-model="form.email" type="text" label="User email" id="input_email"/>
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.email">
                            <strong>Warning!</strong> {{errors.email[0]}}
                        </div>
                      </div>

                      <div class="form-group input-group input-group-alternative"><!---->
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="ni ni-lock-circle-open"></i>
                          </span>
                        </div>
                        <v-text-field class="form-control" style="color:#825ee4;" v-model="form.password" type="password" label="Password" id="input_password"/>
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.password">
                            <strong>Warning!</strong> {{errors.password[0]}}
                        </div>
                      </div>

                      <div class="form-group input-group input-group-alternative"><!---->
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="ni ni-lock-circle-open"></i>
                          </span>
                        </div>
                        <v-text-field class="form-control" style="color:#825ee4;" v-model="form.confirm_password" type="password" label="Password Confirmation"  id="input_password_confirmation"/>           
                      </div>
                      <div class="text-center">
                        <div class="alert alert-warning" role="alert" v-if="errors.confirm_password">
                            <strong>Warning!</strong> {{errors.confirm_password}}
                        </div>
                      </div>
                      
                      <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4"><!----><!----><!---->Create account</button>
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
                  <th>Phone</th>
                  <th>Role</th>
                  <!-- <th></th> -->
                </template>
                <template slot-scope="{ row }">
                    <td>
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                              <img alt="Image placeholder" :src="'https://i.pinimg.com/736x/49/c8/e4/49c8e403cd1929e9e7b02126824ff831.jpg'">
                        </a>
                        <div class="d-flex flex-column justify-content-center">
                          <span class="name mb-0 text-sm">Kuno Anticucho</span>
                          <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                        </div>
                      </div>
                    </td>

                    
                    <td>
                      <!-- Celular  -->
                      <div class="media align-items-center">
                        <span class="name mb-0 text-sm"><i class="fas fa-mobile-alt"></i> +(51) 995478124</span>
                      </div>
                    </td>

                    <td>
                      <!--  Roles   -->
                      <div class="media align-items-right">
                          <span :id="row.id +'_item'" v-if="row.enabled == true" class="badge badge-sm bg-gradient-success">              
                            <i class="bg-success"></i>
                            Enabled
                          </span>
                          <span :id="row.id +'_item'" v-if="row.enabled == false" class="badge badge-sm bg-gradient-danger">              
                            <i class="bg-danger"></i>
                            Disabled
                          </span>
                        
                          <button @click="showSelect(row.id)" :id="row.id +'select_display'" type="button"  data-toggle="tooltip" style="margin-left:4px;" data-placement="top" title="Preciona dos veces para cambiar de rol">
                            <i class="ni ni-settings" style="color:white"></i>
                          </button>

                          <va-select class="display_select" :id="row.id +'_data'" v-model="row.category" placeholder="Seleccione un rol" no-uncheck>
                            <template v-for="rol in roles">
                              <va-option :key="rol.permission_level" :value="rol.permission_level" :label="rol.ph_label"> 
                                {{rol.ph_label}}  
                              </va-option>
                            </template>
                          </va-select>


                      </div>
                    </td>

                    <!-- <td class="text-right">
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
                    </td> -->

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

    export default {
      props: {
        type: {
          type: String,
        },
        title: String,
      },
      data() {
        return {
          roles : [
            this.showRoles()
          ],
          modals: {
            modal0: false
          },
          search: '',
          categories: [
            axios.get('/categories/all?withDisabled=false').then(res=>{
              this.categories = res.data.data;
            })
          ],
          form :{
            id:null,
            name:null,
            email:null,
            password:null,
            confirm_password:null
          },
          status:{
              withDisabled:'true'
          },
          errors:{},
          message:[],
        }
      },
      methods: {
        showRoles(){
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token
          axios.get('/permissions/roles').then(res=>{
            this.roles = res.data.data;
          })
        },
        showSelect(id){
            var x = document.getElementById(id+'_data');        
            $('#'+id+'select_display').click(function(){
              $('#'+id+'_data').fadeIn();
              $('#'+id+'_item').fadeOut();
              $('#'+id+'select_display').fadeOut();
            })
        },
        CategoryCharge(){          
          axios.get('/categories/all?withDisabled='+this.status.withDisabled).then(res=>{
            this.categories = res.data.data;
          })
        },
        UsersCreate(){       
          if (this.validaRepetirPassword) {
            axios.post('/auth/signup',{
              name: this.form.name,
              email: this.form.email,
              password: this.form.password
            }).then(data=>{
              this.message = data.data.message;            
              this.CategoryCharge();
              this.ModalClose();
            }).catch((error)=>{
              this.errors = error.response.data.errors;
              this.errors.confirm_password = "Enter a password confirmation";
            })
          }else{
            this.errors.password =null;
            this.errors.confirm_password = "Contraseña erronea";
          }
        },
        ModalClose(){
          this.form.name=null;
          this.form.email=null;
          this.form.password =null;
          this.form.confirm_password =null;
          this.modals.modal0 = false;                
        }
      },
      components:{
        "footer-auth":footer_auth,
            BaseButton
      },
      computed:{
        validaRepetirPassword(){
            if(this.form.password==this.form.confirm_password){
                return true;
            } else{
                return false;
            }
        },
      }
    }
</script>