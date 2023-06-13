<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//FOR SERVER SIDE PROCESSING
define("SYS_PATH", "http://localhost/racing/");
define("TITLE_SEP", " | ");
//define("APP_PATH", SYS_PATH . "newapp/");
define("DB_HOST", "localhost");
define("DB", "racing");
define("DB_USER", "root");
define("DB_PASS", "");
$MONTH_YEAR=date("F/Y");
$currLink=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
define("CURR_LINK",$currLink);
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
function data_clean($input) {
    return preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $input));
}
function hashPassword($pass) {
    return password_hash($pass, PASSWORD_DEFAULT);
}
$YMDH = date("Y-m-d H:i:s");
//timezone
$VIEW = isset($_GET['v']) ? $_GET['v'] : '';
if ($VIEW === 'off') {
    session_destroy();
    header('Location: ' . SYS_PATH.'index.php');
}
//js redirect time value
$timeOut = 3100;
//date format
function dateCon($date) {
    $old_date_timestamp = strtotime($date);
    $new_date = date('M j Y', $old_date_timestamp);
    return $new_date;
}
function dateConLong($date) {
    $old_date_timestamp = strtotime($date);
    $new_date = date('M j Y g:i a', $old_date_timestamp);
    return $new_date;
}

function MailUserExists($mail) {
    try {
        $data = [];
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM  users WHERE  email='$mail'";
        $q = $conn->query($sql) or die("failed!");

        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return @$data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    //$conn = null;
}
function insStudent($username, $email, $password, $timestamp, $level, $approved, $phone, $link,$com,$fname,$mname,$lname,$idno,$staffno,$table) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO $table (username,email,password,timestamp,level,approved,phone,link,com,fname,mname,lname,idno,staffno)
    VALUES (:username,:email,:password,:timestamp,:level,:approved,:phone,:link,:com,:fname,:mname,:lname,:idno,:staffno)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':timestamp', $timestamp);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':approved', $approved);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':link', $link);
        //$stmt->bindParam(':fullnames', $fullnames);
        $stmt->bindParam(':com', $com);
        //new
       // :fname,:mname,:lname,:idno,:staffno
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':mname', $mname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':idno', $idno);
        $stmt->bindParam(':staffno', $staffno);
        //end new
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}

//inset user state
function insUserstate($user_id, $user_state, $user_state_date, $table) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO $table (user_id,user_state,user_state_date)
    VALUES (:user_id,:user_state,:user_state_date)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':user_state', $user_state);
        $stmt->bindParam(':user_state_date', $user_state_date);
        $stmt->execute();
        //$last_id = $conn->lastInsertId();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    $conn = null;
}

function updateUserOnCreation($user_id, $table) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE $table
 SET link=:link WHERE user_id=:user_id";
        $q = $conn->prepare($sql);
        $q->execute(array(':user_id' => $user_id, ':link' => $user_id));
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
 //$conn = null;
}

//get user data
function getUserData($id) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE user_id = :user_id";
        $q = $conn->prepare($sql);
        $q->execute(array(':user_id' => $id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    $conn = null;
}

//get user data by username
function UserDataByName($username) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE username = :username";
        $q = $conn->prepare($sql);
        $q->execute(array(':username' => $username));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}

function InsRawPass($user_id, $raw_pass, $table) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO $table (user_id,raw_pass)
    VALUES (:user_id,:raw_pass)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':raw_pass', $raw_pass);
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}

//get raw pass data
function getRawPassData($id) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM raw_pass WHERE  user_id =:user_id ";
        $q = $conn->prepare($sql);
        $q->execute(array(':user_id' => $id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}


//get race data
function getRacedata($id) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM races WHERE  race_id=:race_id";
        $q = $conn->prepare($sql);
        $q->execute(array(':race_id' => $id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}
//add job
function insRace($race_tile, $city, $race_cat,$race_des,$sys_date,$user_id,$status) {
    try {
$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO races (race_tile,city,race_cat,race_des,sys_date,user_id,status)
VALUES (:race_tile,:city,:race_cat,:race_des,:sys_date,:user_id,:status)");
$stmt->bindParam(':race_tile', $race_tile);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':race_cat', $race_cat);
$stmt->bindParam(':race_des', $race_des);
$stmt->bindParam(':sys_date', $sys_date);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':status', $status);

        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}


function insRaceApp($cover, $cv, $sys_date,$status,$race_id,$user_id) {
    try {
$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO race_app (cover,cv,sys_date,status,race_id,user_id)
VALUES (:cover,:cv,:sys_date,:status,:race_id,:user_id)");
$stmt->bindParam(':cover', $cover);
$stmt->bindParam(':cv', $cv);
$stmt->bindParam(':sys_date', $sys_date);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':race_id', $race_id);
$stmt->bindParam(':user_id', $user_id);

        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;F
}

//insert

function updateContraLogo($id,$mail_file) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE  race_app SET cv=:cv WHERE race_id=:race_id";
        $q = $conn->prepare($sql);
        $q->execute(array(':cv' => $mail_file, ':race_id' => $id));
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    $conn = null;
}


//get booking data
function getBookingData($id,$user_id) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM race_app WHERE  race_id=:race_id AND user_id=:user_id";
        $q = $conn->prepare($sql);
        $q->execute(array(':race_id' => $id,':user_id' => $user_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
  //$conn = null;
}

function getBookingData2($id, $user_id) {
    try {
        $data = [];
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM  race_app WHERE race_id='$id' AND user_id='$user_id'";
        $q = $conn->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return @$data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    $conn = null;
}


function ifBooked($id,$user_id) {
    try {
        $data = [];
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM  race_app WHERE race_id=$id AND user_id='$user_id'";
        $q = $conn->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return @$data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    $conn = null;
}
//aaprove race by admin
function appAdminRace($id,$status) {
try {
$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE  races SET status=:status WHERE race_id=:race_id";
$q = $conn->prepare($sql);
$q->execute(array(':status' => $status, ':race_id' => $id));
return true;
} catch (PDOException $e) {
echo "Error: " . $e->getMessage();
return false;
}
//$conn = null;
}


//generate random string for forgot password
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuv!#$wxyzABCDE^FGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//insert Complain
function insComp($email, $des, $sys_date, $table) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB . "", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO $table (email,des,sys_date)
    VALUES (:email,:des,:sys_date)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':des', $des);
        $stmt->bindParam(':sys_date', $sys_date);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    $conn = null;
}
