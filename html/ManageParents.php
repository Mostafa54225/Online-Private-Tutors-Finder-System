<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Parents</title>
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/Manageparents.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="../CSS/profilepictureedit.css"/>
</head>
<body>
    <header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../ProjectSW/html/homePage.html">Admin</a></li>
              
              <li class="breadcrumb-item active" >View parent</li>                
            
              </li>
            </ol>
        </nav>
    </header>
    <div class="container col-10" id="show">
        <h1 id="Requestedtutors">View Parent</h1>
          <table class="table table-hover">
            <thead class="bg-dark">
              <tr id="tableheader">
                <th>ParentName</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              include_once 'Connection.php';                                                                                                      
                
              $data = $conn->query("SELECT * FROM users where role_id=2");
                    
              while($row = $data->fetch()){ ?>                            
                <tr>                        
                   <td> <?php echo $row['fname']." " .$row['lname']; ?></td>
                   <td> <?php echo $row['phone_number']; ?></td>
                   <td> <?php echo $row['email']; ?></td>
                   <td><img src="<?php echo "../Images/".$row['photo_path'] ?>" height="40px" width="40px"></td>
                  <td>
                  <button type='submit' onClick='Del(<?php echo $row['ID']; ?>)'class='btn btn-danger' id='$id'><i class='far fa-trash-alt'></i></button>
                  </td>
                       
                </tr>
                  <?php } ?>
          </tbody>
        </table>
    </div>

        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
          crossorigin="anonymous"
        ></script>
        <script
          src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous"
        ></script>
</body>
</html>