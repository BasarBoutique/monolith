<template>
  <div>
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px;background-image: url('https://www.mensjournal.com/wp-content/uploads/mf/1280-selfie.jpg?w=1200&h=630&crop=1&quality=86&strip=all'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-white">{{User.name}}</h1>
              <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
              <a href="#!" class="btn btn-info">Edit profile</a>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid mt--7" style="background:#f7fafc;">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
              <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img :src="'../../../../assets/img/theme/team-4.jpg'" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading">22</span>
                                            <span class="description">Friends</span>
                                        </div>
                                        <div>
                                            <span class="heading">10</span>
                                            <span class="description">Photos</span>
                                        </div>
                                        <div>
                                            <span class="heading">89</span>
                                            <span class="description">Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    {{User.detail.udetail_fullname}}
                                    <span class="font-weight-light">, 27</span>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>{{User.detail.udetail_movil}}
                                </div>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>{{User.detail.udetail_direction}}
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>{{User.email}}
                                </div>
                                <hr class="my-4" />
                                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                                <a href="#">Show more</a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card shadow   bg-secondary">
                    <div class="card-header">
                        <div class="bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">Username <!----></label><!---->
                                            <input alternative="" placeholder="Username" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">Email address <!----></label><!---->
                                            <input alternative="" placeholder="jesse@example.com" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">First name <!----></label><!---->
                                            <input alternative="" placeholder="First name" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">Last name <!----></label><!---->
                                            <input alternative="" placeholder="Last name" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"><h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">Address <!----></label><!---->
                                            <input alternative="" placeholder="Home Address" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">City <!----></label><!---->
                                            <input alternative="" placeholder="City" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">Country <!----></label><!---->
                                            <input alternative="" placeholder="Country" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group has-label">
                                            <label class="form-control-label">Postal code <!----></label><!---->
                                            <input alternative="" placeholder="Postal code" class="form-control form-control-alternative" aria-describedby="addon-right addon-left"><!----><!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"><h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <div class="form-group has-label">
                                        <label class="form-control-label">About Me <!----></label><!---->
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."> A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea><!----><!---->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!----><!---->
                </div>
            </div>
        </div>
        <footer_auth></footer_auth>
      </div>
  </div>
</template>
<script>
import footer_auth from '../../Layouts/Footer/nav_auth.vue';
  export default {
      data(){
        return{
            User : JSON.parse(this.$store.state.user)
        }
    },
    components:{
      footer_auth
      }
  }
</script>