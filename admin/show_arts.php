<?php require_once("header.php");  ?>

<section>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Martial Arts</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php 
                    require_once("../connectionclass.php");
                    $qry = "SELECT a.*, p.fk_arts_id as package_fk_arts_id FROM arts a LEFT JOIN package p ON a.artsid = p.fk_arts_id";  
                    $obj = new connectionclass(); 
                    $data = $obj->GetTable($qry);
                    ?>
                    <a class="btn btn-primary" href="add_arts.php">create new</a> 
                    <table class="table table-bordered">
                        <tr> 
                            <th>ARTSNAME</th>  
                            <th>DESCRIPTION</th>  
                            <th>IMAGE</th>  
                            <th></th>
                        </tr> 
                        <?php foreach($data as $row) { ?> 
                            <tr> 
                                <?php $pk_key = $row['artsid']; ?>
                                <td><?php  echo $row['artsname']; ?></td> 
                                <td><?php  echo $row['description']; ?></td> 
                                <td><img width="100" src="../image_arts/<?php  echo $row['image']; ?>" /></td> 
                                <td>
                                    <a class="btn btn-primary btn-xs" href="edit_arts.php?pk_key=<?php  echo $pk_key; ?>">edit</a> 
                                    <?php 
                                    // Check if the foreign key in the package table is not present
                                    if ($row['package_fk_arts_id'] === null) { 
                                    ?>
                                        <a onclick='return confirm("are you sure want to delete")' class="btn btn-primary btn-xs"   
                                           href="code/delete_arts.php?pk_key=<?php  echo $pk_key; ?>">delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table> 
                </section>
            </div>
        </div>
    </div>
</section>
<?php require_once("footer.php");  ?>
