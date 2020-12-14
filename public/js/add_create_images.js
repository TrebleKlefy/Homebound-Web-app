Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;
let token = $('meta[name="csrf-token"]').attr('content');
var payment_id;
$(function() {

  console.log(  $(".file").val());

var myDropzone = new Dropzone("div#imageUpload", {
	paramName: "images",
	url: "{{ url('/listings/storeimage') }}",
	previewsContainer: 'div.dropzone-previews',
	addRemoveLinks: true,
    autoProcessQueue: false,

	parallelUploads: 100,
    maxFiles: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,",
	params: {
        _token: token
    },

	 // The setting up of the dropzone
	init: function() {
	    var myDropzone = this;
      //form submission code goes here
      $(document).ready(function(){



$("#subi").click(function(){

  $('#exampleModalCenter').modal('show');

  $("form[name='paymentData']").submit(function(event) {
	    	//Make sure that the form isn't actully being sent.
	    	event.preventDefault();

	    	URL = $("#form").attr('action');

	    	$.ajax({
	    		type: 'POST',
	    		url: '/listings/payment',
	    		data:  new FormData(this),
                contentType:false,
                processData:false,
	    		success: function(result){
	    			if(result.status == "success"){

            $('#exampleModalCenter').modal('hide');

            $("#payment_id").val(result.pay_id);
            $("#payment").val(result.amount);
            payment_id =result.pay_id;

	    	$(document).ready(function() {
	    	//Make sure that the form isn't actully being sent.

        formData = $('#form').serialize();

	    	$('#form').ajaxSubmit({
	    	type: 'POST',
	    	url: '/listings/store',

	    	success: function(result){
	    	if(result.status == "success"){
	    	// fetch the useid
	    	var userid = result.ad_id;
            $("#adid").val(userid);
            $("#advert_id").val(userid); // inseting userid into hidden input field
             //process the queue
            console.log(userid);
            myDropzone.processQueue();
            payment( userid);
	    	}else{
	    	console.log("error");
	    	}
	    	}
	    	});
      });
	    			}else{
	    				console.log("error");
	    			}
	    		}
	    	});
      });
    });
    });

	    //Gets triggered when we submit the image.
	    this.on('sending', function(file, xhr, formData){
	    //fetch the user id from hidden input field and send that userid with our image
          let adid = document.getElementById('adid').value;
        //   let user_id = document.getElementById('userid').value;
		   formData.append('adid', adid);
		});

	    this.on("success", function (file, response) {
            //reset the form
            $('#form')[0].reset();
            //reset dropzone
            $('.dropzone-previews').empty();
            window.location.reload();
        });

        this.on("queuecomplete", function () {

        });


	}
  });

  var container = $('#containers'),containers = $('#containeers'),inputFile = $('#file'), img, btn, txt = 'Browse', txtAfter = 'Browse another pic';

	if(!container.find('#upload').length){
		container.find('.input').append('<input type="button" value="'+txt+'" id="upload" class="btn btn-primary btn-block ">');
		btn = $('#upload');
    containers.prepend('<img  src="" class="hidden imgs" alt="Uploaded file" id="uploadImg" width="100">');
    img = $('#uploadImg');

	}

	btn.on('click', function(){
		img.animate({opacity: 0}, 300);
		inputFile.click();
	});

	inputFile.on('change', function(e){
		container.find('label').html( 'Remember this is what customers will see first. Please select the best image' );
    // container.find('label').html( inputFile.val() );
    // console.log(inputFile.val())
		var i = 0;
		for(i; i < e.originalEvent.srcElement.files.length; i++) {
			var file = e.originalEvent.srcElement.files[i],
				reader = new FileReader();

			reader.onloadend = function(){
				img.attr('src', reader.result).animate({opacity: 1}, 700);
			}
			reader.readAsDataURL(file);
			img.removeClass('hidden');
		}

		btn.val( txtAfter );
    });




});
