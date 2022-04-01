<style>
  .logout{
    cursor: pointer;
  }
</style>
<template>
    <div>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent pb-5">
                            <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
                            <div class="btn-wrapper text-center">
                                    <!-- <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon"><img v-bind:src="'../assets/img/icons/common/github.svg'"/></span>
                                        <span class="btn-inner--text">{{ __('Github') }}</span>
                                    </a> -->
                                <a href="#" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img v-bind:src="'../assets/img/icons/common/google.svg'"></span>
                                    <span class="btn-inner--text">Google</span>
                                </a>
                            </div>
                        </div>
                        <form @submit.prevent="login">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>
                                        Create new account OR Sign in with these credentials:
                                    </small>
                                </div>                                    
                                <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Email" type="email"  v-model="credentials.email" name="email" required autofocus>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" name="password" placeholder="Password"  v-model="credentials.password" type="password" required>
                                        </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" >
                                        <label class="custom-control-label" for="customCheckLogin">
                                            <span class="text-muted">Remember me</span>
                                        </label>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit" style="color:white;">Sign in</button>
                                </div>
                            </div>                            
                        </form>
                        <div class="row mt-3">
                            <div class="col-6">
                                <a href="/password.request" class="text-light">
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'Login',
    data(){
        return {
            credentials:{
                email:null,
                password:null
            }
        }
    },
    methods:{
        // login : async function() {
        //     try {
        //         await this.$store.dispatch('Login',this.credentials).then(res =>{
        //             // this.$store.dispatch('aboutUser').then(()=>{
        //             //     toastr.success(res.message);
        //             // }); 
        //             this.$router.push('/boutique/dashboard/index');         
        //         })
        //     } catch (error) {
        //         toastr.error(error)
        //     }
        login(){

            this.$store.dispatch('login', this.credentials).then(res=>{     
                this.$store.dispatch('aboutUser').then(()=>{
                    toastr.success(res.message);
                    this.$router.push('/boutique/dashboard/index');         
                }); 
            }).catch(error=>{
                toastr.error(error.message)
            })
        }
    }
}
</script>
