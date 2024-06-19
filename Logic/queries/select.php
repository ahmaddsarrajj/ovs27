<?php

    $list_query = "SELECT * FROM list"; 
    $get_list =  mysqli_query($conn,$list_query);
  
    $big_area_query = "SELECT * FROM bigarea"; 
    $get_big_area =  mysqli_query($conn,$big_area_query);

    $get_celebration_query = "SELECT * from celebration where ID = 1";
    $get_celebration =  mysqli_query($conn, $get_celebration_query);

    $get_election_program_query = "SELECT * FROM electionprogram";
    $get_election_program = mysqli_query($conn, $get_election_program_query);

    $get_all_user_query = "SELECT user.*, register.REGISTERNUM, center.NAME as center_name, smallarea.NAME AS small_area_name, bigarea.NAME AS big_area_name, record.NAME AS record_name
    FROM user
    JOIN center ON user.CENTERID = center.ID
    JOIN register ON user.REGISTERID = register.ID
    JOIN record ON register.RECORDID = record.ID
    JOIN smallarea ON record.SMALLAREAID = smallarea.ID
    JOIN bigarea ON smallarea.BIGAREAID = bigarea.ID";  
    $get_all_user = mysqli_query($conn, $get_all_user_query);

    $get_nom_request_query = " SELECT * FROM  nomrequest";
    $get_nom_request = mysqli_query($conn, $get_nom_request_query);


?>