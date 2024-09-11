<?php
    class Register extends Controller {
        public $data=[];
        public $token=999;
        
        public function register() {
            $this->model_review = $this->model('UserModel');
            $this->render('element/form-register');
            require_once 'core/checkMail/sendmail.php';
            $email_model = new Email();
            
            if(isset($_POST['register'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST['email_register'];
                    $password = $_POST['password_register'];
                    $name = $_POST['name_register'];
                    $phone=$_POST['phone_register'];
                    $this->data['email']=$email;
                    $this->data['password']=$password;
                    $this->data['name']=$name;
                    $this->data['phone']=$phone;
                    $this->adduser= new UserModel();
                    $check_email=$this->adduser->CheckEmail($email);
                    if($check_email==true) {
                        $sendEmail=$email_model->sendEmail($email);                      
                        $this->token=$sendEmail;     
                        $this->data['token']=$sendEmail;
                        $this->render('element/form-check-email',$this->data);           
                    } else {
                        include('app/views/element/notification/error-register.php');
                    }
                }
            }
            
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST['chech_email'])) {
                        $token_input=$_POST['token-1'].$_POST['token-2'].$_POST['token-3'].$_POST['token-4'].$_POST['token-5'].$_POST['token-6'];
                    
                        if($token_input==$_POST['token']){
                                $this->adduser= new UserModel();
                                $addUser=$this->adduser->AddUser($_POST['email'],$_POST['password'],$_POST['name'],$_POST['phone']);         
                                $this->render('element/notification/register-success'); 
                        }
                        else{
                            $this->data['email']=$_POST['email'];
                            $this->data['password']=$_POST['password'];
                            $this->data['name']=$_POST['name'];
                            $this->data['phone']=$_POST['phone'];
                            $this->data['token']=$_POST['token'];
                            $this->render('element/form-check-email',$this->data);
                            $this->render('element/notification/error-check-email'); 
                        }
                    
                    
                    
                    }
                
                }
            
        }
    }

    $register = new Register();
    $register->register();
?>
