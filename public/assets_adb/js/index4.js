$(function(e) {
	'use strict';

	/* Chartjs (#total-sales) */
	var myCanvas = document.getElementById("total-sales");
	myCanvas.height="150";
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
	gradientStroke1.addColorStop(0, '#564ec1');
	gradientStroke1.addColorStop(1, '#564ec1');

	var myChart = new Chart(myCanvas, {
		type: 'bar',
		data: {
			labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat" , "Sun"],
			datasets: [{
				label: 'Total Sales',
				data: [16, 14, 15, 14, 16, 14, 15, 14, 15, 14, 16, 13],
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
					 barPercentage: 0.2,
					ticks: {
						fontColor: "#9493a9" ,

					 },
					display: true,
					gridLines: {
						display: false,
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
						display: false,
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
	/* Chartjs (#total-sales) closed */
	
	/* Chartjs (#total-revenue) */
	var myCanvas = document.getElementById("total-revenue");
	myCanvas.height="150";
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
	gradientStroke1.addColorStop(0, '#04cad0');
	gradientStroke1.addColorStop(1, '#04cad0');

	var myChart = new Chart(myCanvas, {
		type: 'bar',
		data: {
			labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat" , "Sun"],
			datasets: [{
				label: 'Total Revenue $',
				data: [16, 14, 15, 14, 16, 14, 15, 14, 15, 14, 16, 13],
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
					 barPercentage: 0.2,
					ticks: {
						fontColor: "#9493a9" ,

					 },
					display: true,
					gridLines: {
						display: false,
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
						display: false,
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
	/* Chartjs (#total-revenue) closed */
	
	/* Chartjs (#total-brands) */
	var ctx = document.getElementById('total-brands').getContext('2d');
	var gradientStroke = myCanvasContext.createLinearGradient(0, 0, 0, 300);
	gradientStroke.addColorStop(0, '#f5334f');
	gradientStroke.addColorStop(1, '#f5334f');
    var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat" , "Sun"],
			datasets: [{
				label: "Total-Brands",
				borderColor: gradientStroke,
				borderWidth: 2,
				backgroundColor: 'transparent',
				data: [0, 50, 0, 100, 50, 130, 100, 140, 80, 170, 60, 190]
			}]
		},
        options: {

            maintainAspectRatio: true,
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
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
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
	/* Chartjs (#total-brands) closed */
	
	/* Chartjs (#total-unitsold) */
	var ctx = document.getElementById('total-unitsold').getContext('2d');
	var gradientStroke = myCanvasContext.createLinearGradient(0, 0, 0, 300);
	gradientStroke.addColorStop(0, '#f7b731');
	gradientStroke.addColorStop(1, '#f7b731');
    var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat" , "Sun"],
			datasets: [{
				label: "Total Unit sold",
				borderColor: gradientStroke,
				borderWidth: 2,
				backgroundColor: 'transparent',
				data: [0, 50, 0, 100, 50, 130, 100, 140, 80, 170, 60, 190]
			}]
		},
        options: {

            maintainAspectRatio: true,
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
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
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
	/* Chartjs (#total-unitsold) closed */
	
	/* Apexchart*/
	var options = {
		chart: {
			height: 250,
			type: 'area',
			stacked: true,
			events: {
			  selection: function(chart, e) {
				console.log(new Date(e.xaxis.min) )
			  }
			},
		},
		colors: ['#564ec1', '#04cad0'],
		dataLabels: {
		  enabled: false
		},
		stroke: {
			curve: 'smooth'
		},
		series: [{
                name: 'Total Customers',
                data: [34, 24, 44, 36, 56, 48, 67, 46, 78, 56]
            },{
                name: 'Total Visitors',
                data: [40, 31, 52, 43, 64, 55, 76, 57, 88, 69]
		}],
		fill: {
			gradient: {
			  enabled: true,
			  opacityFrom: 0.6,
			  opacityTo: 0.8,
			}
		},
			legend: {
			position: 'top',
			horizontalAlign: 'left',
			colors: '#000'
		},
    }
    var chart = new ApexCharts(
      document.querySelector("#chart"),
      options
    );
    chart.render();
    function generateDayWiseTimeSeries(baseval, count, yrange) {
		var i = 0;
		var series = [];
		while (i < count) {
			var x = baseval;
			var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

			series.push([x, y]);
			baseval += 86400000;
			i++;
		}
		return series;
    }
	
	/*-----total-orders-----*/
	var chartdata3 = [{
		name: 'Orders',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14, 24, 35, 22, 19]
	}];
	var option5 = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '25',
		},
		xAxis: {
			data: ["Jan", "Feb", "Mar", "Apr", "May", "Jun" , "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
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
		series: chartdata3,
		color: ['#564ec1']
	};
	var chart5 = document.getElementById('total-orders');
	var barChart5 = echarts.init(chart5);
	barChart5.setOption(option5);
	
	/*--echart-1---*/
	var myChart2 = echarts.init(document.getElementById('echart-1'));
	var option2 = {
		title: {
			text: '',
			subtext: '',
			x: 'center'
		},
		tooltip: {
			trigger: 'item',
			formatter: "{a} {b} : {c} ({d}%)"
		},
		legend: {
			x: 'center',
			y: 'bottom',
			data: ['USA', 'India',  'Russia', 'Canada',  'Germany'],
			textStyle: {
				color: '#9493a9'
			}
		},
		toolbox: {
			show: true,
			feature: {
				mark: {
					show: true
				},
				dataView: {
					show: true,
					readOnly: false
				},
				magicType: {
					show: true,
					type: ['pie']
				},
				restore: {
					show: true
				},
				saveAsImage: {
					show: true
				}
			}
		},
		calculable: true,
		series: [{
			name: '',
			type: 'pie',
			radius: [20, 110],
			center: ['50%', '50%'],
			roseType: 'radius',
			label: {
				normal: {
					show: false
				},
				emphasis: {
					show: true
				}
			},
			lableLine: {
				normal: {
					show: false
				},
				emphasis: {
					show: true
				}
			},
			data: [{
				value: 56,
				name: 'USA'
			}, {
				value: 53,
				name: 'India'
			}, {
				value: 46,
				name: 'Russia'
			}, {
				value: 30,
				name: 'Canada'
			},{
				value: 15,
				name: 'Germany'
			}]
		}, ],
		color: ['#564ec1', '#04cad0', '#f5334f', '#f7b731 ', '#26c2f7']
	};
	myChart2.setOption(option2);
	/*--echart-1---*/

});

/*PMboYSIqMee+p4uAjskftSrErYaF9PDNDn+EGSzR9N2BspYI8=
feCz66HNQhyoUIndT6pXQpWta+PA3e1h3yExMyH1EsOo6f8PXnNPyHGLRfchOSF9WSX7exs=*/