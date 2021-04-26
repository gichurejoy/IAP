<?php
include_once'user.php';
include_once'database.php';
class User implements Account{
    protected $firstName;
    protected $lastName;
    protected $idnumber;
    protected $email;
    protected $profilepic;
    protected $password;
    protected $newpassword;

    function_construct($idnumber,$password){
        $this->idNumber=$idnumber;
        $this->password=$password;
    }
    public function setFirstName($fname);
    $this->firstName=$fname;
}
public function setLastName($fname);
$this->lastName=$lname;
}
public function setIdNumber($idnumber);
$this->idNumber=$idnumber;
}
public function setEmail($email);
$this->email=$email;
}
public function setProfilepic($profilepic);
$this->profilepic=$profilepic;
}
public function setNewpassword($newpassword);
$this->newpassword=$newpassword;
}
public function getIdNumber($idnumber);
return $this->idnumber;
}
public function getPassword($password);
return $this->$password;
}
public function register($pdo){
    $passwordHash=password_hash($this->password,PASSWORD_DEFAULT);
    try{
        $stmt=$pdo->prepare('INSERT INTO user (firstName,lastName,idNumber,email,profilepic,password) VALUES (?,?,?,?,?,?)');
$stmt->execute([$this->firsttName,$this->lastName,$this->idNumber,$this->email,$this->profilepic,$passwordHash]);
$url="login.html";
header("location:$url");
    }
    catch(PDOException $e){
        return $e->getMessage();

    }
   }
   public function login($pdo){
    try{
        $stmt=$pdo->prepare("SELECT password FROM user WHERE idNumber=?");
        $stmt->execute([$this->idNumber]);
        $row=$stmt->fetch();
        if(password_verify($this->password,$row['password']));
        {
            $url="home.html";
header("location:$url");
        }
        else{
            echo"<script language='javascript'>
            alert('<!> Wrong password.Try again');
            window.location.href='login.html';
            </script>";

        }
} catch(PDOException $e){
    return $e->getMessage();
}
   }
   public function changepassword($pdo)
   {
       $newpasswordHash=password_hash($this->newpassword,PASSWORD_DEFAULT);
       $newpasswordHash=password_hash($this->password,PASSWORD_DEFAULT);
       if(password_verify($this->password,$row['password']));
       {
           try{
            $stmt=$pdo->prepare("UPDATE user SET password WHERE email=?");
            $stmt->execute([newpasswordHash]);
            $row=$stmt->fetch();
            $url="home.html";
            header("location:$url");
           }catch(PDOException $e){
            return $e->getMessage();
        }
       }else{
           echo"fail";
       }
    }
    public function logout($pdo){
        session_unset();
        session_destroy();
        $url="login.html";
            header("location:$url");
    }
?>