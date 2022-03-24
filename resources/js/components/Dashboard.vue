<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
</style>
<template>
  <div class="main-content">
    <!-- Main content -->
      <siderbar></siderbar>

      <div class="main-content" id="panel">

        <navbar-auth></navbar-auth>
        
        <transition name="fade" mode="out-in">
          <router-view></router-view>
        </transition>

      </div>
  </div>
</template>

<script>
import header_siderbar from './Layouts/navbars/siderbar.vue'
import navbar_auth from './Layouts/navbars/navs/auth.vue'
import Auth from '../auth.js'
export default {
  data () {
     return {       
       user: Auth.user
    }
  },
  created() {
     // console.log(this.auth.user);
  },
  components:{
    "siderbar":header_siderbar,
    "navbar-auth":navbar_auth
  }
}
</script>




