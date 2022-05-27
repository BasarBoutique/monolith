<style>
.display_select{
  display: none;
}

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
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
                <li class="breadcrumb-item"><router-link exact :to="{ path: '/boutique/dashboard/index' }"><i class="fas fa-home"></i></router-link></li>
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
                        <button type="submit" class="btn btn-success mt-4">Create account</button>
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
                <input type="checkbox" style="margin:auto;" @click="UsersCharge" class="btn btn-sm btn-neutral" id="switch" v-model="status.withDisabled" checked>
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
              :data="users"> <!--? 'thead-dark' : 'thead-light' -->             
                <template slot="columns">
                  <th>Users</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th></th>
                </template>
                <template slot-scope="{ row }">
                    <td>
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img>
                        </a>
                        <div class="d-flex flex-column justify-content-center">
                          <span class="name mb-0 text-sm">{{ row.name }}</span>
                          <p class="text-xs text-secondary mb-0">{{ row.email }}</p>
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
                      <div class="media align-items-center"> 
                            <div v-for="(roles) in row.roles" :key="roles.permission_level">
                                <span style="margin-left:3px;" v-if="roles.permission_name=='CLIENT'"  class="badge badge-sm bg-gradient-success">
                                  <b>{{roles.permission_name}}</b>
                                </span>   
                                <span style="margin-left:3px;" v-else-if="roles.permission_name=='EMPLOYEE'"  class="badge badge-sm bg-gradient-info">  
                                  <b>{{roles.permission_name}}</b>
                                </span>  
                                <span style="margin-left:3px;" v-else-if="roles.permission_name=='AUTHOR'"  class="badge badge-sm bg-gradient-warning">  
                                  <b>{{roles.permission_name}}</b>
                                </span>                             
                                <span style="margin-left:3px;" v-else-if="roles.permission_name=='ADMIN'"  class="badge badge-sm bg-gradient-danger">  
                                  <b>{{roles.permission_name}}</b>
                                </span>  
                                <span v-else class="badge badge-sm bg-gradient-secondary">  
                                  <b>Not assigned</b>
                                </span>                         
                            </div>  

                          <div class="display_select container" :id="row.id +'_data_assign'" >
                            <v-form ref="form" @submit.prevent="AsignRols(row.id,row.roles)">
                              <multiselect no-uncheck  v-model="row.roles"  :options="roles" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="false" placeholder="Select roll" label="permission_name" track-by="permission_name" >
                                <template slot="selection" slot-scope="{ values, isOpen }">
                                  <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} Roles</span>
                                </template>
                              </multiselect>                             
                              <button type="submit" class="btn btn-primary">Save</button>  
                            </v-form>                       
                          </div>

                          <div class="display_select container" :id="row.id +'_data_dettach'" >
                            <v-form ref="form" @submit.prevent="DettachRols(row.id,row.roles)">
                              <multiselect no-uncheck  v-model="row.roles"  :options="roles" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="false" placeholder="Select roll" label="permission_name" track-by="permission_name" >
                                <template slot="selection" slot-scope="{ values, isOpen }">
                                  <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} Roles</span>
                                </template>
                              </multiselect>                             
                              <button type="submit" class="btn btn-primary">Save</button>  
                            </v-form>        
                            <a @click.prevent="closeRoles(row.id)" class="btn btn-primary">Cancel</a>               
                          </div>          
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
                          <button class="dropdown-item" @click.prevent="showSelect_assign(row.id)" ><i class="ni ni-check-bold" style="color:green;"></i>Asign Rols</button>
                          <button class="dropdown-item" @click.prevent="showSelect_dettach(row.id)" ><i class="ni ni-button-power" style="color:red;"></i>Dettach Rols</button>
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
          users: [
            this.UsersCharge()
          ],
          pagination:{},
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
        changePage(v1){
          this.status.perPage = v1;
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token,
          axios.post('/auth/users/search',{params:{page:v1}}).then(res=>{
            this.users = res.data.data['users']; 
            this.pagination = res.data.data.paginate;
          })
        },

        roles_active(estado_rol_asig){
          console.log(estado_rol_asig);
        },
        
        showRoles(){
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token;
          axios.get('/permissions/roles',{params:{filters:{withDisabled: false }}}).then(res=>{
            for (let index = 0; index < res.data.data.length; index++) {
              this.roles[index] = {
                'permission_level' :  res.data.data[index].permission_level,
                'permission_name' :  res.data.data[index].permission_name
              }
            };
          });
        },

        showSelect_assign(id){  
            $('#'+id+'_data_assign').fadeIn();
            $('#'+id+'_item').fadeOut();
        },
        showSelect_dettach(id){  
            $('#'+id+'_data_dettach').fadeIn();
            $('#'+id+'_item').fadeOut();
        },
        closeRoles(id){
          $('#'+id+'_data_assign').fadeOut();
          $('#'+id+'_data_dettach').fadeOut();
          $('#'+id+'_item').fadeIn();
        },
        UsersCharge(){    
          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token,
          axios.post('/auth/users/search', {filters:{withDisabled:false}}).then(res=>{
            this.users = res.data.data['users']; 
            this.pagination = res.data.data.paginate;
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
              this.UsersCharge();
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
        AsignRols(id,roles){
          const roles_array = [];         

          roles.forEach(element => {
            roles_array.push(element.permission_level);
          });

          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token;
          axios.post('/permissions/assign-roles',{user_id : id, permission_level:roles_array}).then(data=>{
            toastr.success(data.data.message);
            this.UsersCharge();
            $('#'+id+'_data_assign').fadeOut();
            $('#'+id+'_item').fadeIn();
          }).catch(error=>{
            toastr.error(error.response.data.errors.permission_level);
          });
        },
        DettachRols(id,roles){
          const roles_array = [];         

          roles.forEach(element => {
            roles_array.push(element.permission_level);
          });

          axios.defaults.headers.common['Authorization']= 'Bearer ' + this.$store.state.token;
          axios.post('/permissions/dettach-roles',{user_id : id, permission_level:roles_array}).then(data=>{
            toastr.success(data.data.message);
            this.UsersCharge();
            $('#'+id+'_data_dettach').fadeOut();
            $('#'+id+'_item').fadeIn();
          }).catch(error=>{
            toastr.error(error.response.data.errors.permission_level);
          });
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