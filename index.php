<?php
    session_start();
    include 'inc/db_connect.php';
    
    $idcookiename = "dota2uid";


    if( !$_COOKIE[$idcookiename] ) {
        $newid = uniqid();
        setcookie($idcookiename, $newid);
        $_COOKIE[$idcookiename] = $newid;
    }
    $user_id = $_COOKIE[$idcookiename];

    function get_teams(){

        $allteams = DB::query("SELECT * FROM teams");

        $rand = rand (0, count($allteams)-1);
        $rand2 = $rand;
        while($rand == $rand2){
            $rand2 = rand(0, count($allteams)-1);
        }
        $team1 = $allteams[$rand];
        $team2 = $allteams[$rand2];

        $selected_teams[0] = $team1;
        $selected_teams[1] = $team2;
        return $selected_teams;
    }

    function get_match_id($team1, $team2){

        $result = DB::query("SELECT * FROM matchups WHERE (team1 = %s AND team2 = %s) OR (team1 = %s AND team2 = %s)",$team1,$team2,$team2,$team1);

        if(count($result) == 1){
            $matchup = $result[0];
        }
        $match_id = $matchup['id'];
        return $match_id;
    }

    $returned_teams = get_teams();
    $returned_match = get_match_id($returned_teams[0]['name'], $returned_teams[1]['name']);
    $result = DB::query("SELECT * FROM votes WHERE mid=%i AND user=%s", $returned_match, $user_id);
    print $returned_match.' ';
    while(count($result) > 0 ){
        $returned_teams = get_teams();
        $returned_match = get_match_id($returned_teams[0]['name'], $returned_teams[1]['name']);
        $result = DB::query("SELECT * FROM votes WHERE mid=%i AND user=%s", $returned_match, $user_id);

        print $returned_match;
    }

    $team1 = $returned_teams[0]['name'];
    $team2 = $returned_teams[1]['name'];

    $team1_pic = $returned_teams[0]['image'];
    $team2_pic = $returned_teams[1]['image'];
    

    
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
                <button class="team-vote btn btn-lg btn-primary" team="<?php print $team1; ?>" opp="<?php print $team2;?>" mid="<?php print $returned_match; ?>"><?php print $team1; ?></button>
                <div class="item-info">
                    <h3><?php print 50;?>% of the Vote</h3>
                </div>
            </div>
            <div class="vote-item">
                <div class="img-wrap">
                    <img src="images/<?php print $team2_pic; ?>">
                </div>
                <button class="team-vote btn btn-lg btn-primary" team="<?php print $team2; ?>" opp="<?php print $team1;?>" mid="<?php print $returned_match; ?>"><?php print $team2;?></button>
                <div class="item-info">
                    <h3><?php print 50;?>% of the Vote</h3>
                </div>
            </div>
        </div>
        <div id="skip-wrap">
            <button class="skip btn btn-default">Skip</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/cast-vote.js"></script>
</body>
</html>
