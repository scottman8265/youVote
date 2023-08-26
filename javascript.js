// loads slider screen into content

    $('#content').on("click", "#voteNow", function (event) {
        event.stopImmediatePropagation();
        $("#header").load("header.html #voteHeader");

        $("#content").hide().delay(500).load('vote.php').show();
        console.log("vote now pressed");
    });

// pulls up validation div or message from validateForm.html
$('#header').on("click", "#submit", function (event) {
    event.stopImmediatePropagation();

    console.log("submit pressed");
  

    $('#validationDiv').hide().load('validateForm.html').fadeIn("slow");
});

$('#header').on("click", "#viewResults", function(event) {
    event.stopImmediatePropagation();

    $("#header").load('header.html #resultsHeader');

    $('#validationDiv').hide();

    console.log("view results clicked");
   $("#content").hide().delay(500).load('results.php').fadeIn();

});

// validates ticket numbers eventually
$('#validationDiv').on("submit", "#enterTicket", function (event) {
    event.stopImmediatePropagation();
    event.preventDefault();
    console.log("enterTicket form submitted");
    var formData = {};
    

    var validationData = {'ticketNum' :$('#ticketNum').val()};
    var validateTicket = $.post('validateTicket.php', validationData, null, 'json');
    validateTicket.done(function(data) {
        // script for ticket validation done function
        console.log ("var_dump from validateTicket.php:  " + data.success);
        if (data.success) {
            $('#errorHolder').html("<h1>Vote Submitted</h1><h3>Enter Another Ticket or  CLick View Results</h3>");
            $('#voteScreen input').each(function(i) {
                formData[i] = {'number': $(this).attr('id'),
                    'score': $(this).val(),
                    'ticketNum' : $('#ticketNum').val(),
                    'name' : $(this).attr('name')};
            });
            var sent = $.post('process.php', formData);
            sent.done(function (data) {
                console.log("successfully submitted form data:  ");

            });
            sent.fail(function (data) {
                console.log("failed submitting data:  " + data);
            });
        }
        if (!data.success) {
            $('#errorHolder').html("<h1>" + data.errors + "</h1>");
        }
    });
});

$('#header').on("click", '#refresh', function (event) {
    event.stopImmediatePropagation();

    $("#content").hide().delay(500).load('results.php').fadeIn();
});

$("#header").on("click", "#reVote", function (event) {
    event.stopImmediatePropagation();
    $("#header").load("header.html #voteHeader");
    $('#content').hide().delay(500).load('vote.php').fadeIn();
});
