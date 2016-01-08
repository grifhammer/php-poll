<?php
    session_start();
    include 'inc/db_connect.php'

    // Select statement ... get a random match from teams
    // Check to see if it has been voted on
    // If they have, get another
    // If they havent, then use it



    // Once clicked on make an ajax call to update the database
    // Insert statement that will add vote to votes table
    // this needs the MID and the team

    // set session variable for that game

    // Make an AJAX call to get all votes for that MID, do the math and replace the content in that div

    // next button starts over


?>
<!DOCTYPE html>
<html>
<head>
    <title>Win OR Not</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="site-wrapper">
        <div class="header-wrap">
            <h1>Win OR Not</h1>
        </div>
        <div id="selection-wrap">
            <div id="vote-all"></div>
            <div class="vote-item">
                <div class="img-wrap">
                    <img src="images/og.jpg-large">
                </div>
                <button class="team-vote btn btn-lg" team="<?php print team1; ?>" opp="<?php print team2;?>"><?php print team1;?></button>
                <div class="item-info">
                    <h3>50% of the Vote</h3>
                </div>
            </div>
            <div class="vote-item">
                <div class="img-wrap">
                    <img src="images/eg.jpg-large">
                </div>
                <button class="team-vote btn btn-lg" team="<?php print team2; ?>" opp="<?php print team1;?>"><?php print team2;?></button>
                <div class="item-info">
                    <h3>50% of the Vote</h3>
                </div>
            </div>
        </div>
        <div id="skip-wrap">
            <button class="btn btn-default">Skip</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src=""></script>
</body>
</html>
