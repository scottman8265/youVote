<link rel="stylesheet" href="stylez.css"/>
<script src="javascript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>

<?php
    include("connect.php");
    session_start();
    $processTime = microtime(true);
    $oddCount = 0;
    $evenCount = 0;
    $oddPerson = 0;
    $evenPerson = 0;
    $oddPercent = 0;
    $evenPercent = 0;
    $totalCount = 0;
    $count = 0;

    /*prepares voting query*/
    $votes = $conn->prepare("select a.contestant, sum(a.score), b.contestantName from voiceVotes as a left join voiceContestants as b on a.contestant = b.contestantNum group by contestant");
    $votes->execute();
    $votes->store_result();
    $votes->bind_result($contestant, $score, $name);
    $originalScore = 0;

    $ticketCount = $conn->prepare("select ticketNum from voiceVotes group by ticketNum");
    $ticketCount->execute();
    $ticketCount->store_result();
    $ticketCount->bind_result($ticketCountNumber);

    $team = $conn->prepare("select sum(a.score), b.team from voiceVotes as a left join voiceContestants as b on a.name = b.contestantName group by team");
    $team->execute();
    $team->store_result();
    $team->bind_result($score, $teamComp);
    while ($team->fetch()) {
     echo $teamComp .":  ";
        echo $score ."</br>";
    }

    //    gets number of individual tickets used
    while ($ticketCount->fetch()) {
        $count++;
        echo $ticketCountNumber ."</br>";
    }


?>


<div id="results" style="position:relative;"  data-mini="true">
    <ul data-role="listview" data-theme="b">

        <?php
            while ($votes->fetch()) {
                if ($score != 0) {
                    $originalScore = $score;
                    $score = $score/$count;

//                    echo $originalScore ."/" .$count;
                    ?>
                    <li>
                        <!--                        <div>-->
                        <!--                            --><?php //echo $name; ?>
                        <!--                        </div>-->
                        <div>
                            <?php echo "Name:  " .$name ."</br>  Shown Score:  " .$score ."</br>  Original Score:  " .$originalScore;?>
                        </div>
                    </li>
                    <?php
                }
            }
        ?>
    </ul>
    <?php echo $count ?>
</div>


<script src="javascript.js"></script>


