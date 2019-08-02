$(document).on("change",'#photo_id',function(){
	var data = $(this)[0].files; //this file data
	$.each(data, function(index, file){ //loop though each file
		if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
			var fRead = new FileReader(); //new filereader
			fRead.onload = (function(file){ //trigger function on successful read
			return function(e) {
				// var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
				$('#preview_image').prop('src',e.target.result);
				// $('#thumb-output').append(img); //append image to output element
			};
		  	})(file);
			fRead.readAsDataURL(file); //URL representing the file's data.
		}
	});
});