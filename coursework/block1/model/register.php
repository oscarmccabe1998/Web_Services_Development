<?php
// Include config file
require_once "config.php";
ini_set(‘display_errors’) ;
error_reporting(E_ALL) ;
 
// Define variables and initialize with empty values
$firstname = $surname = $email = $number = $password = $confirm_password = "";
$firstname_err = $surname_err = $email_err = $number_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //validate firstname
    
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter your firstname.";     
    } else{
        $firstname = trim($_POST["firstname"]);
    }

    //validate surname

    if(empty(trim($_POST["surname"]))){
        $firstname_err = "Please enter your surname.";     
    } else{
        $surname = trim($_POST["surname"]);
    }


 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM ShopUsers WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "an account with this email already exsists";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    //validate number

    if(empty(trim($_POST["number"]))){
        $number_err = "Please enter your phone number.";     
    } else{
        $number = trim($_POST["number"]);
    }


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($firstname_err) &&empty($surname_err) &&empty($email_err) && empty($number_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO ShopUsers (firstname, surname, email, mobile_number, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_firstname, $param_surname, $param_email, $param_number, $param_password);
            
            // Set parameters
            $param_firstname = $firstname;
            $param_surname = $surname;
            $param_email = $email;
            $param_number = $number;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("../view/login_form.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}

?>