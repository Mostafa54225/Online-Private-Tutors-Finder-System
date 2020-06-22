<html>
<head>
    <meta charset="UTF-8">

    <title>Manage Tutors</title>
    <script src="../JS/jquery-3.4.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="../JS/Managetutor.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Manage.css" type="text/css">
    <link rel="stylesheet" href="../CSS/profilepictureedit.css" type="text/css">
</head>

<body>
    <header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../ProjectSW/html/homePage.html">Admin</a></li>
              <li class="breadcrumb-item active">Manage tutor</li>
              <li class="breadcrumb-item">
              <button type="button" class="btn btn-primary" onclick="myFunction()"><i class="fas fa-exchange-alt"></i></button>
              </li>
              <li class="breadcrumb-item active" >View tutor</li>                
           
              </li>
            </ol>
        </nav>
    </header>    
    <div class="container col-10" id="managee">
        <h1 id="Requestedtutors">Manage Tutor</h1>
        <table class="table table-hover" id='table' name="table" method="post" action=''>
            <thead class="bg-dark">
                <tr id="tableheader">
                    <th>TutorName</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                                                                                                                             
                    include_once 'Connection.php';
                    $data = $conn->query("SELECT tutors.tutor_id,tutors.CV,tutors.status, users.ID,users.fname,users.lname,users.phone_number,users.email,users.photo_path FROM tutors INNER JOIN users ON tutors.tutor_id=users.ID");
                 ?>
                 <?php
                    while($row = $data->fetch()){
                        
                    $stat=$row['status'];
                    $id = $row['tutor_id'] ;
                    if(!$stat){
                ?>                            
                <tr>
                 
                <td> <?php echo $row['fname'].$row['lname']; ?></td>
                <td> <?php echo $row['phone_number']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td><img src="<?php echo "../Images/".$row['photo_path'] ?>" height="50px" width="50px"></td>
                <td>
                <button type='submit' onClick='Accept(<?php echo $row['tutor_id']; ?>)' class='btn btn-success' id='$id'><i class='fas fa-edit'></i></button>
                <button type='submit' onClick='Del(<?php echo $row['tutor_id']; ?>)'class='btn btn-danger' id='$id'><i class='far fa-trash-alt'></i></button>
                </td>                                 
                </tr>
                <?php
           
                }
                }
                ?>
          
            </tbody>
        </table>
    </div>
        
    
    <div class="container col-10" id="show">
        <h1 id="Requestedtutors">View Tutor</h1>

        <table class="table table-hover">
            <thead class="bg-dark">
                <tr id="tableheader">
                    <th>TutorName</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $conn->query("SELECT tutors.tutor_id,tutors.status, users.ID,users.fname,users.lname,users.phone_number,users.email,users.photo_path FROM tutors INNER JOIN users ON tutors.tutor_id=users.ID");
                ?>
                <?php
                while($row = $data->fetch()){
                    $stat=$row['status'];
                    $id = $row['tutor_id'] ;
                    if($stat){ ?>                            
                        <tr>                        
                        <td> <?php echo $row['fname'].$row['lname']; ?></td>
                        <td> <?php echo $row['phone_number']; ?></td>
                        <td> <?php echo $row['email']; ?></td>
                        <td><img src="<?php echo "../Images/".$row['photo_path'] ?>" height="50px" width="50px"></td>
                        <td>
                        <button type='submit' onClick='Del(<?php echo $row['tutor_id']; ?>)'class='btn btn-danger' id='$id'><i class='far fa-trash-alt'></i></button>
                        </td> 
                        </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" type="text/javascript">
</script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" type="text/javascript">
</script>
</body>
</html>