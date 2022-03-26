
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
            <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><router-link exact :to="{ name: 'boutique.dashboard.index' }"><i class="fas fa-home"></i></router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
              New
            </button>
            
           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <v-card-title class="modal-title" id="exampleModalLabel">
                        Category
                      </v-card-title>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <br>
                    <br>
                    <v-form ref="form" @submit.prevent="created">
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
                            <input id="upload" type="file" name="category_ico" onchange="readURL(this);" class="form-control border-0"  @change="onFileSelected">
                            <div class="alert alert-warning" role="alert" v-if="errors.category_ico">
                                <strong>Warning!</strong> {{errors.category_ico[0]}}
                            </div>
                          </div>
                          <div class="input-group">                      
                              <v-text-field class="form-control" style="color:#825ee4; border-color:1px solid #cad1d7;" v-model="form.category_title" name="category_title" type="text" label="Category Name" id="example-search-input"/>
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
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                    </div>
                  </div>
                </div>
            </div> 
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
            <h3 class="text-white mb-0">Dark table</h3>
              <div class="swtich-container">
                <input type="checkbox" style="margin:auto;"  @click="charge" class="btn btn-sm btn-neutral" name="Vehiculo"  id="switch" v-model="status.withDisabled">
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
                  <th>Categories</th>
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
                          <span class="name mb-0 text-sm">{{ row.category }}</span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span  v-if="row.enabled == true" class="badge badge-dot mr-4">              
                        <i class="bg-success"></i>
                        <span class="status">Enabled</span>
                      </span>
                      <span  v-if="row.enabled == false" class="badge badge-dot mr-4">              
                        <i class="bg-danger"></i>
                        <span class="status">Disabled</span>
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
                          <a class="dropdown-item" href="#"><i class="ni ni-settings" style="color:purple;"></i>Update</a>
                          <a class="dropdown-item" href="#"><i class="ni ni-button-power" style="color:red;"></i>Enabled</a>
                        </template>
                      </base-dropdown>
                    </td>
                </template>                
              </base-table>
          </div>
          <div class="card-footer d-flex justify-content-end bg-default shadow" :class="type === 'dark' ? 'bg-transparent' : ''">
            <base-pagination total="30"></base-pagination>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt--10 pb-5"></div>
    <footer-auth></footer-auth>
  </div>
</div>
</template>


<script>
import BasePagination from '../../Base/BasePagination.vue'
import BaseDropdown from '../../Base/BaseDropdown.vue'
import BaseTable from '../../Base/BaseTable.vue'
import BaseButton from '../../Base/BaseButton.vue'
import footer_auth from '../../Layouts/Footer/nav_auth.vue'
import { SlideYUpTransition } from "vue2-transitions";

    export default {
      props: {
        type: {
          type: String,
        },
        title: String,
      },
      data() {
        return {
            search: '',
            categories: [
              axios.get('/api/v1/categories/all?withDisabled='+'false').then(res=>{
                this.categories = res.data.data;
              })
            ],
            form :{
              category_ico:{
                name:''
              },
              category_title :''
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
            this.form.category_ico = event.target.files[0];
          },
          charge(){          
            axios.get('/api/v1/categories/all?withDisabled='+this.status.withDisabled).then(res=>{
              this.categories = res.data.data;
            })
          },
          created(){
            const config = {
              headers: { 'content-type': 'multipart/form-data' }
            };
            const fd = new FormData();
            fd.append("category_ico",this.form.category_ico.name);
            fd.append("category_title",this.form.category_title);

            axios.post('/api/v1/categories/create-category',fd,config).then(data=>{
              this.message = data.data.message;
            }).catch((error)=>{
                this.errors = error.response.data.errors;
              }
            )
          }
        },
        components:{
          "footer-auth":footer_auth,
                BaseTable,
                BasePagination,
                BaseDropdown,
                BaseButton,
                SlideYUpTransition

        }
    }
</script>
