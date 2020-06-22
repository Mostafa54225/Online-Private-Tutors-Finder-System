<?php
    include_once 'Connection.php';
    $datafromusers = $conn->query("SELECT * from users where ID='".$_GET['delid']."'");
    $datafromtutors = $conn->query("SELECT status from tutors where tutor_id='".$_GET['delid']."'");


    $deletefromtutors = "Delete from tutors WHERE tutor_id= '".$_GET['delid']."'";
    $deletefromdemolectures = "Delete from demo_lectures WHERE ID= '".$_GET['delid']."'";
    $deletefromusers = "Delete from users WHERE ID= '".$_GET['delid']."'";
        
    $deletefromtutorquery = $conn->query($deletefromtutors);
    $deletefromdemolecturesquery = $conn->query($deletefromdemolectures);
    $deletefromusersquery = $conn->query($deletefromusers);
    if(!$deletefromtutorquery or !$deletefromdemolecturesquery or !$deletefromusersquery){
            printf("Error: %s\n", mysqli_error($conn));
        }
        
    $statusrow = $datafromtutors->fetch();
    if($statusrow['status']){    
        $row = $datafromusers->fetch();
        $sub = "Tutora.com";
        //the message
        $msg = "your account is deleted from our systems";
        //recipient email here
        $rec =$row['email'];
        //send email
        mail($rec,$sub,$msg);
    }
    else{
        $row = $datafromusers->fetch();
        $sub = "Tutora.com";
        //the message
        $msg = "your request is declined please try again";
        //recipient email here
        $rec =$row['email'];
        //send email
        mail($rec,$sub,$msg);    
    }
    header ("location: Managetutors.php");
    ?>