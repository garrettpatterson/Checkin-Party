<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>templates</title>
  <meta name="description" content="" />
  <meta name="author" content="garrettp" />

  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
      <script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAA-hloRCoCScu-_bN2fSn1sRR5fpGOPx6wik73OBOS_C3yZ4VFnBTeM2PplvPN1"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {'packages':['motionchart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Station');
        data.addColumn('number', 'Date');
        data.addColumn('number', 'People');
        data.addRows([
          ['Register',300,1000],
          ['Coho',    300,1150],
          ['Kitchen', 300,300],
          ['Register',310,50],
          ['Coho',    310,100],
          ['Kitchen', 310,400]
          ]);
        var chart = new google.visualization.MotionChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 600, height:300});
      }
    </script>
    <script  type="text/javascript" src="js/cake.js"></script>
</head>

<body>
  <div>
    <header>
      <h1>templates</h1>
    </header>
    <nav>
      <p><a href="/">Home</a></p>
      <p><a href="/contact">Contact</a></p>
    </nav>

    <div>
      <div id="chart_div" style="width: 600px; height: 300px;"></div>
      <canvas id="chart" width="600" height="600">
      	Oh Snap! Your browser sucks
      </canvas>
    </div>

    <footer>
     <p>&copy; Copyright  by garrettp</p>
    </footer>
  </div>
  
  <script language="javascript">
  	var chart = document.getElementById('chart');
  	var context = chart.getContext('2d');
  	context.fillStyle = "rgb(255,0,0)";
  	context.beginPath();
  	context.arc(70,18,15,0,Math.PI*2,true);
  	context.closePath();
  	context.fill();
  	
  	window.onload = function(){
  		chart = new Canvas(document.body,600,400);
  		
  		var coho = new Circle(100,{
  			id:'coho',
  			x: 100,
  			y: 100,
  			endAngle: Math.PI*2,
  			fill:'black'
  		})
  		
  		
  		chart.append(coho);
  		
  		
  		
  	}
  	
  	
  </script>
</body>
</html>
