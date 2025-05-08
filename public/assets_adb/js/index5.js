(function($) {
	"use strict";

	/* Order */
    var ctx = $('#Order');
	ctx.height(295);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
			type: 'line',
			datasets: [{
				label: "Perfect Order Rate",
				data: [253, 256, 395, 204, 251, 458, 364, 145, 156, 250, 253, 278],
				backgroundColor: 'rgba(4, 202, 208,0.8)',
				borderColor: 'rgba(4, 202, 208,0.9)',
				borderWidth: 0,
				pointStyle: 'circle',
				pointRadius: 0,
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'rgba(4, 202, 208,0.8)',
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
						color: 'rgb(227, 226, 236,0.4)',
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
	/* Order end */
	
	
	/*-----echart1-----*/
	var chartdata = [{
		name: 'Within Time Limit',
		type: 'bar',
		data: [10, 15, 9, 18, 10, 15]
	},{
		name: 'Outof Time Limit',
		type: 'bar',
		data: [10, 14, 10, 15, 9, 25]
	}];
	var chart = document.getElementById('echart1');
	var barChart = echarts.init(chart);
	var option = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '25',
		},
		xAxis: {
			data: ['2014', '2015', '2016', '2017', '2018'],
			axisLine: {
				lineStyle: {
					color: 'rgb(227, 226, 236,0.4)'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#9493a9'
			}
		},
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer: {
				label: {
					show: false,
				}
			}
		},
		yAxis: {
			splitLine: {
				lineStyle: {
					color: 'rgb(227, 226, 236,0.4)'
				}
			},
			axisLine: {
				lineStyle: {
					color: 'rgb(227, 226, 236,0.4)'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#9493a9'
			}
		},
		series: chartdata,
		color: ['#564ec1', '#ff9900']
	};
	barChart.setOption(option);
	
	
	/* Chartjs (#inventory) */
	var myCanvas = document.getElementById("inventory");
	myCanvas.height="272";
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
	gradientStroke1.addColorStop(0, '#564ec1');
	gradientStroke1.addColorStop(1, '#564ec1');

	var myChart = new Chart(myCanvas, {
		type: 'bar',
		data: {
			labels: ["Risk", "Service", "Storage", "Admin", "Freight"],
			datasets: [{
				label: 'Carrying Costs Of Inventory',
				data: [16, 14, 12, 14, 16, 15, 12, 14,18,10],
				backgroundColor: gradientStroke1,
				hoverBackgroundColor: gradientStroke1,
				hoverBorderWidth: 2,
				hoverBorderColor: 'gradientStroke1'
			}
		  ]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
				},
			},
			scales: {
				xAxes: [{
					 barPercentage: 0.3,
					ticks: {
						fontColor: "#9493a9" ,

					 },
					display: true,
					gridLines: {
						color: 'rgb(227, 226, 236,0.4)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: '#000'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#9493a9" ,
					 },
					display: true,
					gridLines: {
						color: 'rgb(227, 226, 236,0.4)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'sales',
						fontColor: 'transparent'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	/* Chartjs (#inventory) closed */

})(jQuery);
