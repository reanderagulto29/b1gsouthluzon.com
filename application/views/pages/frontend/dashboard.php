      <style>

      /* body {font-family: Verdana, sans-serif; margin:0} */
      .mySlides {display: none}
      img {vertical-align: middle;}

      /* Slideshow container */
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }

      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(1,0,0,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .activeh, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .faden {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @-webkit-keyframes faden {
        from {opacity: .4} 
        to {opacity: 1}
      }

      @keyframes faden {
        from {opacity: .4} 
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }
      </style>



    <!-- Registration Section -->
    <section id="register" class="projects-section bg-light">
      <div class="container">
        <!-- Registration Form -->
        <div class="container d-flex h-100 align-items-center">
          <div class="mx-auto text-center">
            <h class="mx-auto my-0 text-uppercase"><?=REG?></h1>
          </div>
        </div>
        <br><br>

        <?php 
          $attributes = array(
                          'role' => 'form', 
                          'name' => 'newinfo',
                          'enctype' => "multipart/form-data"
                        );
          echo form_open("index.php/Registration/add_participants", $attributes); 
          if(is_string($show_error))
          {
            if($show_error == 'REG0001') 
            {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo constant($show_error); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
            }
          }
        ?> <!-- Opening tag <form> -->
          <input type="hidden" id="error" name="error" value="<?=$show_error?>" />
          <input type="hidden" id="lastid" name="lastid" value="<?=$last_id?>" />

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><?=NAME?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?=NAME?>" name="txtname" id="txtname" required>
              </div>
            </div>

            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0"><?=GEND?></legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                    <label class="form-check-label" for="gender">
                      <?=MALE?>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                    <label class="form-check-label" for="gender">
                      <?=FEMALE?>
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

            <div class="form-group row">
              <label for="txtcno" class="col-sm-2 col-form-label"><?=CNO?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txtcno" id="txtcno" data-mask="(0000)-000-0000" data-mask-selectonfocus="true" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="txtcno" class="col-sm-2 col-form-label"><?=EMAIL?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txtemail" id="txtemail"placeholder="<?=EMAIL?>" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="txtcno" class="col-sm-2 col-form-label"><?=ADDRESS?></label>
              <div class="col-sm-10">
                <textarea class="form-control" name="txtadd" id="txtadd" style="resize:none;" rows = "3" required></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label"><?=DEPOSIT?></label>
              <div class="col-sm-10">
                <input type="file" accept="image/*" class="form-control-file" name="deposit" id="deposit" placeholder="<?=DEPOSIT?>" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label"><?=TSIZE?></label>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-12">
                    <select class="form-control", name="selSizes" id="selSizes" required>
                      <?php
                        foreach ($tsizelist as $value) 
                        {
                          ?>
                            <option value="<?=$value['id']?>"><?=$value['size_abbre']?> - <?=$value['size_name']?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row float-right" style="padding-top:5px;">
                  <div class="col-sm-12"><h6><i>Want to view t-shirt design? Click <a id="btnviewimage" href="#" data-toggle="modal" data-target=".bs-example-modal-lg" class="btnview">Here</a></i></h6>
                  </div>
                </div>
              </div>
            </div> 
          
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0"><?=FIRST_TIME_ATTEND?></legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input yes-ftime" type="radio" name="attend" id="ftime-yes" value="Yes" required>
                    <label class="form-check-label" for="gridRadios1">
                      <?=YES?>
                    </label>
                  </div>
                  <div class="form-check"> 
                    <input class="form-check-input no-ftime" type="radio" name="attend" id="ftime-no" value="No" required>
                    <label class="form-check-label" for="gridRadios1">
                      <?=NO?>
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0"><?=DG_PART?></legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input yes-radio" type="radio" name="dpart" id="dgpart-yes" value="Yes" required>
                    <label class="form-check-label" for="gridRadios1">
                      <?=YES?>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input no-radio" type="radio" name="dpart" id="dgpart-no" value="No" required>
                    <label class="form-check-label" for="gridRadios1">
                      <?=NO?>
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

            <div class="form-group row satellite">
              <label for="inputPassword3" class="col-sm-2 col-form-label"><?=SAT?></label>
              <div class="col-sm-10">
                <select class="form-control", name="selSatellite" id="selSatellite">
                  <?php
                    foreach ($satlist as $value) 
                    {
                      ?>
                        <option value="<?=$value['sat_id']?>"><?=$value['sat_name']?></option>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div> 

            <div class="form-group row dgroup-leader">
              <label for="inputPassword3" class="col-sm-2 col-form-label"><?=DGL?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="dgroupleader" id="dgroupleader" placeholder="<?=DGL?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary"><?=REGISTER?></button>
              </div>
            </div>
        </form>
      </div>
    </section>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
              <div class="modal-body" id="mdView">
                  <div class="slideshow-container">

                      <div class="mySlides faden">
                          <div class="numbertext">1 / 3</div>
                          <img src="<?=base_url()?>assets/img/tshirt-front.png" style="width:100%;height:75%">
                          <br>
                          <br>
                          <div class="text" style="color:black;">Front</div>
                      </div>

                      <div class="mySlides faden">
                          <div class="numbertext">2 / 3</div>
                          <img src="<?=base_url()?>assets/img/tshirt-back.png" style="width:100%;height:75%">
                          <br>
                          <br>
                          <div class="text" style="color:black;">Back</div>
                      </div>

                      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                      <a class="next" onclick="plusSlides(1)">&#10095;</a>

                  </div>
                  <br>

                  <div style="text-align:center">
                      <span class="dot" onclick="currentSlide(1)"></span> 
                      <span class="dot" onclick="currentSlide(2)"></span> 
                  </div>

              </div>
          </div>
      </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#txtcno').mask('(0000)-000-0000', {placeholder: '(0000)-000-0000'});

            var error = $('#error').val();

            if(error === "REG0001")
            {
                var dataString = { 
                    id : 'hello'
                };

                $.ajax({
                    type: "POST", 
                    url: "<?=base_url()?>registration/get_info",
                    data: dataString,
                    dataType: "json",
                    cache: false,
                    success: function(data)
                    {
                        var socket = io.connect('http://'+ window.location.hostname +':3000');  

                        socket.emit('new_registered', { 
                            dataArr: 'hello'
                        });                      

                        socket.emit('updated_count', {
                          rgctr: data.regctr,
                          ftimer: data.firstimer,
                          nodg: data.nodgroup,
                          wdg: data.wdgroup
                        });
                      
                    }, 
                    error: function(xhr, status, error) 
                    {
                        alert(error);
                    },
                });

            }

            // Hide DGroup leader field
            $('.dgroup-leader').hide();
            $('.satellite').hide();
            $('.invited').hide();

            // Show DGroup leader field
            $('.yes-radio').click(function() {
                $('.dgroup-leader').show();
                $('.satellite').show();
                $('#dgroupleader').attr('required', 'required');
                $('#selSatellite').attr('required', 'required');
            });

            // Hide DGroup leader field if Yes
            $('.no-radio').click(function() {
                $('.dgroup-leader').hide();
                $('.satellite').hide();
                $('#dgroupleader').removeAttr('required');
                $('#selSatellite').removeAttr('required');
            });
        });
    </script>

    <script>
      var slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
      showSlides(slideIndex += n);
      }

      function currentSlide(n) {
      showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" activeh", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " activeh";
      }
    </script>