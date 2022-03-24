
<template>
<div>
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tables</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="#" @click="showModal" class="btn btn-sm btn-neutral">New</a>
                <example-modal ref="modal"></example-modal>
              </div>
            </div>
          </div>
        </div>
  </div>
  <div class="container-fluid mt--6">
    <div class="row">
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Dark table</h3>
                <div class="swtich-container">
                    <input type="checkbox" style="margin:auto;"  @click="created" class="btn btn-sm btn-neutral" name="Vehiculo"  id="switch" v-model="form.withDisabled">
                    <label for="switch" class="lbl"></label>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Category</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                      <tr v-for="(item, index) in categories" :key="index" >
                        <td scope="row">
                          <div class="media align-items-center">
                            <a href="#" class="avatar rounded-circle mr-3">
                              <img v-bind:src=item.photo alt="Image placeholder">
                            </a>
                            <div class="media-body">
                              <span class="name mb-0 text-sm">
                                {{item.category}}</span>
                            </div>
                          </div>
                        </td>
                        <td>
                          <span  v-if="item.enabled == true" class="badge badge-dot mr-4">              
                            <i class="bg-success"></i>
                              <span class="status">Enabled</span>
                          </span>
                          <span  v-if="item.enabled == false" class="badge badge-dot mr-4">              
                            <i class="bg-danger"></i>
                              <span class="status">Disabled</span>
                          </span>
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#"><i class="ni ni-settings"></i>Update</a>
                                <a class="dropdown-item" href="#"><i class="ni ni-button-power"></i>Enabled</a>
                              </div>
                            </div>
                          </td>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
    <layout-footer-auth></layout-footer-auth>
  </div>
</div>
</template>
<script>
import exampleModal from './CategoryModal.vue'
import footerauth from '../../Layouts/Footer/nav_auth.vue'
    export default {
       data() {
          return {
            form:{
              withDisabled:'false'
            },
            categories: []
          }
        },          
        methods: {
          created(){          
            axios.get('/api/v1/categories/all?withDisabled='+this.form.withDisabled).then(res=>{
              console.log(this.form.withDisabled);
              this.categories = res.data.data;
            })
          }, 
          showModal () {
            let element = this.$refs.modal.$el
            $(element).modal('show')
          },
        },
        components:{
          "example-modal":exampleModal,
          "layout-footer-auth":footerauth
        }
    }
</script>
