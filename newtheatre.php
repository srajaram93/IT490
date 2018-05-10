<?php

session_start();
if(!isset($_SESSION["user"]))
{
        header("Refresh:1; url=main.html", true, 303);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
 
      <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css">

  <style type="text/css">
    .template { display: none; }


	h2,p {
		padding-left:24%;
	}
  </style>

  <title></title>

<script type="text/javascript">
 var movie = "<?php session_start();  $movie = $_GET['title']; $_SESSION['title'] = $movie; echo $movie; ?>";
var day = "<?php session_start(); $date = $_SESSION['date']; echo $date; ?>";
var user = "<?php session_start(); $user = $_SESSION['user']; echo $user; ?>";

$(window).load(function(){
 $.ajax ({ 
                  
               type: "GET",
               url: "theatre_location.php",
               data: "title=" +  movie,                                
                               
               error: function(xhr, status, error) {alert( "error Message: \r\nNumeric code is: " + xhr.status + " \r\nError is " + error );},
               success: function(result){
               var parsed_result = JSON.parse(result);
$("#title").html(parsed_result["b"][0]["title"]);// ["0"] works same as [0]

if(parsed_result["b"][0]["release_date"].length != "") 
{
	if(parsed_result["b"][0]["release_date"].length >= 4) {
	var fixedDateAR = parsed_result["b"][0]["release_date"].split("-");
	$("#rd").html ('Released on ' + fixedDateAR[1] + '-' + fixedDateAR[2] + '-' + fixedDateAR[0]);
	}
	else {$("#rd").html ('Released in ' + parsed_result["b"][0]["release_date"]);	} 
}


$("#photo").html('<img src ="' + parsed_result["b"][0]["photo"] + '">')
$("#desc").html(parsed_result["b"][0]["description"]);
var rating = parsed_result["b"][0]["mpaa"];
if(rating == null || rating == "")
{
rating = "NR";
}//havent test this out
$("#rNrt").html(rating + ', ' + parsed_result["b"][0]["hours"] +  '&ensp;' + parsed_result["b"][0]["mins"]  );
$("#review").html('<a href="forum1.php?title=' + encodeURI(parsed_result["b"][0]["title"]) + '">Review</a>');
 
$.each(parsed_result.a, function() // .a works same as ["a"] (.a contains theatre names, showtimes, and purchase links )
{
        var theatre =this["theatre"];
        var showtime = "";
	var link1 = "<a href='purchase.html?";	
        for (var i = 0; i < this["showtimes"].length; i++)
        { //if this[link][i] == null then skip? else configure it through html 
	   var h = "AM";
	   var splitter = this["showtimes"][i].split(":"); // split to get hours alone

	   	if (splitter[0] >=12)
	   	{
		    	if(splitter[0] > 12)
	    		{splitter[0]= splitter[0] - 12;}
	    	h = "PM"; 
			showtime += link1 + 'title='+ movie + '&date=' +day + '&showtime=' +splitter[0]+ ':' + splitter[1] + '&user='+ user  + "'>" + splitter[0] + ':' + splitter[1] + h  + '</a>' + '&emsp;';
	  	 }

		else if(splitter[0] == 0)
                {

                        showtime +=  link1 + 'title='+ movie + '&date=' +day + '&showtime=' + '12:' + splitter[1] + '&user='+ user  + "'>"+ "12:" + splitter[1] + h + '</a>' + '&emsp;';} // if no link then just 12:00AM

	  	else
	  	{
			showtime += link1 + 'title='+ movie + '&date=' + day + '&showtime=' +splitter[0]+ ':' + splitter[1] + '&user='+ user  + "'>"+  this["showtimes"][i] + h + '</a>' + '&emsp;';} // if no link then just 12:00AM

	}

    $("tbody").append('  <tr> <td >' + theatre + '</td>  <td >' + showtime + '  </td><hr> </tr> <hr> ');
});


	},

});


});

</script>

</head>

<body>


<br>


<div class="container">
 <img id="photo" align="left"height="250">
  <h2 id = "title"></h2>
  <p id = "rd" > </p>
  <p id = "rNrt"></p>
  <p id ="desc"> </p>
<p id= "review"> <a href="forum.html" >Review</a> </p>
 <table class="table table-hover">
              <thead>
                <tr>
                  <th>Theater</th>
                  <th>Showtime</th>
                </tr>
              </thead>
              <tbody>
                <tr class="template">
		
                      <td id = "theatre"></td>
                      <td id="st" >   </td>
		     
                </tr> 
              </tbody>
	
            </table>


</div>  
  <script>
  // tell the embed parent frame the height of the content
  if (window.parent && window.parent.parent){
    window.parent.parent.postMessage(["resultsFrame", {
      height: document.body.getBoundingClientRect().height,
      slug: "kf78s"
    }], "*")
  }
</script>

</body>

</html>

