<template>
<div v-if="loggedIn">
  <div class="main-content">
    <header_siderbar></header_siderbar>
    <div class="main-content" id="panel">
        <navbar_auth></navbar_auth>
        <router-view></router-view> 
    </div>
  </div>
</div>
<div v-else>
    <navbar_guest></navbar_guest>
    <transition name="fade" mode="out-in">
        <router-view></router-view>
    </transition>    
    <footer_guest></footer_guest>
</div>
</template>

<script>

import footer_guest from './Layouts/Footer/nav_guest.vue'
import navbar_guest from '../components/Layouts/navbars/navs/guest'
import navbar_auth from '../components/Layouts/navbars/navs/auth.vue'
import header_siderbar from '../components/Layouts/navbars/siderbar.vue'
export default {
    components:{
        navbar_guest,
        footer_guest,
        navbar_auth,
        header_siderbar
    },
    computed:{
      loggedIn(){
        return this.$store.getters.loggedIn
      }
    }
}
</script>
