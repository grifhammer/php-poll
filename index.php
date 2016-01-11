<?php
    session_start();
    include 'inc/db_connect.php';

    $query = "SELECT * FROM teams";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){
        $rows[] = $row;
    }
    $rand = rand (0, count($rows)-1);
    $rand2 = $rand;
    while($rand == $rand2){
        $rand2 = rand(0, count($rows)-1);
    }
    $team1 = $rows[$rand]['name'];
    $team1_pic = $rows[$rand]['image'];

    $team2 = $rows[$rand2]['name'];
    $team2_pic = $rows[$rand2]['image'];
    

    $query = "SELECT * FROM matchups WHERE (team1 = '".$team1."' AND team2 = '".$team2."') OR (team1 ='".$team2."' AND team2 ='".$team1."')";
    $result = mysql_query($query);



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
                    <img src="images/<?php print $team1_pic; ?>">
                </div>
                <button class="team-vote btn btn-lg" team="<?php print $team1; ?>" opp="<?php print $team2;?>"><?php print $team1; ?></button>
                <div class="item-info">
                    <h3>50% of the Vote</h3>
                </div>
            </div>
            <div class="vote-item">
                <div class="img-wrap">
                    <img src="images/<?php print $team2_pic; ?>">
                </div>
                <button class="team-vote btn btn-lg" team="<?php print $team2; ?>" opp="<?php print $team1;?>"><?php print $team2;?></button>
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
