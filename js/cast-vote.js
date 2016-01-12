$(document).ready(function(){
    $('.team-vote').click(function(){
        var voteFor = $(this).attr('team');
        var voteAgainst = $(this).attr('opp');
        var mid = $(this).attr('mid');
        $.ajax({
            url: "process_vote.php",
            type: "post",
            data: {vote: voteFor, opp:voteAgainst, mid:mid},
            success: function(result){
                console.log("The vote was handled successfully with result: "+result);
            }
        });
    });

    $('.skip').click(function(){
        console.log('Skip this match');
    });
});