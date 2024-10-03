<?php require_once("header.php"); ?>
<?php require_once("../connectionclass.php");

$obj = new connectionclass();
$qry = "SELECT * FROM arts";  
$data = $obj->GetTable($qry);
?>

<section>
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> ADD MASTER </header>
                    <div class="panel-body">
                        <form method="post" action="code/master_exe.php">
                            <table class="table">
                                <tr>
                                    <td><label>ARTS NAME</label></td>
                                    <td>
                                        <select required class='form-control' name='arts' id='fk_art_id'>
                                            <option value="">Select</option>
                                            <?php foreach ($data as $row): ?>
                                                <option value="<?php echo $row['artsid']; ?>"><?php echo $row['artsname']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>NAME</label></td>
                                    <td><input required class='form-control' pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed" type='text' name='name' id='full_name'/></td>
                                </tr>
                                <tr>
                                    <td><label>GENDER</label></td>
                                    <td>
                                        <select required class='form-control' name='gender' id='gender' >
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Transgender">Transgender</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Profile</label></td>
                                    <td><input required class='form-control' type='text' name='profile' id='profile' pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"/></td>
                                </tr>
                                <tr>
                                    <td><label>PHONENO</label></td>
                                    <td><input required class='form-control' pattern="[9876][0-9]{9}" title="Enter a valid mobile number" type='text' name='phone' id='phone'/></td>
                                </tr>
                                <tr>
                                    <td><label>EMAIL ID</label></td>
                                    <td><input required class='form-control' type='email' name='emailid' id='emailid' pattern="[^\s@]+@[^\s@]+\.[^\s@]+"/></td>
                                </tr>
                                <tr>
                                    <td><label>PASSWORD</label></td>
                                    <td><input required class='form-control' type='password' pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one digit" name='password' id='password'/></td>
                                </tr>
                            </table>
                            <div class="w3l-form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<?php require_once("footer.php"); ?>
