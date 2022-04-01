<template>
<div>
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
            <router-link class="navbar-brand" exact :to="{ name: 'boutique.index' }">
              <img v-bind:src="'../assets/img/brand/white.png'"/>
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                  <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                  <div class="row">
                    <div class="col-6 collapse-brand">
                      <router-link active-class="active-menu" exact :to="{ name: 'boutique.index' }">
                        <img v-bind:src="'../assets/img/brand/blue.png'" >
                      </router-link>
                    </div>
                    <div class="col-6 collapse-close">
                      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
                <ul class="navbar-nav ml-auto" v-if="loggedIn"> 
                    <li class="nav-item">
                      <router-link class="nav-link nav-link-icon" exact :to="{ name:'boutique.dashboard.index' }">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">Dashboard</span>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <a class="logout nav-link nav-link-icon" @click.prevent="logout" >
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">Logout</span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <router-link class="nav-link nav-link-icon" exact :to="{ name:'boutique.dashboard.UsersProfile' }">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">Perfil</span>
                      </router-link>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto" v-else>
                    <li class="nav-item">
                      <router-link  class="nav-link nav-link-icon" exact :to="{ name: 'boutique.login' }" >
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">Login</span>
                      </router-link>
                    </li>
               </ul>
          </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary py-7 py-lg-8">
          <div class="container">
              <div class="header-body text-center mt-7 mb-7">
                  <div class="row justify-content-center">
                      <div class="col-lg-5 col-md-6">
                          <h1 class="text-white">Welcome to Bazaar Boutique.
                              <br><span id="typed"></span> Assistant
                          </h1>
                      </div>
                  </div>
              </div>
          </div>
          <div class="separator separator-bottom separator-skew zindex-100">
              <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                  <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
              </svg>
          </div>
    </div>
</div>
</template>

<script>
export default {
    name:'navbar_guest',
    methods:{
        logout(){
            this.$store.dispatch('logout').then(res=>{
              toastr.success(res.message)
                this.$router.push('/boutique/login');
            })
        }
    },
    computed:{
      loggedIn(){
        return this.$store.getters.loggedIn
      }
    }
}
</script>