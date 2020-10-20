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
            var response = JSON.parse(response);
            $('#get_data').empty();
            $('#get_data').append(`<table class="table table-hover dt-responsive nowrap userList" id="example" style="width:100%">
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
                  
                        <td class="text-center">${element.first_name} ${element.last_name}</td>
                        <td class="text-center">${element.email}</td>
                        <td class="text-center">${element.contract}</td>
                        <td class="text-center">${element.buildingtype}</td>
                        <td class="text-center">${element.price}</td>
			
                        <td class="text-center">
                          <input type="hidden" id="advid" name="adid" value="${element.id}">
                        <button class="btn btn-dark btn-sm active_deactive_user" id="${element.id}">${element.approved == 1 ? `UNBLOCK` : `BLOCK`}</button>
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