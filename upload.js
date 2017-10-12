<script>
var uploader = new webUploader.creat({
	auto:true,
	swf:"/webuploader/uploader.swf",
	server:"/article/upload",
	pick:"#picker",
	resize:false

});

uploader.on('fileQueued',function(file){
	var $li = $('<div id="' + file.id + '" class="file-item thumbnail">' + '</div>'),
	$img = $li.find('img');

	$('#picker').append($li);
});

</script>