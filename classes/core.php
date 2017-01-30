<?php

class Core
{

    public $db_connection = null;

    public $errors = array();

    public $messages = array();

	function __construct()
	{
        // configs first
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', 'root');
        define('DB_NAME', 'missu');
        if (!isset($_SESSION)) {session_start();}
        $this->connectDB();
	}

	/**
     * Open the database connection with the credentials
     */
    private function connectDB()
    {
        // create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // change character set to utf8 and check it
        // if (!$this->db_connection->set_charset("utf8")) {
            //return $this->db_connection->error;
            //return false;
        // }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $db_connection = true;
        } else {
            die("Sorry, no database connection.");
        }
    }

    public function testMe()
    {
        // $this->connectDB();
        return "HI FROM CORE!";
    }

    private function collectMsg()
    {
        unset($_SESSION['errors']); unset($_SESSION['messages']);
        array_push($_SESSION['errors'], $this->errors);
        array_push($_SESSION['messages'], $this->messages);
    }

    public function employees($action = NULL, $id = NULL){
        switch($action) {
            case 'add':
                // escaping, additionally removing everything that could be (html/javascript-) code
                $first_name = $this->db_connection->real_escape_string(strip_tags($_POST['first_name'], ENT_QUOTES));
                $last_name = $this->db_connection->real_escape_string(strip_tags($_POST['last_name'], ENT_QUOTES));
                $address = $this->db_connection->real_escape_string(strip_tags($_POST['address'], ENT_QUOTES));
                $contact = $this->db_connection->real_escape_string(strip_tags($_POST['contact'], ENT_QUOTES));
                $email = $this->db_connection->real_escape_string(strip_tags($_POST['email'], ENT_QUOTES));
                $birthday = $this->db_connection->real_escape_string(strip_tags($_POST['birthday'], ENT_QUOTES));
                $pos_id = $this->db_connection->real_escape_string(strip_tags($_POST['pos_id'], ENT_QUOTES));
                $dept_id = $this->db_connection->real_escape_string(strip_tags($_POST['dept_id'], ENT_QUOTES));
                // $passcode = $this->db_connection->real_escape_string(strip_tags($_POST['passcode'], ENT_QUOTES)); // passcode will be auto generated
                // $pseudo_code = rand(10000, 99999);
                $pseudo_code = 12345;
                $passcode = md5($pseudo_code);

                $sql = "SELECT * FROM employees WHERE email = '" . $email . "';";
                $query_check_user_name = $this->db_connection->query($sql);
                if ($query_check_user_name->num_rows == 1) {
                    return false;
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO employees
                            (first_name, last_name, address, contact, email, birthday, pos_id, dept_id, passcode)
                            VALUES 
                            ('".$first_name."','".$last_name."','".$address."','".$contact."','".$email."','".$birthday."','".$pos_id."','".$dept_id."','".$passcode."');";
                            $added_query = $this->db_connection->query($sql);
                            return $added_query;
                }
            break;
            case 'edit':
                if (empty($id) OR $id == NULL) {return false;} // id must be required
                $passcode = md5($_POST['passcode']);
                $sql_check = "SELECT * FROM employees WHERE emp_id = '" . $id . "' AND passcode = '" . $passcode . "';";
                $query_check = $this->db_connection->query($sql_check);
                if ($query_check->num_rows != 1) {
                    return false; // incorrect passcode
                } else {
                    // escaping, additionally removing everything that could be (html/javascript-) code
                    $first_name = $this->db_connection->real_escape_string(strip_tags($_POST['first_name'], ENT_QUOTES));
                    $last_name = $this->db_connection->real_escape_string(strip_tags($_POST['last_name'], ENT_QUOTES));
                    $address = $this->db_connection->real_escape_string(strip_tags($_POST['address'], ENT_QUOTES));
                    $contact = $this->db_connection->real_escape_string(strip_tags($_POST['contact'], ENT_QUOTES));
                    $email = $this->db_connection->real_escape_string(strip_tags($_POST['email'], ENT_QUOTES));
                    $birthday = $this->db_connection->real_escape_string(strip_tags($_POST['birthday'], ENT_QUOTES));
                    $pos_id = $this->db_connection->real_escape_string(strip_tags($_POST['pos_id'], ENT_QUOTES));
                    $dept_id = $this->db_connection->real_escape_string(strip_tags($_POST['dept_id'], ENT_QUOTES));
                    
                    // $sql = "SELECT * FROM employees WHERE email = '" . $email . "';";
                    // $query_check = $this->db_connection->query($sql);
                    // if ($query_check->num_rows == 1) {
                    //     return false; //edit error
                    // } else {
                        $sql = "UPDATE employees SET
                                first_name = '".$first_name."',
                                last_name = '".$last_name."',
                                address = '".$address."',
                                contact = '".$contact."',
                                email = '".$email."',
                                birthday = '".$birthday."',
                                pos_id = '".$pos_id."',
                                dept_id = '".$dept_id."'
                                WHERE emp_id = '".$id."';";
                                $updated_query = $this->db_connection->query($sql);
                                return $updated_query;
                    // }   
                }
            break;
            case 'delete':
                if (empty($id) OR $id == NULL) {return false;} // id must be required
                $passcode = md5($_POST['passcode']);
                $sql_check = "SELECT * FROM employees WHERE emp_id = '" . $id . "' AND passcode = '" . $passcode . "';";
                $query_check = $this->db_connection->query($sql_check);
                if ($query_check->num_rows != 1) {
                    return false; // incorrect passcode
                } else {
                    // write new user's data into database
                    $sql = "DELETE FROM employees
                            WHERE emp_id = '".$id."';";
                            $query = $this->db_connection->query($sql);
                            return $query;
                }
            break;
            case 'view':
                $sql = "SELECT emp.emp_id, emp.first_name, emp.last_name, emp.address,
                        emp.contact, emp.email, emp.birthday, emp.added,
                        pos.pos_id, pos.pos_name, dept.dept_id, dept.dept_name
                        FROM employees AS emp
                        LEFT JOIN position AS pos ON emp.pos_id=pos.pos_id
                        LEFT JOIN department AS dept ON emp.dept_id=dept.dept_id
                        WHERE emp_id = '".$id."' ORDER BY emp.emp_id;";
                $query = $this->db_connection->query($sql);
                // print_r($query);
                if ($query->num_rows == 0) {
                    return false; // empty
                } else {
                    // $this->messages[] = 'Total rows: '.$query->numrows; $this->collectMsg();
                    // return mysqli_fetch_all($query, MYSQLI_ASSOC);
                    return $query->fetch_assoc();
                }
            break;
            default:
                // print_r($this->db_connection);
                // check if user or email address already exists
                $sql = "SELECT emp.emp_id, emp.first_name, emp.last_name, emp.address,
                        emp.contact, emp.email, emp.birthday, emp.added,
                        pos.pos_name, dept.dept_name
                        FROM employees AS emp
                        LEFT JOIN position AS pos ON emp.pos_id=pos.pos_id
                        LEFT JOIN department AS dept ON emp.dept_id=dept.dept_id
                        ORDER BY emp.emp_id;";
                $query = $this->db_connection->query($sql);
                // print_r($query);
                if ($query->num_rows == 0) {
                    return false; // empty
                } else {
                    // $this->messages[] = 'Total rows: '.$query->numrows; $this->collectMsg();
                    return mysqli_fetch_all($query, MYSQLI_ASSOC);
                }
            break;
        }
    }

    public function department($action = NULL, $id = NULL){
        switch($action) {
            case 'add':
            break;
            case 'edit':
            break;
            case 'delete':
            break;
            case 'view':
            break;
            default:
                $sql = "SELECT * from department;";
                $query = $this->db_connection->query($sql);
                // print_r($query);
                if ($query->num_rows == 0) {
                    return false; // empty
                } else {
                    // $this->messages[] = 'Total rows: '.$query->numrows; $this->collectMsg();
                    return mysqli_fetch_all($query, MYSQLI_ASSOC);
                }
            break;
        }
    }

    public function position($action = NULL, $id = NULL){
        switch($action) {
            case 'add':
            break;
            case 'edit':
            break;
            case 'delete':
            break;
            case 'view':
            break;
            default:
                $sql = "SELECT * from position;";
                $query = $this->db_connection->query($sql);
                // print_r($query);
                if ($query->num_rows == 0) {
                    return false; // empty
                } else {
                    // $this->messages[] = 'Total rows: '.$query->numrows; $this->collectMsg();
                    return mysqli_fetch_all($query, MYSQLI_ASSOC);
                }
            break;
        }
    }
}

?>