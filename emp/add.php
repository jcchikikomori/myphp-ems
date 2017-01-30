<?php

	// $core = new Core(); // already defined from index
    $department = $core->department();
    $position = $core->position();

?>

			<div class="row">
                <div class="col-lg-6">
	                <h2>Add Employee</h2>
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            Basic Form Elements
                        </div> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="action.php?s=emp&p=add" method="POST" role="form">
                                    	<!-- <input type="hidden" name="act" value="employee" /> -->
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="first_name" required>
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="last_name" required>
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No.</label>
                                            <input type="number" maxlength="15" class="form-control" name="contact" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <input type="date" class="form-control" name="birthday" required>
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
                                            <select name="dept_id" class="form-control" required>
                                            	<option>---</option>
                                            	<?php foreach ($department AS $dept) { ?>
		                                            <option value="<?php echo $dept['dept_id']; ?>"><?php echo $dept['dept_name']; ?></option>
	                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Position</label>
                                            <select name="pos_id" class="form-control" required>
                                            	<option>---</option>
                                                <?php foreach ($position AS $pos) { ?>
		                                            <option value="<?php echo $pos['pos_id']; ?>"><?php echo $pos['pos_name']; ?></option>
	                                            <?php } ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
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