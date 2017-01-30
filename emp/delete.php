<?php

	// $core = new Core();
    // $department = $core->department();
    // $position = $core->position();
    $employee = $core->employees('view', $_GET['id']);

?>

			<div class="row">
                <div class="col-lg-6">
	                <h2><i class="fa fa-warning"></i>&nbsp;Warning</h2>
                    <div class="panel panel-danger">
                        <!-- <div class="panel-heading">
                            Basic Form Elements
                        </div> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	<?php if (empty($employee)) { echo '<h4>Employee ID missing or not found in our database.</h4>'; } else { ?>
	                                    <form action="action.php?s=emp&p=delete&id=<?php echo $employee['emp_id']; ?>" method="POST" role="form">
	                                    	<h4>Requires Authentication</h4>
	                                    	<p>Deleting employee #<b><?php echo $employee['emp_id'] .': '. $employee['first_name'] .' '. $employee['last_name']; ?> </b>?</p>
											<div class="form-group">
	                                            <label>Employee's Passcode</label>
	                                            <input class="form-control" type="password" name="passcode" required>
	                                            <p class="help-block">Requires passcode for every employee's protection</p>
	                                        </div>
	                                        <button type="submit" class="btn btn-danger">Confirm</button>
	                                        <a href="index.php" class="btn btn-default">Cancel</a>
	                                    </form>
                                    <?php } ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->