<template>
<div>
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
export default {
    components:{
        navbar_guest,
        footer_guest
    }
}
</script>
