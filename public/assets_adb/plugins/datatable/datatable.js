$(function(e) {
	
	//datatable-1
	$('#datable-1').DataTable();
	
	//datatable-2
	var table = $('#datatable-2').DataTable();
	$('button').on("click", function(e) {
		var data = table.$('input, select').serialize();
		alert(
			"The following data would have been submitted to the server: \n\n"+
			data.substr( 0, 120 )+'...'
		);
		return false;
	});
	
	//datatable-3
	$('#datatable-3').DataTable( {
		"scrollY":        "200px",
		"scrollCollapse": true,
		"paging":         false
	});

	//datatable-4
	$('#datatable-4').DataTable( {
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}
	});
	
	//datatable-5
	var table = $('#datatable-5').DataTable( {
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
	} );
	table.buttons().container()
	.appendTo( '#datatable-5_wrapper .col-md-6:eq(0)');
	
	//datatbale-6
	$('#datatbale-6').DataTable( {
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}
	} );
	
	//datatbale-7
	$('#datatbale-7').DataTable();
	
	//datatbale-8
	$('#datatbale-8').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}
	});
	
	//datatbale-9
	$('#datatbale-9').DataTable({
		bLengthChange: false,
		searching: false,
		responsive: true
	});
});