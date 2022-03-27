<template>
    <div>
        <div class="container mt--8 pb-5">
            <div v-if="errors != ''" class="error_message alert alert-warning alert-dismissible fade show" style="position: fixed;margin-left: 65%; margin-top: -20%;" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-inner--text"><strong>Alert!</strong> {{errors}}</span>
            </div>
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
                                            <input class="form-control" placeholder="Email" type="email"  v-model="form.email" name="email" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" name="password" placeholder="Password"  v-model="form.password" type="password" required>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" >
                                        <label class="custom-control-label" for="customCheckLogin">
                                            <span class="text-muted">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <base-button class="btn btn-primary" type="button"  @click.prevent="login">Sign in</base-button>
                                    </div>
                            </div>
                        </div>
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
</template>
<script>
import axios from 'axios'
import Auth from '../../auth.js';

export default {
    data(){
        return {
            form:{
                email:'',
                password:''
            },
            errors:[
            ]
        }
    },
    methods:{
        login(){
            axios.post('/api/v1/auth/login',this.form).then(({data})=>{
                axios.get('/api/v1/auth/user').then((user)=>{
                    Auth.login(data.data.access_token,user.data);
                });
                this.$router.push('/boutique/dashboard/index');
            }).catch((error)=>{
                this.errors = error.response.data.message;
            })
        }
    }
}
</script>

