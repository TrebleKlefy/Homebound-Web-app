@extends('admin.nav')

@section('content')

        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Total Shipments</h5>
                    <h2 class="card-title">Performance</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Accounts</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-single-02"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-gift-2"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sessions</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-tap-02"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Shipments</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Daily Sales</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Completed Tasks</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineGreen"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
    

        <div class="row">
         
          <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> user  AvderTable</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                 
                
 
    <div class="pt-3" id="notifDiv"
    style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 80%; right: 5%; color: white; padding: 5px 20px">
</div>
   
       
        <div id="get_data" class="pb-1">  
     
        </div>  
   </div>
         
                </div>
              </div>
            </div>
          </div>
        {{-- </div> --}}

      
        




      



   
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>   
{{-- <script src="/js/custom.js"></script>   --}}


      
<script>

  


    $(document).ready(function() {
    getUserList();


            $(document).on('click', '.active_deactive_user', function() {
                const thisRef = $(this);
                var adid = $("input[name=adid]").val();
                let value =1;
                // let adid =1;
                thisRef.text('processing');
                $.ajax({
                    url: "/listings/approved",
                    type:"POST",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                      approved:value,
                      adid:adid,
                      // _token: _token
                    },
                    
                success:function(response) {
                // var response = JSON.parse(response);
                if(response.status == 'success') {
                    showAlert(200, 'Status Updated Successfully');
                    getUserList();
                } else if(JSON.parse(response) == 'failed') {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('Unable to deactivate employee');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);	
                }		
            }	
        });
   });
});



function getUserList() {
    $.ajax({
        type: 'GET',
        url: '/listings/adlistapi',
        success: function (response) {
            // var response = JSON.parse(response);
            $('#get_data').empty();
            $('#get_data').append(`<table class="table table-hover dt-responsive nowrap userList" id="table" style="width:100%">
            <thead>
                <tr>
                <th class="text-center">
                        User Name 
                        </th>
                        <th class="text-center">
                          Email
                        </th>
                        {{-- <th class="text-center">
                          Contact Number of User
                        </th> --}}
                        <th class="text-center">
                          Contract type
                        </th>
                        <th class="text-center">
                         Bulding
                        </th>
                
                        <th class="text-center">
                        Pice
                        </th>
                        <th class="text-center">
                          Approved
                        </th>
                </tr>
                </thead>
            <tbody>
        </tbody>
    </table>`);
        
                    response.forEach(element => {
                        $('.userList tbody').append(`<tr>
                  
                        <td class="text-center"><a href="/listingsextra/${element.id}">${element.first_name} ${element.last_name}</a></td>
                        <td class="text-center">${element.email}</td>
                        <td class="text-center">${element.contract}</td>
                        <td class="text-center">${element.buildingtype}</td>
                        <td class="text-center">${element.price}</td>
			
                        <td class="text-center">
                          <input type="hidden" id="advid" name="adid" value="${element.id}">
                        <button class="btn btn-dark btn-sm active_deactive_user" id="${element.id}">${element.approved == 1 ? `BLOCk` : `Accept`}</button>
                        </td>
                </tr>`);
            });
        }
    })
}


function showAlert(code, message) {
	$('#notifDiv').css('background', (code === 200 ? 'green': 'red'));
	$('#notifDiv').fadeIn();
	$('#notifDiv').text(message);
	setTimeout(() =>{
		$('#notifDiv').fadeOut();	
	}, 3000)
}

$(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });

    
</script>

@endsection