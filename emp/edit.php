<?php

	// $core = new Core();
    $department = $core->department();
    $position = $core->position();
    $employee = $core->employees('view', $_GET['id']);

?>

			<div class="row">
                <div class="col-lg-12">
	                <h2>Edit Employee</h2>
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            Basic Form Elements
                        </div> -->
                        <div class="panel-body">
                            <div class="row">
                            	<?php if (empty($employee)) { echo '<h4>Employee ID missing or not found in our database.</h4>'; } else { ?>
                                    <form action="action.php?s=emp&p=edit&id=<?php echo $employee['emp_id']; ?>" method="POST" role="form">
	                                    <div class="col-lg-6">
	                                    	<!-- <input type="hidden" name="act" value="employee" /> -->
	                                        <div class="form-group">
	                                            <label>First Name</label>
	                                            <input class="form-control" name="first_name" value="<?php echo $employee['first_name']; ?>" required>
	                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
	                                        </div>
	                                        <div class="form-group">
	                                            <label>Last Name</label>
	                                            <input class="form-control" name="last_name" value="<?php echo $employee['last_name']; ?>" required>
	                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
	                                        </div>
	                                        <div class="form-group">
	                                            <label>Address</label>
	                                            <input class="form-control" name="address" value="<?php echo $employee['address']; ?>" required>
	                                        </div>
	                                        <div class="form-group">
	                                            <label>Contact No.</label>
	                                            <input class="form-control" name="contact" value="<?php echo $employee['contact']; ?>" required>
	                                        </div>
	                                        <!-- <div class="form-group">
	                                            <label>File input</label>
	                                            <input type="file">
	                                        </div> -->
	                                        <div class="form-group">
	                                            <label>Email Address</label>
	                                            <input type="email" class="form-control" value="<?php echo $employee['email']; ?>" name="email" required>
	                                        </div>
	                                        <div class="form-group">
	                                            <label>Birthday</label>
	                                            <input type="date" class="form-control" value="<?php echo $employee['birthday']; ?>" name="birthday">
	                                        </div>
	                                        <!-- <div class="form-group">
	                                            <label>Text area</label>
	                                            <textarea class="form-control" rows="3"></textarea>
	                                        </div> -->
	                                        <!-- <div class="form-group">
	                                            <label>Select Department</label>
	                                            <?php foreach ($department AS $dept) { ?>
		                                            <div class="radio">
		                                                <label>
		                                                    <input type="radio" name="" id="optionsRadios1" value="option1" checked>Radio 1
		                                                </label>
		                                            </div>
	                                            <?php } ?>
	                                        </div> -->
	                                        <div class="form-group">
	                                            <label>Department</label>
	                                            <select name="dept_id" class="form-control">
	                                            	<?php foreach ($department AS $dept) {
	                                            		if ($employee['dept_id'] == $dept['dept_id']) {
	                                            			echo '<option selected value=" '.$dept['dept_id'].' ">
	                                            					'. $dept['dept_name'] . '
                                            					  </option>';
			                                            } else if ($employee['dept_id'] != $dept['dept_id']) {
			                                            	echo '<option value=" '.$dept['dept_id'].' ">
	                                            					'. $dept['dept_name'] . '
                                            					  </option>';
                                						}
	                                            	} ?>
	                                            </select>
	                                        </div>
	                                        <div class="form-group">
	                                            <label>Position</label>
	                                            <select name="pos_id" class="form-control">
	                                                <?php foreach ($position AS $pos) {
			                                            if ($employee['pos_id'] == $pos['pos_id']) {
	                                            			echo '<option selected value=" '.$pos['pos_id'].' ">
	                                            					'. $pos['pos_name'] . '
                                            					  </option>';
			                                            } else if ($employee['pos_id'] != $pos['pos_id']) {
			                                            	echo '<option value=" '.$pos['pos_id'].' ">
	                                            					'. $pos['pos_name'] . '
                                            					  </option>';
                                						}
		                                            } ?>
	                                            </select>
	                                        </div>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-6">
	                                        <h4><i class="fa fa-warning"></i>&nbsp;Requires Authentication</h4>
	                                        <div class="form-group">
	                                            <label>Employee's Passcode</label>
	                                            <input class="form-control" type="password" name="passcode" required>
	                                            <p class="help-block">Requires passcode for every employee's protection</p>
	                                        </div>
	                                        <button type="submit" class="btn btn-danger">Update Employee Data</button>
	                                        <a href="index.php" class="btn btn-default">Cancel</a>
                                        </div>
                                    </form>
                                <?php } ?>
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