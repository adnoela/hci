/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var imported = document.createElement('chart_script');
imported.src = 'lib/Chart.js';
document.head.appendChild(imported);

var locations = ["Altes AKH","Karlsplatz","Rathaus","Spittelberg"];
var myData = [30,45,42,32];

function draw() {
	var barChartData = {
		labels : locations,
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : myData 
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}
    }
   



