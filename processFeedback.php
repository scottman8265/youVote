<?php

    include("connect.php");

    var_dump($_POST);
    $na = 'no answer';

// set and insert overall table
        $overallRecommend = 'n';
        $overallComm = $na;
        $organizationComm = $na;
        $prizeComm = $na;
        $fairComm = $na;
        $overallSuggestion = $na;
        if (isset($_POST['overallRecommend'])) {
            $overallRecommend = 'y';
        }

        if ($_POST['overallComm'] != "") {
            $overallComm = $_POST['overallComm'];
        }
        if ($_POST['organizationComm'] != "") {
            $organizationComm = $_POST['organizationComm'];
        }
        if ($_POST['prizeComm'] != "") {
            $prizeComm = $_POST['prizeComm'];
        }
        if ($_POST['fairComm'] != "") {
            $fairComm = $_POST['fairComm'];
        }
        if ($_POST['overallSuggestion'] != "") {
            $overallSuggestion = $_POST['overallSuggestion'];
        }
        $overall = $conn->prepare("insert into overall (overallScore, overallComm, organizationScore, organizationComm, prizeScore, prizeComm, fairScore, fairComm, overallSuggestion, overallRecommend) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $overall->bind_param("ssssssssss", $_POST['overallScore'], $overallComm, $_POST['organizationScore'], $organizationComm, $_POST['prizeScore'], $prizeComm, $_POST['fairScore'], $fairComm, $overallSuggestion, $overallRecommend);
        $overall->execute();

//set and insert into judge tablel
    $judgeRecommend = 'n';
    $judgeTotalComm = $na;
    $judgeCommentComm =$na;
    $judgeFairComm = $na;
    $judgeSuggestion = $na;
    if ($_POST['judgeTotalComm'] != "") {
        $judgeTotalComm = $_POST['judgeTotalComm'];
    }
    if ($_POST['judgeCommentComm'] != "") {
        $judgeCommentComm = $_POST['judgeCommentComm'];
    }
    if ($_POST['judgeFairComm'] != "") {
        $judgeFairComm = $_POST['judgeFairComm'];
    }
    if ($_POST['judgeSuggestion'] != "") {
        $judgeSuggestion = $_POST['judgeSuggestion'];
    }
    if (isset($_POST['judgeRecommend'])) {
        $judgeRecommend = 'y';
    }
    $judge = $conn->prepare("insert into judge (judgeTotalScore, judgeTotalComm, judgeCommentScore, judgeCommentComm, judgeFairScore, judgeFairComm, judgeSuggestion, judgeRecommend) values (?, ?, ?, ?, ?, ?, ?, ?)");
    $judge->bind_param("ssssssss", $_POST['judgeTotalScore'], $kjTotalComm, $_POST['judgeCommentScore'], $judgeCommentComm, $_POST['judgeFairScore'], $judgeFairComm, $judgeSuggestion, $judgeRecommend);
    $judge->execute();

//set and insert into kj table
    $kjRecommend = 'n';
    $kjTotalComm = $na;
    $kjFairComm = $na;
    $kjVarietyComm = $na;
    $kjSuggestion = $na;
    if ($_POST['kjTotalComm'] != "") {
        $kjTotalComm = $_POST['kjTotalComm'];
    }
    if ($_POST['kjFairComm'] != "") {
        $kjFairComm = $_POST['kjFairComm'];
    }
    if ($_POST['kjVarietyComm'] != "") {
        $kjVarietyComm = $_POST['kjVarietyComm'];
    }
    if ($_POST['kjSuggestion'] != "") {
        $kjSuggestion = $_POST['kjSuggestion'];
    }
    if (isset($_POST['kjRecommend'])) {
        $kjRecommend = 'y';
    }
    $kj = $conn->prepare("insert into kj (kjTotalScore, kjTotalComm, kjFairScore, kjFairComm, kjVarietyScore, kjVarietyComm, kjSuggestion, kjRecommend) values (?, ?, ?, ?, ?, ?, ?, ?)");
    $kj->bind_param("ssssssss", $_POST['kjTotalScore'], $kjTotalComm, $_POST['kjFairScore'], $kjFairComm, $_POST['kjVarietyScore'], $kjVarietyComm, $kjSuggestion, $kjRecommend);
    $kj->execute();

//set and insert into voting app table
    $vaRecommend = 'n';
    $vaTotalComm = $na;
    $vaFairComm = $na;
    $vaEaseComm = $na;
    $vaSuggestion = $na;
    if ($_POST['vaTotalComm'] != "") {
        $vaTotalComm = $_POST['vaTotalComm'];
    }
    if ($_POST['vaFairComm'] != "") {
        $vaFairComm = $_POST['vaFairComm'];
    }
    if ($_POST['vaEaseComm'] != "") {
        $vaEaseComm = $_POST['vaEaseComm'];
    }
    if ($_POST['vaSuggestion'] != "") {
        $vaSuggestion = $_POST['vaSuggestion'];
    }
    if (isset($_POST['vaRecommend'])) {
        $vaRecommend = 'y';
    }
    $va = $conn->prepare("insert into votingApp (vaTotalScore, vaTotalComm, vaEaseScore, vaEaseComm, vaFairScore, vaFairComm, vaSuggestion, vaRecommend) values (?, ?, ?, ?, ?, ?, ?, ?)");
    $va->bind_param("ssssssss", $_POST['vaTotalScore'], $vaTotalComm, $_POST['vaFairScore'], $vaFairComm, $_POST['vaEaseScore'], $vaEaseComm, $vaSuggestion, $vaRecommend);
    $va->execute();

//set and insert into quench table
    $barRecommend = 'n';
    $barTotalComm = $na;
    $barAtmosComm = $na;
    $barTenderComm = $na;
    $barPricesComm = $na;
    $barQualityComm = $na;
    $barSuggestion = $na;
    if ($_POST['barTotalComm'] != "") {
        $barTotalComm = $_POST['barTotalComm'];
    }
    if ($_POST['barAtmosComm'] != "") {
        $barAtmosComm = $_POST['barAtmosComm'];
    }
    if ($_POST['barTenderComm'] != "") {
        $barTenderComm = $_POST['barTenderComm'];
    }
    if ($_POST['barPricesComm'] != "") {
        $barPricesComm = $_POST['barPricesComm'];
    }
    if ($_POST['barQualityComm'] != "") {
        $barQualityComm = $_POST['barQualityComm'];
    }
    if ($_POST['barSuggestion'] != "") {
        $barSuggestion = $_POST['barSuggestion'];
    }
    if (isset($_POST['barRecommend'])) {
        $barRecommend = 'y';
    }
    $bar = $conn->prepare("insert into bar (barTotalScore, barTotalComm, barAtmosScore, barAtmosComm, barTenderScore, barTenderComm, barPricesScore, barPricesComm, barQualityScore, barQualityComm, barSuggestion, barRecommend) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $bar->bind_param("ssssssssssss", $_POST['barTotalScore'], $barTotalComm, $_POST['barAtmosScore'], $barAtmosComm, $_POST['barTenderScore'], $barTenderComm, $_POST['barPricesScore'], $barPricesComm,$_POST['barQualityScore'], $barQualityComm, $barSuggestion, $barRecommend);
    $bar->execute();
    
//set and insert into demos table
    $demosAge = $_POST['demosAge'];
    $demosGender = $_POST['demosGender'];
    $demosOrientation = $_POST['demosOrientation'];
    $demosParticipate = $_POST['demosParticipate'];
    $demos = $conn->prepare("insert into demos (demosAge, demosGender, demosOrientation, demosParticipate) values (?, ?, ?, ?)");
    $demos->bind_param("ssss", $demosAge, $demosGender, $demosOrientation, $demosParticipate);
    $demos->execute();

//set and insert into email table
    $emailAddress = $na;
    $emailList = 'n';

    if ($_POST['emailAddress'] != "") {
        $emailAddress = $_POST['emailAddress'];
        if(isset($_POST['emailList'])) {
            $emailList = 'y';
        }
    }

    $email = $conn->prepare("insert into email (emailAddress, emailList) values (?, ?)");
    $email->bind_param("ss", $emailAddress, $emailList);
    $email->execute();
