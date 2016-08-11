$(function () {
	var inputFile = $('input[name=file]');
	var uploadURI = $('#form-upload').attr('action');
	var progressBar = $('#progress-bar');

	//listFilesOnServer();

	$('#upload-btn').on('click', function(event) {
		var fileToUpload = inputFile[0].files[0];
		// make sure there is file to upload
		if (fileToUpload != 'undefined') {
			// provide the form data
			// that would be sent to sever through ajax
			var formData = new FormData();
			formData.append("file", fileToUpload);

			// now upload the file using $.ajax
			$.ajax({
				url: uploadURI,
				type: 'post',
				data: formData,
				dataType: "JSON",
				processData: false,
				contentType: false,
				success: function(data) {
					if(data.status){
						_xhr();
					}else{
						//$('[id=BiblioFile').parent().parent().addClass('has-error');
              			//$('[id=spanerror').next().text(data.errors);
              			alert(data.errors);
					}
				},
				
			});
		}
	});

	$('body').on('click', '.remove-file', function () {
		var me = $(this);

		$.ajax({
			url: uploadURI,
			type: 'post',
			data: {file_to_remove: me.attr('data-file')},
			success: function() {
				me.closest('li').remove();
			}
		});

	})

	$('body').on('change.bs.fileinput', function(e) {
		$('.progress').hide();
		progressBar.text("0%");
		progressBar.css({width: "0%"});
	});
});

function _xhr()
{
	var xhr = new XMLHttpRequest();
	xhr.upload.addEventListener("progress", function(event) {
		if (event.lengthComputable) {
			var percentComplete = Math.round( (event.loaded / event.total) * 100 );
			// console.log(percentComplete);	
			$('.progress').show();
			progressBar.css({width: percentComplete + "%"});
			progressBar.text(percentComplete + '%');
		};
	}, false);
	return xhr;
}