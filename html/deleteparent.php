<?php
    include_once 'Connection.php';
    $data = $conn->query("SELECT * FROM users where role_id=2");

    $deletefromusers = "Delete from users WHERE ID= '".$_GET['delid']."'";
        
    try {
        $deletefromusersquery = $conn->query($deletefromusers);
        if(!$deletefromusersquery){
            printf("Error: %s\n", mysqli_error($conn));
        }
        header ("location: ManageParents.php");    
    } catch(PDOException $e){
        $e->getMessage();
    }
    
    ?>