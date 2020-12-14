@extends('admin.nav')

@section('content')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css"/>

<style>

table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td button.delete {
    color: #E34724;
    margin-left: -10px;
}
table.table td i {
    font-size: 19px;

}
    </style>


    <div class="container-fluid">
        <h1 class="mt-4">Appointments</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>


        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
           Appointments
        </div>
                <div class="alert alert-danger" role="alert"><strong>Info!</strong> Add row and Delete row are working. Edit row displays modal with row cells information.</div>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Row information</h4>
                      </div>
                      <div class="modal-body">

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>






    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="application" id="application" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="modal-body">
                    @include('appilcation.appilcation')
                </div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.js"></script>
<script>
 $(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title='Simple DataTable';
	// DataTable initialisation
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": false, "targets": 5 }
			],
			"buttons": [
				'colvis',
				'copyHtml5',
        'csvHtml5',
				'excelHtml5',
        'pdfHtml5',
				'print'
			]
		}
	);
	//Add row button
	$('.dt-add').each(function () {
		$(this).on('click', function(evt){
			//Create some data and insert it
			var rowData = [];
			var table = $('#example').DataTable();
			//Store next row number in array
			var info = table.page.info();
			rowData.push(info.recordsTotal+1);
			//Some description
			rowData.push('New Order');
			//Random date
			var date1 = new Date(2016,01,01);
			var date2 = new Date(2018,12,31);
			var rndDate = new Date(+date1 + Math.random() * (date2 - date1));//.toLocaleDateString();
			rowData.push(rndDate.getFullYear()+'/'+(rndDate.getMonth()+1)+'/'+rndDate.getDate());
			//Status column
			rowData.push('NEW');
			//Amount column
			rowData.push(Math.floor(Math.random() * 2000) + 1);
			//Inserting the buttons ???
			rowData.push('<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button type="button" class="btn btn-danger btn-xs dt-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>');
			//Looping over columns is possible
			//var colCount = table.columns()[0].length;
			//for(var i=0; i < colCount; i++){			}

			//INSERT THE ROW
			table.row.add(rowData).draw( false );
		});
	});
	//Edit row buttons
	$('.dt-edit').each(function () {
		$(this).on('click', function(evt){
			$this = $(this);
			var dtRow = $this.parents('tr');
			$('div.modal-body').innerHTML='';
			$('div.modal-body').append('Row index: '+dtRow[0].rowIndex+'<br/>');
			$('div.modal-body').append('Number of columns: '+dtRow[0].cells.length+'<br/>');
			for(var i=0; i < dtRow[0].cells.length; i++){
				$('div.modal-body').append('Cell (column, row) '+dtRow[0].cells[i]._DT_CellIndex.column+', '+dtRow[0].cells[i]._DT_CellIndex.row+' => innerHTML : '+dtRow[0].cells[i].innerHTML+'<br/>');
			}
			$('#myModal').modal('show');
		});
	});
	//Delete buttons
	$('.dt-delete').each(function () {
		$(this).on('click', function(evt){
			$this = $(this);
			var dtRow = $this.parents('tr');
			if(confirm("Are you sure to delete this row?")){
				var table = $('#example').DataTable();
				table.row(dtRow[0].rowIndex-1).remove().draw( false );
			}
		});
	});
	$('#myModal').on('hidden.bs.modal', function (evt) {
		$('.modal .modal-body').empty();
	});
});
</script>

@endsection
@section('javascript')
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"  defer></script> --}}
    <script src="js/scripts.js"  defer></script>
    {{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"  defer></script> --}}
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"  defer></script>
    <script src="assets/demo/datatables-demo.js"  defer></script>


    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js " crossorigin="anonymous"  defer></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js " crossorigin="anonymous"  defer></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"  defer></script>
    <script src=" " crossorigin="anonymous"  defer></script>

@endsection
