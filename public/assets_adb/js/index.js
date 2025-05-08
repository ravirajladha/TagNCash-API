$(function(e) {

    /*-----WidgetChart1 CHARTJS-----*/
	var ctx = document.getElementById("widgetChart1");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [{
				label: "Cancel",
				backgroundColor: 'rgba(86, 78, 193,0.07)',
                borderColor: 'rgba(86, 78, 193,0.75)',
                borderWidth: 2,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(86, 78, 193,0.75)',
				data: [2, 7, 3, 9, 4, 5, 2, 8, 4, 6, 5, 2, 8, 4, 7, 2, 4, 6, 4, 8]
			},
			{
				label: "Expansion",
				backgroundColor: "rgb(255, 153, 0,0.07) ",
				borderColor: 'rgba(255, 153, 0, 0.75)',
                borderWidth: 2,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(255, 153, 0, 0.75)',
				data: [3, 8, 5, 7, 3, 7, 5, 8, 3, 7, 8, 6, 3, 5, 6, 5, 6, 5, 3, 4]
			},			{
				label: "Contraction",
				backgroundColor: "rgb(4, 202, 208,0.07)",
				borderColor: 'rgba(4, 202, 208, 0.75)',
                borderWidth: 2,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(4, 202, 208, 0.75)',
				data: [5, 3, 9, 6, 5, 9, 7, 3, 5, 2, 5, 3, 9, 6, 5, 9, 7, 3, 5, 2]
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				cornerRadius: 0,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 2
				},
				point: {
					radius: 0,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	
	/*apex-chart*/
	var options = {
		chart: {
			height: 300,
			type: 'bar',
			stacked: true,
		},
		plotOptions: {
			bar: {
				horizontal: true,
			},

		},
		stroke: {
			width: 1,
			colors: ['#fff']
		},
		series: [{
			name: 'Paying Conversion rate',
			data: [35, 45, 32, 45, 30, 53, 36]
		},{
			name: 'Signup Conversion rate',
			data: [45, 56, 22, 38, 60, 59, 44]
		},{
			name: 'Churn rate',
			data: [36, 21, 15, 12, 15, 20, 30]
		}],
		xaxis: {
			categories: [2013, 2014, 2015, 2016, 2017, 2018, 2019],
			labels: {
				formatter: function(val) {
					return val + ""
				}
			}
		},
		yaxis: {
			title: {
				text: undefined
			},

		},
		tooltip: {
			y: {
				formatter: function(val) {
				return val + ""
			}
			}
		},
		fill: {
			opacity: 1

		},
		colors: ['#564ec1' ,'#04cad0' ,'#f5334f'],
		legend: {
			position: 'top',
			horizontalAlign: 'center',
			offsetX: 10
		}
	}
	var chart = new ApexCharts(
		document.querySelector("#conversion"),
		options
	);
    chart.render();
	/*apex-chart*/
	
	/* Circle-progress */
	$('#circle').circleProgress({
		value: 0.85,
		size: 70,
		fill: {
		  gradient: ["#564ec1", "#564ec1"]
		}
    });
	/* Circle-progress closed */

	/* Circle-progress-1 */
	$('#circle-1').circleProgress({
		value: 0.64,
		size: 70,
		fill: {
		  gradient: ["#04cad0", "#04cad0"]
		}
	});
	/* Circle-progress-1 closed */
	
	/* Donutchart */
	var ctx = document.getElementById("pieChart");
	ctx.height = 410;
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			datasets: [{
				data: [40, 35, 30],
				backgroundColor: ['#04cad0', '#564ec1', '#ff9900'],
				hoverBackgroundColor: ['#04cad0', '#564ec1', '#ff9900'],
				borderColor:'transparent',
			}],
			labels: ["MRR Revenue", "ARR Revenue", "Non-Recurring Revenue"]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				labels: {
					fontColor: "#9493a9"
				},
			},
		}
	});
	
	/* Trials */
    var ctx = $('#trials');
	ctx.height(295);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Mon", "Tues", "Wed", "Thurs", "Fri", "Sat", "Sun"],
			type: 'line',
			datasets: [{
				label: "trials",
				data: [253, 256, 395, 204, 251, 458, 364, 145, 156, 250, 253, 278],
				backgroundColor: 'rgba(86, 78, 193,0.8)',
				borderColor: 'rgba(86, 78, 193,0.9)',
				borderWidth: 0,
				pointStyle: 'circle',
				pointRadius: 0,
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'rgba(86, 78, 193,0.8)',
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.9)',
				bodyFontColor: 'rgba(0,0,0,0.9)',
				backgroundColor: '#fff',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 0,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat',
				},
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#9493a9" ,
					},
					display: true,
					gridLines: {
						color: 'rgb(227, 226, 236,0.4)'
					},
					scaleLabel: {
						display: false,
						labelString: '',
						fontColor: '#000'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#9493a9" ,
					},
					display: true,
					gridLines: {
						display: false,
						drawBorder: true
					},
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	/* Trials end */
 });