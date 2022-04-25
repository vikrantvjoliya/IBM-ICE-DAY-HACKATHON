<?php

session_start();
error_reporting(0);
class TRAP{
  private $username = "admin";
  private $passwd = 'password';
  private $getusername ;
  private $getpasswd;
  private $msgcode = 0;
  function __construct($u,$p){

    $this->getusername = $u;
    $this->getpasswd = $p;

  }
  private function auth(){
    if($this->username == $this->getusername){
      if($this->passwd == $this->getpasswd){
        $this->msgcode = 1;
        $_SESSION['username'] = $this->getusername;
      }else{
        $this->msgcode = 21;
      }
    }else{
      $this->msgcode = 31;

    }
    return $this->msgcode;
  }

  public function call(){
    switch ($this->auth()) {

      case 1:
      header("location/data/");
      break;

      case 21:
      header("location:index.php$msg=21");
      break;

      case 31:
      header("location:index.php$msg=31");
      break;

      default:
      header("location:index.php");
      break;
    }
  }
}

if(isset($_POST['login'])){
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $obj = new TRAP($user,$pass);
  $obj->call();

}else{
  header("location:index.php");
}

?>
