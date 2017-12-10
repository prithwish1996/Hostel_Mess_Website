<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">


<title>Athulya Girls Hostel</title>
<style type="text/css">

    body{


        padding-top:10.0%;
        padding-bottom: 3%;
    }
    .container{
        width: 80%;
        margin: 0 auto;
        font-size: 20px;
    }
    .fixed-header{
        width: 100%;
        position: fixed;
        overflow:auto;
        background: #960A0A;
		    padding: .05%;
        /*z-index: auto;*/
        color: #fff;
        top: 0;

    background-size:100% 100%;
    /*padding-bottom: ;*/


    }


	 .fixed-footer{
        width: 100%;
        position: fixed;
        background: #333;
        padding: 0.505%;
        color: #fff;
        margin: auto;
    }



    .fixed-footer{
        bottom: 0;

    /*flex-shrink:0;*/
    }
    .background-image{
	width=50px;
	}
  #arrow{

    margin-left: 400px;
  }
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
    .container p{
        line-height: 200px;
    }
	#image{
			margin-top:10px;
			margin-left:-100px;
			}
      #developer{
        color: white;

      }
	.headertext{
				margin-top:-100px;
				margin-left:10px;
				}
  .subtext{
    margin-top: 10px;
  }
  a {
      color: black;
      text-decoration: none;
  }

  a:hover
  {
       color:#00A0C6;
       text-decoration:none;
       cursor:pointer;
  }

</style>
</head>
<body>

    <div class="fixed-header" >
        <div class="container">
		<img id="image" src="logo3.jpg" style="width:100px; height:100px" ></img>
		<div class="headertext"><font size="5">COCHIN UNIVERSITY OF SCIENCE AND TECHNOLOGY</font></div><br>
    <div class="subtext"><font size="4">&nbsp&nbspATHULYA GIRLS HOSTEL</font></div>
            <nav align="right"  >

                <a style="color:white" href="home.php">Home</a>
                <a  style="color:white" href="developers.php">Contact</a>
                <a id="logout" href="logout.php" style="color:white" src="bg.jpg">Logout</a>

            </nav>
        </div>
    </div>

    <div class="container">

    </div>
    <div class="fixed-footer">
        <div class="container"><?php $r = date("Y"); echo"Cochin University of Science And Technology $r" ?><a id="developer" href="developers.php"><span id="arrow">&#8594;</span>Developers</a></div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
</body>

</html>