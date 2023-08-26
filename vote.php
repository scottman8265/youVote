<?php
    include("connect.php");
    $sql = $conn->prepare("select contestantName, contestantNum, team from voiceContestants ORDER by team");
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($name, $number, $team);
?>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<form id='voteScreen' name='voteScreen' method='POST' action='process.php'>

    <?php while ($sql->fetch()) { ?>

        <ul data-role="listview" data-theme="b" id="contestantList">
            <li class="<?php echo $team; ?> ">
                <label for="<?php echo $number; ?>" class="center largeFont"><?php echo $name; ?></label>
                <input id="<?php echo $number; ?>" name="<?php echo $name ?>" type="range" value="50" min="0" max="100"
                       data-highlight="true"
                       data-track-theme="b" data-theme="b"/>
            </li>
        </ul>

    <?php } ?>

</form>


<script src="javascript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>

