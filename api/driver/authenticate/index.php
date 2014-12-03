<?php
/**
 * */
if ( isset( $_POST['type'] ) && $_POST['type'] != '' ) {
  // Get type
  $type = $_POST['type'];
  // Include Database handler
  require_once 'include/DB_Functions.php';
  $db = new DB_Functions();
  // response Array
  $response = array( "type" => $type, "success" => 0, "error" => 0 );
  // check for type type
  if ( $type == 'login' ) {
    // Request type is check Login
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gcm_regid = $_POST['gcm_regid'];
    // check for user
    $update = $db->updategcmid( $email, $gcm_regid );
    $user = $db->getUserByEmailAndPassword( $email, $password, $gcm_regid );
    if ( $user != false ) {
      // user found
      // echo json with success = 1
      $response["success"] = 1;
      $response["user"]["name"] = $user["firstname"];
      $response["user"]["email"] = $user["email"];
      $response["user"]["phone"] = $user["phone"];
      $response["user"]["gcm_regid"] = $user["gcm_regid"];
      $response["user"]["did"] = $user["id"];
      echo json_encode( $response );
    } else {
      // user not found
      // echo json with error = 1
      $response["error"] = 1;
      $response["error_msg"] = "Incorrect email or password!";
      echo json_encode( $response );
    }
  }
  else if ( $type == 'chgpass' ) {
      $email = $_POST['email'];
      $newpassword = $_POST['newpas'];
      $hash = $db->hashSSHA( $newpassword );
      $encrypted_password = $hash["encrypted"]; // encrypted password
      $salt = $hash["salt"];
      $subject = "Change Password Notification";
      $message = "Hello User,nnYour Password is sucessfully changed.nnRegards,nLastMile.";
      $from = "hello@lastmile.io";
      $headers = "From:" . $from;
      if ( $db->isUserExisted( $email ) ) {
        $user = $db->forgotPassword( $email, $encrypted_password, $salt );
        if ( $user ) {
          $response["success"] = 1;
          mail( $email, $subject, $message, $headers );
          echo json_encode( $response );
        }
        else {
          $response["error"] = 1;
          echo json_encode( $response );
        }
        // user is already existed - error response
      }
      else {
        $response["error"] = 2;
        $response["error_msg"] = "User not exist";
        echo json_encode( $response );
      }
    }
  else if ( $type == 'forpass' ) {
      $forgotpassword = $_POST['forgotpassword'];
      $randomcode = $db->random_string();
      $hash = $db->hashSSHA( $randomcode );
      $encrypted_password = $hash["encrypted"]; // encrypted password
      $salt = $hash["salt"];
      $subject = "Password Recovery";
      $message = "Hello User,nnYour Password is sucessfully changed. Your new Password is $randomcode . Login with your new Password and change it in the User Panel.nnRegards,nLast Mile.";
      $from = "hello@lastmile.io";
      $headers = "From:" . $from;
      if ( $db->isUserExisted( $forgotpassword ) ) {
        $user = $db->forgotPassword( $forgotpassword, $encrypted_password, $salt );
        if ( $user ) {
          $response["success"] = 1;
          mail( $forgotpassword, $subject, $message, $headers );
          echo json_encode( $response );
        }
        else {
          $response["error"] = 1;
          echo json_encode( $response );
        }
        // user is already existed - error response
      }
      else {
        $response["error"] = 2;
        $response["error_msg"] = "User not exist";
        echo json_encode( $response );
      }
    }
  else if ( $type == 'register' ) {
      // Request type is Register new user
      $fname = $_POST['fname'];
      $carname = $_POST['carname'];
      $carno = $_POST['carno'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $gcm_regid = $_POST['gcm_regid'];
      $subject = "Registration";
      $message = "Hello $fname,nnYou have sucessfully registered to our service.nnRegards,nAdmin.";
      $from = "hello@lastmile.io";
      $headers = "From:" . $from;
      // check if user is already existed
      if ( $db->isUserExisted( $email ) ) {
        // user is already existed - error response
        $response["error"] = 5;
        $response["error_msg"] = "Email already exists";
        echo json_encode( $response );
      }
      else if ( $db->isPhoneExisted( $phone ) ) {
          $response["error"] = 7;
          $response["error_msg"] = "Phone Number Exists";
          echo json_encode( $response );
        }
      else if ( !$db->validEmail( $email ) ) {
          $response["error"] = 6;
          $response["error_msg"] = "Invalid Email ID";
          echo json_encode( $response );
        }
      else {
        // store user
        $user = $db->storeUser( $fname, $carname, $carno, $email, $phone, $gcm_regid, $password );
        if ( $user ) {
          // user stored successfully
          $response["success"] = 1;
          $response["user"]["fname"] = $user["firstname"];
          $response["user"]["email"] = $user["email"];
          $response["user"]["phone"] = $user["phone"];
          $response["user"]["gcm_regid"] = $user["gcm_regid"];
          $response["user"]["id"] = $user["id"];
          mail( $email, $subject, $message, $headers );
          echo json_encode( $response );
        } else {
          // user failed to store
          $response["error"] = 1;
          $response["error_msg"] = "JSON Error occured in Registartion";
          echo json_encode( $response );
        }
      }
    } else {
    $response["error"] = 3;
    $response["error_msg"] = "JSON ERROR";
    echo json_encode( $response );
  }
} else {
  echo "hello";
}
?>
