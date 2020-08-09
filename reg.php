<?php
 
 if(isset($_POST['submit']))
 {  
        $conn = mysqli_connect('localhost','root','','webtech_mid_project','3306');

        $id = $_POST['id'];
        $name = $_POST['name'];
	    	$email = $_POST['email'];
        $password = $_POST['password'];
        $conpassword = $_POST['confirmPassword'];
        $user = $_POST['user'];
        $valid = FALSE;
        
        if(empty($name)||empty($email)||empty($password))
        {
          $valid = FALSE;
            echo "null submission";
        }
        else if(empty($conpassword)||!isset($_POST['user']))
        {
          $valid = FALSE;
          echo "null submission";

        }
        
        
        elseif($password != $conpassword)
        {
          $valid = FALSE;
          echo "Warrning: Password and Confirm Password are not matched!";
          echo "Please, do registration again!";
        }
       

        else {
      
          
              $valid =TRUE;   
            }

        if($valid==TRUE)
        {
          
          $sql = "INSERT INTO users (id, uName, uPassword, uEmail, uType) VALUES ('$id','$name','$password','$email','$user')";

          if(mysqli_query($conn, $sql))
          {
             
              header('location:login.php');
              echo "Insert successfull";
             
          }
             
          else
          {
           
           // $svalid =FALSE;
           echo "Insert unsuccessfull";
           echo '<br>'.mysqli_errno($conn).'<br>';
           print_r(mysqli_error_list($conn));
            
          }
          mysqli_close($conn);
          
         
       }

        else
        {
         
          header('location:registration.html');
        }
      
    
      }
      else{
        header("location: login.php");
      }
?>