
<template>
    <div class="row">
      <div class="col">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Dark table</h3>
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
                          <span class="status">{{item.enabled}}</span>
                      </span>
                      <span  v-if="item.enabled == false" class="badge badge-dot mr-4">              
                        <i class="bg-danger"></i>
                          <span class="status">{{item.enabled}}</span>
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
</template>
<script>
const withDisabled=false;
    export default {
       data() {
          return {
            categories: []
          }
        },          
        created(){
          axios.get('/api/v1/categories/all?withDisabled='+withDisabled).then(res=>{
            this.categories = res.data.data;
            console.log(res.data.data);
          })
        }, 
    }
</script>
