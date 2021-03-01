  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
      
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register</h1>
              </div>

              <form class="user" method="POST" action="<?= base_url('auth/registration') ?>">

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                  <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <div class="pl-3">
                      <?= form_error('password','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="cpassword" name="cpassword" placeholder="Repeat Password">
                    <!-- <div class="pl-3"> -->
                      <!-- <? //form_error('cpassword','<small class="text-danger">','</small>'); ?> -->
                    <!-- </div> -->
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth/forgotpassword');?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth');?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
