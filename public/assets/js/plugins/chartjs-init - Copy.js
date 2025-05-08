(function($) {
    "use strict"

    var dzSparkLine = function(){
        
        var screenWidth = $(window).width();
        
        var pieChart = function(){
            //pie chart
            if(jQuery('#pie_chart').length > 0 ){
                //pie chart
                const pie_chart = document.getElementById("pie_chart").getContext('2d');
                // pie_chart.height = 100;
                new Chart(pie_chart, {
                    type: 'pie',
                    data: {
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            data: [50, 30, 20],
                            borderWidth: 2, 
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverBackgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ]

                        }],
                        labels: [
                            "Facebook",
                            "Whatsapp",
                            "Twitter",
                        ]
                    },
                    options: {
                        responsive: true, 
                        /* legend: true,  */
                        maintainAspectRatio: false
                    }
                });
            }
        }

        var doughnutChart = function(){
            if(jQuery('#doughnut_chart').length > 0 ){
                //doughut chart
                const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
                // doughnut_chart.height = 100;
                new Chart(doughnut_chart, {
                    type: 'doughnut',
                    data: {
                        weight: 5,	
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            data: [45, 25, 20],
                            borderWidth: 3, 
                            borderColor: "rgba(255,255,255,1)",
                            backgroundColor: [
                                "rgba(64, 24, 157, 1)",
                                "rgba(27, 208, 132, 1)",
                                "rgba(139, 199, 64, 1)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(64, 24, 157, 0.9)",
                                "rgba(27, 208, 132, .9)",
                                "rgba(139, 199, 64, .9)"
                            ]

                        }],
                    },
                    options: {
                        weight: 1,	
                         cutoutPercentage: 70,
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
        }
        
        var polarChart = function(){
		if(jQuery('#polar_chart').length > 0 ){
			//polar chart
			const polar_chart = document.getElementById("polar_chart").getContext('2d');
			// polar_chart.height = 100;
			new Chart(polar_chart, {
				type: 'polarArea',
				data: {
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [15, 18, 9, 6, 19],
						borderWidth: 0, 
						backgroundColor: [
							"rgba(64, 24, 157, 1)",
							"rgba(27, 208, 132, 1)",
							"rgba(139, 199, 64, 1)",
							"rgba(255, 103, 70, 1)",
							"rgba(254, 128, 36, 1)"
						]

					}]
				},
				options: {
					responsive: true, 
					maintainAspectRatio: false
				}
			});

		}
	}
        
        /* Function ============ */
        return{
            init:function(){
            
            },
            
            load:function(){
                pieChart();
                doughnutChart(); 
                polarChart(); 
            },
            
            resize:function(){
                pieChart();
                doughnutChart(); 
                polarChart(); 
            }
        }
        
    }();

    jQuery(document).ready(function(){
        
    });

    jQuery(window).on('load',function(){
        dzSparkLine.load();
    });

    jQuery(window).on('resize',function(){
        //dzSparkLine.resize();
        setTimeout(function(){
            dzSparkLine.resize();
        }, 1000);
    });

})(jQuery);