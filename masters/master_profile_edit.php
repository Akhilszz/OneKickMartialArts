<?php

require_once("../connectionclass.php");
$master_id=$_GET['pk_key'];
$query="SELECT * FROM master WHERE master_id=$master_id";

$obj=new Connectionclass();
$data=$obj->GetSingleRow($query);

 
?>
        <?php
require_once("../admin/header.php");

?>

<section  >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-8">
<section class="panel">
<header class="panel-heading">  PROFILE EDIT </header>
    
                    <form method="post" action="update_master.php">
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">NAME</label> 
    <div class='group'>
        <input required class='form-control'   pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"  type='text' name='name' id='name'  value="<?php echo $data["full_name"] ?>"/>
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">GENDER</label> 
    <div class='group'>
        <select required class='form-control'   name='gender' id='gender'  value="<?php echo $data["gender"] ?>" >
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Transgender">Transgender</option>
            
        </select>
         
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">PROFILE</label> 
    <div class='group'>
        <input required class='form-control' type='text' name='profile' id='address'  value="<?php echo $data["profile"] ?>"/>
    </div>
</div>
<div class="w3l-form-group"> 
    <label class="col-sm-3 control-label">PHONENO</label> 
    <div class='group'>
        <input required class='form-control'  pattern="[9876][0-9]{9}" title="Enter a valid mobile number" type='text' name='phoneno' id='phoneno'  value="<?php echo $data["phone"] ?>"/>
    </div>
</div>
 
<div class="w3l-form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-6">
   <input type="hidden" name="pk_key" value="<?php echo $data["master_id"] ?>" />
<input  class="btn btn-success" type="submit" value="submit">
      <button type="reset" class="btn btn-danger">Cancel</button>
   </div>
</div>


</form>
                        
                        
</section>
</div>



</div>
</div>
</section>                  
                    
    <!-- end section -->
    

     
    <?php
require_once("../footer.php");

?>

 