<?php require_once("header.php");  ?>
<section >
<div class="form-w3layouts">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading"> ADD ARTS </header>

<div class="panel-body">
 <form method="post" action="code/add_arts_exe.php" enctype= multipart/form-data>
<div class="form-group"> <label class="col-sm-3 control-label">ARTSNAME</label>
 <div class='col-lg-6'>
    <input required class='form-control' type='text' name='artsname' id='artsname' pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/></div>
<br></div>
<div class="form-group">
 <label class="col-sm-3 control-label">DESCRIPTION</label> 
 <div class='col-lg-6'>
    <input required class='form-control' type='text' name='description' id='description' pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" title="only alphabets and spaces allowed"/>
</div>
<br>
</div>
<div class="form-group"> 
    <label class="col-sm-3 control-label">IMAGE</label> 
    <div class='col-lg-6'>
        <input class='form-control' type='file' name='image' id='image'/></div>
<br>
</div> 
 <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </div></div>
</form></section>
</div>
</div>
</div>
</section>
<?php require_once("footer.php");  ?>