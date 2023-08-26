<?php
include("connect.php");
session_start();

$vote1 = "";
$vote2 ="";
$vote3 = "";
$vote = array();
    
//    $_SESSION['ticketNumber'] = $_POST['ticketNum'];
    
    $process = $conn->prepare("UPDATE voiceVotes set score = ? where ticketNum = ?");

    $ticketNums = $conn->prepare("select ticketNum from voiceVotes group by ticketNum");
    $ticketNums->execute();
    $ticketNums->store_result();
    $ticketNums->bind_result($ticketNum);

    while ($ticketNums->fetch()) {


        $score = 0;
        if ($ticketNum != 9551 or $ticketNum != 1 or $ticketNum != 2222 or $ticketNum != 1111 or $ticketNum != 9161) {
            $score = ($submit['score'] * .1);
            $process->bind_result("ss", $score, $ticketNum);
            $process->execute();
            $process->store_result();
            $process->fetch();
        }
        if ($ticketNum == 9551 or $ticketNum == 1 or $ticketNum == 2222 or $ticketNum == 1111 or $ticketNum == 9161) {
            $score = ($submit['score'] * 3);
            $process->bind_result("ss", $score, $ticketNum);
            $process->execute();
            $process->store_result();
            $process->fetch();
        }
        $process->bind_param("ssss", $submit['number'], $submit['ticketNum'], $score, $submit['name']);
        $process->execute();


    }
    
    
/*    foreach ($vote as $enter) {
    $enterVote =$conn->prepare("insert into voiceVotes (contestant, ticketNum) values (?, ?)");
    $enterVote->bind_param("ss", $enter, $ticketNum);
        $enterVote->execute();
    }*/
    


/*echo json_encode($data);*/


