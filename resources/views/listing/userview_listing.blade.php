@extends('layouts.app')

@section('content')
<link href="{{ asset('css/emailread.css') }}" rel="stylesheet">
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

<div class="mask opacity-8 bg-gradient-default">
    <div class="container-fluid mt-5 pt-5 ">
        <h1 class="mt-4 text-white">Advertisments</h1>
        <ol class="breadcrumb mb-4 " style="background-color: rgba(0,0,0,0.2);">
            <li class="text-white">Dashboard</li>
        </ol>
        <div class="p-5 bg-white" style="border-radius: 0.5%;">


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Avert Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Phone Number</th>
                <th>Address</th>

                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Advert Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Phone Number</th>
                <th>Address</th>

                <th>Action</th>

            </tr>
            </tfoot>
            <tbody>


            @forelse ($advertisments as $adverts)
                <tr>
                    <td>{{$adverts->name}} </td>
                    <td>{{  $adverts->email}}</td>
                    @if($adverts->approved)
                    <td><div class = " alert-success text-center"><p>Active</p></div></td>
                    @else
                    <td><div class = "alert-danger text-center"><p>Disabled</p></div></td>
                    @endif
                    {{-- <td>{{  $adverts->phone_number}}, {{  $adverts->phone_number2}}</td> --}}
                    <td> {{$adverts->phone_number}},
                        </td>
                    <td>{{  $adverts->street}}, Apt#:{{  $adverts->apartment_number}}, {{  $adverts->parish}}</td>
                    <td>  <a href="/listingsextra/{{$adverts->id}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                        <a href="/listings/{{$adverts->id}}/edit"  class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a>
                            <form action="/listings/{{$adverts->id}}/delete " id = "form" name="delete_photo"method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="delete  btn btn-clear btn-sm" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                            </form>
                        </a>

                    </td>

                </tr>
            @empty
                <div class="alert alert-danger">
                    <p>No adverts as yet</p>
                </div>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
          $('#dataTable').DataTable();
        });

    //    $(function(){

    //     $("form[name='delete_photo']").submit(function(event) {
	//     	//Make sure that the form isn't actully being sent.
	//     	event.preventDefault();

	//     	URL = $("#form").attr('action');
	//     	formData = $('#form').serialize();
	//     	$.ajax({
	//     		type: 'POST',
	//     		url: '/listings/store',
	//     		data:  new FormData(this),
    //             contentType:false,
    //             processData:false,
	//     		success: function(result){
	//     			if(result.status == "success"){
	//     				// fetch the useid
	//     				var userid = result.ad_id;
    //         $("#adid").val(userid); // inseting userid into hidden input field

    //                     //process the queue
    //                         console.log(userid);
	//     				myDropzone.processQueue();
	//     			}else{
	//     				console.log("error");
	//     			}
	//     		}
	//     	});
	//     });


    //    });

    </script>

@endsection
@section('javascript')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"  defer></script>
    <script src="js/scripts.js"  defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"  defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"  defer></script>
    <script src="assets/demo/datatables-demo.js"  defer></script>

@endsection
