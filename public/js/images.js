 
Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;	
let token = $('meta[name="csrf-token"]').attr('content');

// var imgs = $('#uploadImgs');	



$(function() {

    

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
	    		url: '/listings/store/update',
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
	}, init:function() {

        // Get images
        var myDropzone = this;
        var adid = $('#adid').val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: "/imageapi",
        type: 'post',
        data: {request: 2, adi:adid},
        dataType: 'json',
        success: function(data){
            imagepath = data.imageloca;
            $("#uploadImg").attr("src", imagepath);
         
        $.each(data.datas, function (key, value) {
      
            
          var file = {name: value.name, size:value.size};
          myDropzone.options.addedfile.call(myDropzone, file);
          myDropzone.options.thumbnail.call(myDropzone, file, value.path);
          myDropzone.emit("complete", file);
        
        });
        }
        });
        },removedfile: function(file) 
        {
            if (this.options.dictRemoveFile) {
              return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                if(file.previewElement.id != ""){
                    var name = file.previewElement.id;
                }else{
                    var name = file.name;
                }
                //console.log(name);
                $.ajax({
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    type: 'POST',
                    url: "/listingimage/delete",
                    data: {filename: name},
                    success: function (data){
                        alert(data.success +" File has been successfully removed!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
               });
            }		
        },
  });

  var container = $('#containers'),containers = $('#containeers'),inputFile = $('#file'), img,  btn, txt = 'Browse', txtAfter = 'Browse another pic';
 
	if(!container.find('#upload').length){
		container.find('.input').append('<input type="button" value="'+txt+'" id="upload" class="btn btn-primary btn-block ">');
        btn = $('#upload');
    

    containers.prepend( `<img  src="" class=" imgs" alt="Uploaded file" id="uploadImg" width="100">`);
        img = $('#uploadImg');
      
	}
			
	btn.on('click', function(){
        img.animate({opacity: 0}, 300);
        inputFile.click();
      val =1;
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
            console.log(val);
            console.log(imagepath);
		}
		
		btn.val( txtAfter );
    });
    


 
});


// $('.dropzone').dropzone({
   
//     url: "/imageapi",

// maxFiles: 5, 
//    maxFilesize: 4,
//    //~ renameFile: function(file) {
//        //~ var dt = new Date();
//        //~ var time = dt.getTime();
//       //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
//    //~ },
//    acceptedFiles: ".jpeg,.jpg,.png,.gif",
//    addRemoveLinks: true,
//    timeout: 50000,
  
//    removedfile: function(file) 
//    {
//        if (this.options.dictRemoveFile) {
//          return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
//            if(file.previewElement.id != ""){
//                var name = file.previewElement.id;
//            }else{
//                var name = file.name;
//            }
//            //console.log(name);
//            $.ajax({
//                headers: {
//                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                      },
//                type: 'POST',
//                url: "/listingimage/delete",
//                data: {filename: name},
//                success: function (data){
//                    alert(data.success +" File has been successfully removed!");
//                },
//                error: function(e) {
//                    console.log(e);
//                }});
//                var fileRef;
//                return (fileRef = file.previewElement) != null ? 
//                fileRef.parentNode.removeChild(file.previewElement) : void 0;
//           });
//        }		
//    },

//    success: function(file, response) 
//    {
//        file.previewElement.id = response.success;
//        //console.log(file); 
//        // set new images names in dropzone’s preview box.
//        var olddatadzname = file.previewElement.querySelector("[data-dz-name]");   
//        file.previewElement.querySelector("img").alt = response.success;
//        olddatadzname.innerHTML = response.success;
//    },
//    error: function(file, response)
//    {
//       if($.type(response) === "string")
//            var message = response; //dropzone sends it's own error messages in string
//        else
//            var message = response.message;
//        file.previewElement.classList.add("dz-error");
//        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
//        _results = [];
//        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
//            node = _ref[_i];
//            _results.push(node.textContent = message);
//        }
//        return _results;
//    }
   

// });