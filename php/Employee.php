<?php
require_once("./php/Database.php");
class Employee {
    private $connect;
    private $name;
    private $employeeId;
    private $profile;
    private $email;
    private $password;
    private $profileUniqName;
    private $profileTmpName;
    private $coverUniqName;
    private $coverTmpName;

    public function __construct(){
        $db = new Database();
        $this->connect = $db->connection();
    }
    protected function pre($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    protected function validation($data){
      $data = htmlspecialchars($data);
      $data = trim($data);
      $data = stripslashes($data);
      return $data;  
    }
    public function registration($post,$docs){
        $this->name = $this->validation($post['name']);
        $this->email = $this->validation($post['email']);
        $this->employeeId = $this->validation($post['employeeId']);
        $sql = "select * from employee where email = '$this->email'";
        $count = $this->connect->query($sql);
        $this->password = password_hash($this->validation($post['password']),PASSWORD_BCRYPT);

        $this->profile = $docs['photo'];
        $this->profileUniqName = uniqid()."_".$this->validation($this->profile['name']);
        $this->profileTmpName = $this->profile['tmp_name'];
        

        if($count->num_rows === 0){
            move_uploaded_file($this->profileTmpName,"./uploads/".$this->profileUniqName);

            $sql = "insert into employee(name,email,password,employee_id,photo) values ('$this->name','$this->email','$this->password','$this->employeeId','$this->profileUniqName')";

            $result = $this->connect->query($sql);

            if($result){
                return "Registration Successfull, thanks now you can login";
            }else {
                return "Registration Failed, please try again";
            }
        }else{
            return "Already users used this gmail, please try another gmail for registration";
        }
    }
    public function loginData($post){
        $email = $post['email'];
        $password = $post['password'];

        $sql = "select * from employee where email = '$email'";
        $count = $this->connect->query($sql);
        $data = $count->fetch_object();

        if($count->num_rows && password_verify($password,$data->password)){
            $_SESSION['employee'] = $data->email;
            header('location:./home.php');
        }else{
            return "Email and Password doesn't match";
        }
    }
    public function logout(){
        if($_SESSION['employee']){
            session_unset();
        }
        header("location:./index.php");
    }
    public function forgot($post){
        $email = $this->validation($post['email']);
        $old_pwd = $this->validation($post['old_pwd']);
        $new_pwd = $this->validation($post['new_pwd']);

        $sql = "select * from employee where email = '$email'";
        $count = $this->connect->query($sql);
        $data = $count->fetch_object();

        if($count->num_rows && password_verify($old_pwd,$data->password)){
            $pwd = password_hash($new_pwd,PASSWORD_BCRYPT);
            $query = "update employee set password = '$pwd' where email = '$email'";
            $res = $this->connect->query($query);
            if($res){
                return "Your password set to latest password";
            }else{
                return "Sorry,Your password not set to latest password";
            }
        }else{
            return "Email and Password doesn't match";
        }
    }
    public function employeeInfo($email){
        $sql = "select * from employee where email = '$email'";
        $count = $this->connect->query($sql);
        $data = $count->fetch_object();
        return $data;
    }
    public function profileUpdate($post,$docs){
        $id = $post['id'];
        $name = $post['name'];
        $employee_id = $post['employeeId'];
        $photo = $docs['photo'];
        $this->profileUniqName = $this->validation($photo['name']);
        $this->profileTmpName = $photo['tmp_name'];
        $old_photo = $post['old_photo'];

        $sql = "update employee set name='$name',employee_id='$employee_id' where id = '$id'";
        $this->connect->query($sql);

        if(empty($this->profileUniqName)){
            $sql = "update employee set photo='$old_photo' where id = '$id'";
            $this->connect->query($sql);
        }else{
            $picture_name = uniqid()."_".$this->profileUniqName;
            move_uploaded_file($this->profileTmpName,"./uploads/".$picture_name);

            $sql = "update employee set photo='$picture_name' where id = '$id'";
            $this->connect->query($sql);
        }
        return "Your Profile Update Successfully Done, Check after page reload";
    }
    public function getAllUsers(){
        $data = [];
        $sql = "select * from employee";
        $count = $this->connect->query($sql);
        while($item = $count->fetch_object()){
            $data[] = $item;
        }
        return $data;
    }
    public function postAnalyticsData($post){
        $name = $post['name'];
        $month_year = explode('-',$_POST['month']);
        $month = $month_year[1];
        $year = $month_year[0];
        $taka = $post['taka'];
        
        $month_name = '';
        switch($month){
            case "01":
                $month_name = "January";
                break;
            case "02":
                $month_name = "February";
                break;
            case "03":
                $month_name = "March";
                break;
            case "04":
                $month_name = "April";
                break;
            case "05":
                $month_name = "May";
                break;
            case "06":
                $month_name = "June";
                break;
            case "07":
                $month_name = "July";
                break;
            case "08":
                $month_name = "August";
                break;
            case "09":
                $month_name = "September";
                break;
            case "10":
                $month_name = "October";
                break;
            case "11":
                $month_name = "November";
                break;
            default:
            $month_name = "December";
        }
        $sql = "insert into analytics_2023(Name,Year,$month_name) values ('$name','$year','$taka')";
        $this->connect->query($sql);
        return true;
    }
    public function usersAnalyticsInfo(){
        $sql = "select * from analytics_2023";
        $count = $this->connect->query($sql);
        $data = [];
        while($item = $count->fetch_object()){
            $data[] = $item;
        }
        return $data;
    }
    public function deleteWithId($dbName,$id){
        $sql = "delete from $dbName where id = $id";
        $this->connect->query($sql);
        return true;
    }
}