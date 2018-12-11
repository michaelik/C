<!doctype html>
<html lang="en">
  <head>
    <title>::__welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <!-- <h2 class="text-center">Contac Form</h2> -->
	<div class="row justify-content-center" style="margin: auto;"> 
		<div class="col-12 col-md-8 col-lg-6 pb-5" style="padding: 0px!important; top:100px;">


                    <!--Form with header-->

                    <form action="<?php echo $action?>" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fas fa-address-book">
                                    </i>Personal Info</h3>
                                    <p class="m-0">Fill the form below</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="username" placeholder="Enter Your Name" required>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('username') ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="Enter Your Email" required>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('email') ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-address-card text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="address" placeholder="Enter Your Address" required>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('address') ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fas fa-phone text-info"></i></div>
                                        </div>
                                        <input type="tel" class="form-control" id="nombre" name="tel" placeholder="Enter Your Phone Number" required>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('tel') ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-transgender text-info"></i></div>
                                        </div>
                                        <select class="form-control" name="gender">
                                            <option selected disabled>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('gender') ?></span>
                                </div>
                                  
                                <!-- <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Envianos tu Mensaje" required></textarea>
                                    </div>
                                </div> -->
                                <?php if($this->session->userdata('msg')){ ?>
                                <?php echo $this->session->userdata('msg'); ?> 
                                <?php echo $this->session->unset_userdata('msg'); ?> 
                                <?php } ?>
                                <div class="text-center">
                                    <input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
</body>
</html>