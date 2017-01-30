<!-- RELEASE THE KRAKEN -->
<?php
    // $core = new Core();
    $employees = $core->employees();
    $department = $core->department();
    $position = $core->position();
    // print_r($employees);
?>
		
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Database</h1>
                    <!-- <?php var_dump($_SESSION); ?> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employees
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="index.php?s=emp&p=add" class="btn btn-primary pull-right">ADD</a>
                            <table width="100%" class="dt table table-striped table-bordered table-hover" id="">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Birthday</th>
                                        <th>Position</th>
                                        <th>Dept.</th>
                                        <th>Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($employees as $emp) { ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars((isset($emp['emp_id'])? $emp['first_name'].' '.$emp['last_name'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['address'])? $emp['address'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['contact'])? $emp['contact'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['email'])? $emp['email'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['birthday'])? $emp['birthday'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['pos_name'])? $emp['pos_name'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['dept_name'])? $emp['dept_name'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($emp['added'])? $emp['added'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td>
                                                <a href="index.php?s=emp&p=edit&id=<?php echo $emp['emp_id']; ?>">EDIT</a>
                                                <a href="index.php?s=emp&p=delete&id=<?php echo $emp['emp_id']; ?>">DELETE</a>
                                            </td>
                                        </tr>
                                    <?php } //else echo 'EMPTY'; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <!-- <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Departments
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Department ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($department as $dept) { ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars((isset($dept['dept_id'])? $dept['dept_id'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($dept['dept_name'])? $dept['dept_name'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                        </tr>
                                    <?php } //else echo 'EMPTY'; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Positions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-striped">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Position ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($position as $pos) { ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars((isset($pos['pos_id'])? $pos['pos_id'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((isset($pos['pos_name'])? $pos['pos_name'] : 'ERROR'), ENT_QUOTES, 'UTF-8'); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            
        <!-- </div> -->
        <!-- /#page-wrapper