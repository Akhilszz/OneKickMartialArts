<?php
require_once("header.php");

?>
 
<!--  <script>
$(function(){
    
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('max', maxDate);
});

</script> -->
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
                           <h2><span class="theme_color"> Regi</span>ster</h2>  
                        </div>
                    </div>
                    <div class="full paddding_left_15">
                        
                        
                                    
                    <form method="post" action="code/register_exe.php">
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">NAME</label> 
    <div class='group'>
        <input required class='form-control'   pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"  type='text' name='name' id='name'/>
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">GENDER</label> 
    <div class='group'>
        <select required class='form-control'   name='gender' id='gender' >
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Transgender">Transgender</option>
            
        </select>
         
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">ADDRESS</label> 
    <div class='group'>
        <input required class='form-control' type='text' name='address' id='address' pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/>
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">PHONENO</label> 
    <div class='group'>
        <input required class='form-control'  pattern="[9876][0-9]{9}" title="Enter a valid mobile number" type='text' name='phoneno' id='phoneno'/>
    </div>
</div>
<?php
$dob = date('Y-m-d', strtotime('-18 years'));
?>

<div class="w3l-form-group">
    <label class="col-sm-3 control-label">DOB</label> 
    <div class='group'>
    <input required class='form-control' type='date' name='dob' id='txtDate'max='<?php echo $dob;?>'/>
    </div>
</div>
<div class="w3l-form-group">
    <label class="col-sm-3 control-label">EMAIL ID</label> 
    <div class='group'>
        <input required class='form-control' type='email' name='emailid' id='emailid' pattern="[^\s@]+@[^\s@]+\.[^\s@]+"/>
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">PASSWORD</label> 
    <div class='group'>
        <input required class='form-control' type='password'  pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one digit" name='password' id='password'/>
    </div>
 
</div>  
<div class="w3l-form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-danger">Submit</button>
      <button type="reset" class="btn btn-danger">Cancel</button>
   </div>
</div>


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
