$(function() {
	
	/*--details-chart2--*/
	var options = {
		chart: {
			height: 300,
			type: 'bar',
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'	
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		series: [{
			name: 'Machines1',
			data: [74, 85, 57, 56, 81, 58, 63, 70, 66, 89, 95, 67]
		}, {
			name: 'Machines2',
			data: [46, 55, 51, 98, 67, 65, 91, 84, 94, 85, 89, 72]
		}, 
		 {
			name: 'Machines3',
			data: [50, 65, 49, 78, 50, 95, 80, 55, 39, 48, 60, 45]
		},
		 {
			name: 'Machines4',
			data: [38, 45, 17, 60, 30, 52, 98, 55, 88, 60, 50, 62]
		},{
			name: 'Machines5',
			data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 67, 59, 37]
		}],
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		fill: {
			opacity: 1

		},
		colors: ['#564ec1', '#04cad0', '#f5334f', '#f7b731', '#21c44c'],
		tooltip: {
			y: {
				formatter: function (val) {
					return  val 
				}
			}
		}
	}
	var chart = new ApexCharts(
		document.querySelector("#machines"),
		options
	);
	chart.render();
	/*--machines--*/
	
	/*-----echart2-----*/
	var chartdata = [{
		name: 'Broken',
		type: 'bar',
		data: [10, 15, 9, 18, 10, 15]
	}, {
		name: 'No Reason',
		type: 'line',
		smooth: true,
		data: [8, 5, 25, 10, 10, 18]
	}, {
		name: 'Other Reasons',
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
			data: ['2014', '2015', '2016', '2017', '2018', '2019'],
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
		color: ['#564ec1', '#ff9900', '#04cad0', ]
	};
	barChart.setOption(option);
	
	/* production stats-1*/
	var ctx = document.getElementById("AreaChart1");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24', 'Date 25', 'Date 26', 'Date 27', 'Date 28', 'Date 29', 'Date 30'],
			type: 'line',
			datasets: [{
				data: [45, 0, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 96, 36, 32, 48, 54, 87, 88, 96, 53, 21, 24, 14, 58, 78, 55, 41, 21, 45, 54, 51, 52, 48],
				label: 'Production Volume',
				backgroundColor: 'transparent',
				borderColor: '#564ec1',
				borderWidth: '3',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
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
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
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
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	
	/* production stats-1*/
	var ctx = document.getElementById("AreaChart2");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24', 'Date 25', 'Date 26', 'Date 27', 'Date 28', 'Date 29', 'Date 30'],
			type: 'line',
			datasets: [{
				data: [45, 0, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 96, 36, 32, 48, 54, 87, 88, 96, 53, 21, 24, 14, 58, 78, 55, 41, 21, 45, 54, 51, 52, 48],
				label: 'Quantity Ordered',
				backgroundColor: 'transparent',
				borderColor: '#04cad0',
				borderWidth: '3',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
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
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
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
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	
	/* production stats-1*/
	var ctx = document.getElementById("AreaChart3");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24', 'Date 25', 'Date 26', 'Date 27', 'Date 28', 'Date 29', 'Date 30'],
			type: 'line',
			datasets: [{
				data: [45, 0, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 96, 36, 32, 48, 54, 87, 88, 96, 53, 21, 24, 14, 58, 78, 55, 41, 21, 45, 54, 51, 52, 48],
				label: 'Active Machines',
				backgroundColor: 'transparent',
				borderColor: '#f5334f',
				borderWidth: '3',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
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
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
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
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	
	/* production stats-1*/
	var ctx = document.getElementById("AreaChart4");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24', 'Date 25', 'Date 26', 'Date 27', 'Date 28', 'Date 29', 'Date 30'],
			type: 'line',
			datasets: [{
				data: [45, 0, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 96, 36, 32, 48, 54, 87, 88, 96, 53, 21, 24, 14, 58, 78, 55, 41, 21, 45, 54, 51, 52, 48],
				label: 'Sales Revenue',
				backgroundColor: 'transparent',
				borderColor: '#f7b731',
				borderWidth: '3',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
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
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
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
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
});

/*PMboYSIqMee+p4uAjskftSrErYaF9PDNDn+EGSzR9N2BspYI8=
feCz66HNQhyoUIndT6pXQpWta+PA3e1h3yExMyH1EsOo6f8PXnNPyHGLRfchOSF9WSX7exs=*/