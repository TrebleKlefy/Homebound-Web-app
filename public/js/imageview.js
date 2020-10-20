Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;	
let token = $('meta[name="csrf-token"]').attr('content');

$(function() {

  console.log(  $(".file").val());

var myDropzone = new Dropzone("div#imageUpload", { 
	paramName: "file",
	url: "{{ url('/listings/storeimage') }}",
	previewsContainer: 'div.dropzone-previews',
	addRemoveLinks: true,
    autoProcessQueue: false,
    maxFilesize: 0.9, // MB
    //  uploadMultiple: true,
    dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
    dictInvalidFileType: "Invalid File Type",
	parallelUploads: 100,
    maxFiles: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
	params: {
        _token: token
    },
   
	 // The setting up of the dropzone
	init: function() {
	    var myDropzone = this;
	    //form submission code goes here
	    $("form[name='formdata']").submit(function(event) {
	    	//Make sure that the form isn't actully being sent.
	    	event.preventDefault();

	    	URL = $("#form").attr('action');
	    	formData = $('#form').serialize();
	    	$.ajax({
	    		type: 'POST',
	    		url: '/listings/store',
	    		data:  new FormData(this),
                contentType:false,
                processData:false,
	    		success: function(result){
	    			if(result.status == "success"){
	    				// fetch the useid 
	    				var userid = result.ad_id;
            $("#adid").val(userid); // inseting userid into hidden input field
          
                        //process the queue
                            console.log(userid);
	    				myDropzone.processQueue();
	    			}else{
	    				console.log("error");
	    			}
	    		}
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
        });

        this.on("queuecomplete", function () {
		
        });
		
        // Listen to 462the sendingmultiple event. In this case, it's the sendingmultiple event instead
	    // of the sending event because  uploadMultiple is set to true.
	    this.on("sendingmultiple", function() {
	      // Gets triggered when the form is actually being sent.
	      // Hide the success button or the complete form.
	    });
		
	    this.on("successmultiple", function(files, response) {
	      // Gets triggered when the files have successfully been sent.
	      // Redirect user or notify of 3657 success.
	    });
		
	    this.on("errormultiple", function(files, response) {
	      // Gets triggered when there was an error sending the files.
	      // Maybe show form again, and notify user of error
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