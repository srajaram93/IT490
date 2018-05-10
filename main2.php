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


<link rel="stylesheet" type="text/css" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet"> 
  <title>Book My Movie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
    font-family: 'Varela Round', sans-serif;
    height: auto;
    width: auto;
  }
  .modal-login {
    color: #636363;
    width: 350px;
  }
  .modal-login .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
  }
  .modal-login .modal-header {
    border-bottom: none;
        position: relative;
        justify-content: center;
  }
  .modal-login h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -15px;
  }
  .modal-login .form-control:focus {
    border-color: #70c5c0;
  }
  .modal-login .form-control, .modal-login .btn {
    min-height: 40px;
    border-radius: 3px;
  }
  .modal-login .close {
        position: absolute;
    top: -5px;
    right: -5px;
  }
  .modal-login .modal-footer {
   background: #ecf0f1;
    border-color: #dee4e7;
    text-align: center;
        justify-content: center;
    margin: 0 -20px -20px;
    border-radius: 5px;
    font-size: 13px;
  }
  .modal-login .modal-footer a {
    color: #999;
  }
  .modal-login .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #60c7c1;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
  }
  .modal-login .avatar img {
    width: 100%;
  }
  .modal-login.modal-dialog {
    margin-top: 80px;
  }
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
        border: none;
    }
  .modal-login .btn:hover, .modal-login .btn:focus {
    background: #45aba6;
    outline: none;
  }
  .trigger-btn {
    display: inline-block;
    margin: 10px auto;
  }
    .modal-dialog {
  width: 400px;
}
.modal-content {
  width: 400px;
}
.modal-body{
  padding-left: 50px;
  padding-right:50px;
}
button{
  display: inline-block;
  margin:0 5px 0 0;
  padding:15px 30px;
  font-size: 24px;
  line-height: 0.9;
  appearance:none;
  box-shadow: none;
  border-radius: 0;
  -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
}
button.flat{
  color:#fff;
  background-color: #00d3a3;
  text-shadow:-1px 1px #417cb8;
  border: none;
}
button.flat:hover{
  background-color: #00b180;
  text-shadow:-1px 1px #27496d;
}
button.flat:active{
background-color: #00b180;
text-shadow:-1px 1px #193047;
}
#email{
  width:340px;
  height:40px;
}
.inline-actions{
  position: absolute;
  right: 0;
  bottom: 20px;
  z-index: 1;
  overflow: hidden;
}
.check-icn{
  background: url(../assets/icons/checkmark-sm.png) center center no-repeat;
  width:34px;
    height:34px;
}
.right-inner-addon {
 position: relative;
}
.right-inner-addon input {
    padding-right: 30px;
}
.right-inner-addon button {
    position: absolute;
    right: -5px;
    pointer-events: none;
}
#search{
}
button.success,button.create{
  background-color: #00d3a3;
}
button.fail{
  background-color: #ffc000;
}
button.create{
  background-color: #00d3a3;
  color:#fff;
}
button.create:hover, button.create:active{
  background-color: #00b180;
  color:#fff;
}
input[type="text"], input[type="email"],input[type="password"]{
  background-color : #f7f7f7;
  outline: none;
  border: 2px solid #e7e7e7 !important;
  -webkit-box-shadow: none !important;
  -moz-box-shadow: none !important;
  box-shadow: none !important;
}
input[type="text"]:focus, input[type="email"]:focus,input[type="password"]:focus{
  background-color : #e7e7e7;
  outline: none;
  border: 2px solid #e7e7e7 !important;
  -webkit-box-shadow: none !important;
  -moz-box-shadow: none !important;
  box-shadow: none !important;
}
div.scrollmenu {
    background-color: white;
    overflow: auto;
    white-space: nowrap;
}
div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}
div.scrollmenu a:hover {
    background-color: #777;
}

form.ws-validate{
        float:left;
	
        padding-left: 20px;
	padding-top: 15px;
    	display: inline-flex;
	height: auto;
	width: auto;
  }

  .form-row.show-inputbtns {
        margin-right: 10px;
  }




</style>





      <style type="text/css">
         .tile {display: inline-block; border: 1px solid grey; background: silver; padding: 4px; text-align: center; font-size: 15px;width:250px; position:relative; }
	.link-spanner{display: inline-block; position:absolute;width:100%;height:100%;top:0; left:0; z-index:1; }	
      </style>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

      <script>
         
         $(document).ready(function() {
	
           $.ajax({
		type: "GET",
         	url: "location.php",
		success: function(data)//should be data
	{ var pd = JSON.parse(data);
	  $(".fill").append('<h1> Welcome, ' + pd.firstname +'. </h1>');
          $(".fill").append('<p>There are ' + pd.info.length + ' movies playing within a 5 mile radius near you (' + pd.zipcode +')</p>');
          $.each(pd.info, function() 
	    {
	  var encoded = encodeURI(this.title);
          var movieData = '<div class="tile"><img src="' + this.photo + '"><br/> <a href="newtheatre.php?title=' + encoded + '"> <span class ="link-spanner"></span> </a>  ';//DB CHECK if right
          movieData += this.title;
          if (this.ratings) { movieData += ' (' + this.ratings[0].code + ') </div>' };
          $(".fill").append(movieData);
            }); //each function
        }, // success

                 }); // ajax
  


 $("#A").click(function(){
$(".fill").empty();  
        var s = $("#zip").val();
        var o = $("#special").val();    
            $.ajax ({ 
                  
                        type: "GET",
                        url: "location.php",
                        data: "u=" +o +"&uu="+s ,                       
                               
                        error: function(xhr, status, error) {alert( "error Message: \r\nNumeric code is: " + xhr.status + " \r\nError is " + error );},
                        success: function(dataa){	var pd = JSON.parse(dataa);
        $(".fill").append('<h1> Welcome, ' + pd.firstname +'. </h1>');
        $(".fill").append('<p>There are ' + pd.info.length + ' movies playing within a 5 mile radius near (' + pd.zipcode +')</p>');
        $.each(pd.info, function() 
	  {
          var encoded = encodeURI(this.title);
          var movieData = '<div class="tile"><img src="' + this.photo + '"><br/> <a href="newtheatre.php?title=' + encoded + '"> <span class ="link-spanner"></span> </a>  ';//DB CHECK if right
          movieData += this.title;
          if (this.ratings) { movieData += ' (' + this.ratings[0].code + ') </div>' };
          $(".fill").append(movieData);
          }); // each
	        	}, //success
	 		});//ajax
         }); // click
}); // document

      </script>
   </head>
   <body>

<nav class="navbar navbar-inverse" style= "height:auto; width:auto;">
<div class="container-fluid">
 
	    <div class="navbar-header">
	      <a style="font-size:30px; padding-top:20px;" class="navbar-brand" href="main2.html">BookMyMovie</a>
	    </div>
	    



		<form style="height:auto; width:auto;" action="" class="ws-validate" >
	    	   <div class="form-group"> 
			
		        <input type="date" style="margin-right: 15px; height:36px; width:200px;" value ="<?php echo date('Y-m-d'); ?>" required  id="special" name="u" data-date-inline-picker="false" data-date-popover='{
		"inline": true 
}' />
	         </div>
			
	    	
	  	
		
		<div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span> </span>
			 <input type =text class="form-control" name="uu" id = "zip" style=" height:auto; width:auto;"  placeholder = "Zipcode" required >
			<div class ="input-group-btn">
			<button type="button" class="btn btn-default" id = "A" style="position: relative; margin-left: 10px; height:auto; width:auto;" ><i class="glyphicon glyphicon-search"></i> Search</button> 
		
		</div> </div>
			
		</form> 

		<ul class="nav navbar-nav navbar-right">
		    <button type="button" class="btn navbar-btn" onclick="location.href='logout.php'" class="trigger-btn glyphicon glyphicon-log-out"> Logout
		    </button> </ul>
	         

	
  </div>
</nav>

   <div class="fill"></div>

</body>

</html>
