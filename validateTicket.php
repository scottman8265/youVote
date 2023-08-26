<?php
    include("connect.php");

    $errors = array();
    $data = array();
    $ticketNum = "";


    $ticketNum = $_POST['ticketNum'];
    $usedTicket = false;

    $validation = $conn->prepare("select ticketNum from voiceVotes where ticketNum = ?");
    $validation->bind_param("s", $ticketNum);
    $validation->execute();
    $validation->store_result();
    $validation->bind_result($usedTicket);
    $validation->execute();
    $validation->fetch();

   
    if ($errors) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
        $data['success'] = true;
    }
    
    echo json_encode($data);
    
    

