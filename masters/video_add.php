<?php require_once("../admin/header.php"); 

$username = $_SESSION['username'];
require_once("../connectionclass.php");
$obj=new Connectionclass();
$arts="select * from arts";
$res=$obj->GetTable($arts);

?>
<?php 
require_once("../connectionclass.php");
$ob=new Connectionclass();
$master="select * from master where email='$username'";
$re=$ob->GetTable($master);
foreach($re as $m){
  
   $master_id=$m['master_id'];
   
}

?>

<div class="col-lg-4">
<section class="panel">
<header class="panel-heading"> ADD VIDEO_TIPS</header>

<div class="panel-body">
 <form method="post" action="video_tips_exe.php">
<div class="form-group"> <label class="col-sm-12 control-label">TITLE</label> 
  <div class='col-lg-12'>
  <input required class='form-control' type='text' name='title' id='subject'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/>
 <br></div> 
 <div class="form-group"> <label class="col-sm-12 control-label">DESCRIPTION</label> 
  <div class='col-lg-12'>
  <input required class='form-control' type='text' name='des' id='subject'pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/>
 <br></div> 
<div class="form-group"> <label class="col-sm-12 control-label">YOUTUBE LINKID</label> 
  <div class='col-lg-12'>
  <input required class='form-control' type='url' name='yt' id='subject'/>
 <br></div>  
 <div class="form-group"> <label class="col-sm-12 control-label">ARTS</label> 
  <div class='col-lg-12'>
  <select name="arts" class='form-control'>
        <option value="">Select</option>
        <?php
        foreach($res as $a){
            ?>
            <option value="<?php echo $a['artsid']?>"><?php echo $a['artsname']?></option>
            <?php
        }
        ?>
        </select>
 <br></div> 
 <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                        <input type="hidden" name="mid" value="<?php echo $master_id; ?>">

                            <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </div></div>
</form></section>
</div>



</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>