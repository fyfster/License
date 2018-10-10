<?php
require('/../Mail/class.phpmailer.php');

class Mailer{
  private $mailDetails;
  
  public function __construct(){
    $this->mailDetails = new PHPMailer();
    $this->mailDetails->CharSet = 'UTF-8';
    $this->mailDetails->IsSMTP();
    $this->mailDetails->Host = mailHost;
    $this->mailDetails->SMTPSecure = 'tls';
    $this->mailDetails->Port = 587;
    $this->mailDetails->SMTPDebug  = 1;
    $this->mailDetails->SMTPAuth = true;
    $this->mailDetails->Username = 'licenta.primarie@gmail.com';
    $this->mailDetails->Password   = 'licenta666';
    $this->mailDetails->SetFrom(mailFrom, "");
  }
  
  public function SendMail(){
    $this->mailDetails->send();
  }
  
  public function setTo($aTo){
    $this->mailDetails->AddAddress($aTo, '');
  }
  
  public function setSubject($aSubject){
    $this->mailDetails->Subject = $aSubject;
  }
  
  public function setMessage($aMessage){
    $theMessage = "";
    $theMessage .= $aMessage;
    $this->mailDetails->Body = $theMessage;
  }

}
?>