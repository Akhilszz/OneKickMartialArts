<?php
require_once("header.php");

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
                        
						
                                    
 <form action="login_exe.php" method="POST">
	 		
           
			
			<div class=" w3l-form-group ">
                <label>Username/Email</label>
                <div class="group">
                    
                    <input type="email" name="username" class="form-control" placeholder="Email" pattern="[^\s@]+@[^\s@]+\.[^\s@]+" required="required" />
                </div>
            </div>
			
			<div class=" w3l-form-group ">
                <label>Password</label>
                <div class="group">
                    
                    <input type="password" name="password" class="form-control" required="required" />
                </div>
            </div>
			
			
           <div class="forgot car-price"> 
                
            </div>
			<br>
            <button type="submit" class="site-btn float-right btn-danger">Login Now</button>
            <a href="forgot_pass.php"?>forgot password?</a>
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
