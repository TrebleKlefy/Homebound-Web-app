
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });


    //
    // $('.preview').show().attr('src',1600246527.jpeg);
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 200,
            height: 200
        }
    });


    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });


    $('.upload-result').on('click', function (ev) {
        // ev.preventDefault();
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajax({
                url: "/profile/storeimage",
                type: "POST",
                data: {"image":resp},
                success: function (data) {
                    $('.card-profile')[0].reset();
                    html = '<img src="' + resp + ' " />';
                    $("#upload-demo").html(html);
                }
            });
        });
    });
