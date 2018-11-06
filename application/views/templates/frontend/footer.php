    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0"><?=CONADD?></h4>
                <hr class="my-4">
                <div class="small text-black-50">
                   <p>
                    <a href="<?=$b1ginfo[0]['Map']?>"><?=$b1ginfo[0]['Address']?><a>
                   </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0"><?=CONEMAIL?></h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <p><?=$b1ginfo[0]['EAdd']?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0"><?=CONPHONE?></h4>
                <hr class="my-4">
                <div class="small text-black-50"><?=$b1ginfo[0]['Tel']?></div>
              </div>  
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="<?=$b1ginfo[0]['FB']?>" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="<?=$b1ginfo[0]['IG']?>" class="mx-2">
            <i class="fab fa-instagram"></i>
          </a>
        </div>

      </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        <?=COPYRIGHT?> &copy; <?=B1GSL?> - <?=OVERCOME?>
      </div>
    </footer>
    <!-- Footer -->
    
    <!-- Bootstrap core JavaScript -->
    <!-- <script src="<?=base_url()?>assets/validator/lib/jquery.js"></script> -->
    
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=base_url()?>assets/js/grayscale.js"></script>

    <!-- Validator Javascript libraries -->
    
    <script src="<?=base_url()?>assets/validator/lib/jquery.mockjax.js"></script>
    <script src="<?=base_url()?>assets/validator/lib/jquery.form.js"></script>
    <script src="<?=base_url()?>assets/validator/dist/jquery.validate.js"></script>

  </body>
  <!-- End of Body Page-Top -->

</html>