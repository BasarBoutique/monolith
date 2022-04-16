<template>
      <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
              <img v-bind:src="'../../assets/img/brand/blue.png'" class="navbar-brand-img" alt="...">
            </a>
          </div>
          <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
              <!-- Nav items -->
              <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link class="nav-link" exact :to="{ path: '/boutique/dashboard/index' }">
                        <i class="ni ni-tv-2 text-primary text-green"></i> 
                        <span class="nav-link-text text-green">Dashboard</span>
                    </router-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                        <i class="ni ni-badge text-yellow"></i>
                        <span class="nav-link-text text-yellow">User Info</span>
                    </a>

                    <div class="collapse show" id="navbar-user">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <router-link class="nav-link" exact :to="{ path:'/boutique/dashboard/UsersProfile' }">
                                    <i class="ni ni-single-02 text-yellow"></i>User profile
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" exact :to="{ path: '/boutique/dashboard/UsersManagement' }">
                                    <i class="ni ni-paper-diploma text-yellow"></i>Users Management
                                </router-link>
                            </li>


                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                        <i class="ni ni-folder-17 text-red"></i>
                        <span class="nav-link-text text-red">Tables</span>
                    </a>

                    <div class="collapse show" id="navbar-tables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <router-link class="nav-link" exact :to="{ path: '/boutique/dashboard/categories' }">
                                   <i class="ni ni-bullet-list-67 text-red"></i>  Categories
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ path: '/boutique/dashboard/Courses'}">
                                    <i class="ni ni-bullet-list-67 text-red"></i> Courses
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ path: '/boutique/dashboard/Lessons' }">
                                    <i class="ni ni-bullet-list-67 text-red"></i> Lessons
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-calification" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                        <i class="ni ni-ruler-pencil text-pink"></i>
                        <span class="nav-link-text text-pink">Calificaciones</span>
                    </a>

                    <div class="collapse show" id="navbar-calification">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <router-link class="nav-link" exact :to="{ path: '/boutique/dashboard/Comments' }">
                                    <i class="ni ni-collection text-pink"></i>
                                    <span class="nav-link-text text-pink">Comments</span>
                                </router-link>
                            </li>                            
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" exact :to="{ path: '/boutique/dashboard/icons' }">
                        <i class="ni ni-planet text-blue"></i>Icons
                    </router-link>
                </li>

                <!--<li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
                    <a class="nav-link text-white" href="/">
                        <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                    </a>
                </li>-->
              </ul>
              <!-- Divider -->
              <hr class="my-3">
              <h6 class="navbar-heading p-0 text-muted">
              <!--<span class="docs-normal">Documentation</span>-->
            </h6>
            <!-- Navigation -->
            <!--
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                  <i class="ni ni-spaceship"></i>
                  <span class="nav-link-text">Getting started</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                  <i class="ni ni-palette"></i>
                  <span class="nav-link-text">Foundation</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                  <i class="ni ni-ui-04"></i>
                  <span class="nav-link-text">Components</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                  <i class="ni ni-chart-pie-35"></i>
                  <span class="nav-link-text">Plugins</span>
                </a>
              </li>
            </ul>-->
            </div>
          </div>
        </div>
      </nav>
</template>

<script>
export default {
  name:"header_siderbar"
}
</script>