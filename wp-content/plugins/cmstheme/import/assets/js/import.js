(function($){
	'use strict';
	$(document).ready(function(){
		var total = 0;
		$(demo.files).each(function(){
			var data = {
				'action': 'cmstheme_import_copy_file',
				'file': this
			};
			$.post(ajaxurl, data, function(response) {
				total++;
				if(total == demo.files.length){
					$('span.copy-image').html('1. Download Images: <span style="color: green">Done.</span>');
					$('span.import-data').html('<strong>2. Import data</strong>: ...');
					var data = {
						action: 'cmstheme_import_import_data',
						demo: demo.demo,
						source_url: demo.source_url
					}
					$.post(ajaxurl, data, function(response){
						if(response.status == 'failed'){
							$('span.import-data').html('2. Import Data: <span style="color:red">failed</span>.' + response.msg);
						}else{
							$('span.import-data').html('2. Import Data: <span style="color:green">Done.</span>.');
						}
					});
				}else{
					$('span.copy-image').html('<strong>1. Download Images</strong>: ' + total + ' of ' + demo.files.length + ' (' + response.msg + ')');
				}
			});
		});
	});
})(jQuery)
