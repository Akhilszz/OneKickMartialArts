<?php
require_once("header.php");
$email=$_GET['email'];

?>

 
	<!-- section -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="full text_align_right_img">
                        <img src="images/page.jpg" alt="#" />
                    </div>
                </div>
                <div class="col-md-6 layout_padding">
                    <div class="full paddding_left_15">
                        <div class="heading_main text_align_left">
						   <h2><span class="theme_color"> Log</span>in</h2>	
                        </div>
                    </div>
                    <div class="full paddding_left_15">
                        
						
                                    
 <form action="verify_exe.php" method="POST">
	 		
           
			
			<div class=" w3l-form-group ">
                <label>OTP</label>
                <div class="group">
                <input type="hidden" name="email" value="<?php echo $email?>"class="form-control" placeholder="Enter OTP" required="required" />

                    <input type="number" name="otp" class="form-control" placeholder="Enter OTP" required="required" />
                </div>
            </div>
			
			<div class="forgot car-price"> 
                
            </div>
			<br>
            <button type="submit" class="site-btn float-right btn-danger">verify now</button>
           
        </form>
						
						
						
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
	<!-- end section -->
    

     
    <?php
require_once("footer.php");

?>
