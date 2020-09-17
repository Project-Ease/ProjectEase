<?php
      $db = mysqli_connect("localhost", "root", "", "ease_project"); //Connection variable

if(mysqli_connect_errno()) 
{
    echo "Failed to connect: " . mysqli_connect_errno();
}


switch($_POST['designation']) {
        case "student":
                          $email = mysqli_real_escape_string($db,$_POST['email']);
                          $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
                          
                          $sql = "SELECT id FROM student WHERE student_email = '$email' and  student_password = '$mypassword'";
                          $result = mysqli_query($db,$sql);
                          // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                          // $active = $row['active'];
                          
                          $count = mysqli_num_rows($result);
                            
                          if($count == 1) {
                              echo("location: welcome.php");
                          }else {
                             echo "Your Login Name or Password is invalid";
                          }
                        break;
        case "admin":
                          $email = mysqli_real_escape_string($db,$_POST['email']);
                          $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
                          
                          $sql = "SELECT id FROM admin WHERE admin_email = '$email' and  admin_password = '$mypassword'";
                          $result = mysqli_query($db,$sql);
                          // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                          // $active = $row['active'];
                          
                          $count = mysqli_num_rows($result);
                            
                          if($count == 1) {         
                           echo("location: welcome.php");
                          }else {
                             echo "Your Login Name or Password is invalid";
                          }
                        break;
        case "teachers":
                      $email = mysqli_real_escape_string($db,$_POST['email']);
                      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
                      
                      $sql = "SELECT id FROM teachers WHERE teacher_email = '$email' and  teacher_password = '$mypassword'";
                      $result = mysqli_query($db,$sql);
                      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                      // $active = $row['active'];
                      
                      $count = mysqli_num_rows($result);
                        
                      if($count == 1) 
                      {
                        echo("location: welcome.php");
                      }else {
                         echo "Your Login Name or Password is invalid";
                      }
                      break;
      default:
                    echo "Incorrect";
                    break;
    }
?>

