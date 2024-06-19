<?php

include "../Logic/connection.php";
include "../Logic/queries/select.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Check Your Name</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../dashboard/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../dashboard/css/feather.css">
    <link rel="stylesheet" href="../dashboard/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../dashboard/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../dashboard/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../dashboard/css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="../assets/css/style.css" />

</head>

<body class="vertical  light collapsed  ">
    <div class="wrapper">
        <main role="main" class="main-content zero" style="margin-left: 0rem;">
            <div class="container-fluid zero">
                <div class="row justify-content-center zero">
                    <div class="col-12 zero">
                        <div class="check-header p-4 d-flex align-items-center" style="height: 250px">
                            <div class="h">
                                <h2 class="mb-2 page-title text-white">Check if Your Name is on the List</h2>
                                <p class="card-text text-white"> Use this page to quickly find out if your name is
                                    included in the list.
                                    Simply enter your name in the search bar below and hit enter to see if it matches
                                    any entries on the list.
                                    If your name appears, you'll know you're on the list! </p>
                            </div>
                        </div>
                        <div class="row my-4 p-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-1">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Mother Name</th>
                                                    <th>Gender</th>
                                                    <th>DOB</th>
                                                    <th>Big Area</th>
                                                    <th>Small Area</th>
                                                    <th>Record</th>
                                                    <th>Register ID</th>
                                                    <th>Center</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($get_all_user->num_rows > 0) {
                                                        while($all_user = mysqli_fetch_assoc($get_all_user)) {
                                                            $get_user_query = "SELECT * FROM user WHERE user.ID =". $all_user['ID']; 
                                                            $get_user = mysqli_query($conn, $get_user_query);
                                                            $user = mysqli_fetch_assoc($get_user);
                                
                                                            if ($all_user['ROLEID'] != 2){
                                                                echo "
                                                                <tr>
                                                                    <td>
                                                                        <div class='custom-control custom-checkbox'>
                                                                            <input type='checkbox' class='custom-control-input'>
                                                                            <label class='custom-control-label'></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>".$all_user['ID']."</td>
                                                                    <td>".$all_user['FIRSTNAME']." ". $all_user['MIDDLENAME']." ". $all_user['LASTNAME']."</td>
                                                                    <td>".$all_user['MOTHERNAME']."</td>";
                                                                    if ($all_user['GENDER'] == 1){
                                                                        echo "
                                                                            <td>Female</td>
                                                                        ";
                                                                    }else {
                                                                        echo "<td>Male</td>";
                                                                    }
                                                                    echo "
                                                                    <td>".$all_user['DOB']."</td>
                                                                    <td>". $all_user['big_area_name']."</td>
                                                                    <td>". $all_user['small_area_name']."</td>
                                                                    <td>". $all_user['record_name']."</td>
                                                                    <td>".$all_user['REGISTERNUM']."</td>
                                                                    <td>".$all_user['center_name']."</td>  
                                                                </tr>";
                                                            }
                                                            }
                                                        } else {
                                                            echo "0 results";
                                                        }

                                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
    </div>
    </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="../dashboard/js/jquery.min.js"></script>
    <script src="../dashboard/js/popper.min.js"></script>
    <script src="../dashboard/js/moment.min.js"></script>
    <script src="../dashboard/js/bootstrap.min.js"></script>
    <script src="../dashboard/js/simplebar.min.js"></script>
    <script src='../dashboard/js/daterangepicker.js'></script>
    <script src='../dashboard/js/jquery.stickOnScroll.js'></script>
    <script src="../dashboard/js/tinycolor-min.js"></script>
    <script src="../dashboard/js/config.js"></script>
    <script src='../dashboard/js/jquery.dataTables.min.js'></script>
    <script src='../dashboard/js/dataTables.bootstrap4.min.js'></script>
    <script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>