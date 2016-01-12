<?php
    // print $_POST;
    include 'inc/db_connect.php';
    if ($_POST) {
        if(count(DB::query("SELECT * FROM votes WHERE user = %s AND mid = %i", $_COOKIE['dota2uid'], $_POST['mid'])==0)){
            DB::insert('votes', array(
                'mid' => $_POST['mid'],
                'user' => $_COOKIE['dota2uid']
                ));
            $output = DB::query("UPDATE matchups SET team1votes = team1votes + 1 WHERE team1 = %s", $_POST['team']);
            print $output." ";
            $output = DB::query("UPDATE matchups SET team2votes = team2votes + 1 WHERE team2 = %s", $_POST['team']);
            print $output;
        }
    }

?>

