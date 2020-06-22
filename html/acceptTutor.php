<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "tutora";
    // Create connection
    $conn = mysqli_connect($host,$user,$pass,$db);
    $data = mysqli_query($conn,"SELECT * from users where ID= '".$_GET['acceptid']."'");
    if (!$data) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $select = "UPDATE tutors 
    SET 
        status = 1
    WHERE
        tutor_id= '".$_GET['acceptid']."'";
        
    $query = mysqli_query($conn,$select) or die($select);
    if(!$query){
            printf("Error: %s\n", mysqli_error($conn));
        }
    $row = mysqli_fetch_array($data);
    $sub = "Tutora.com";
    //the message
    $msg = "congratulation you request is accepted";
    //recipient email here
    $rec =$row['email'];
    //send email
    mail($rec,$sub,$msg);

    
    header ("location: Managetutors.php");
    ?>