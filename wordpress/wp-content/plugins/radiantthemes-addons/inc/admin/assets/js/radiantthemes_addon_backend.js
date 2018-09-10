jQuery(document).ready(function($) {
	$('#vc_templates-editor-button, #vc-templatera-editor-button, #vc_templates-more-layouts').on('click', function() {
		$('.templates-filter-list .filter').removeClass('active');
		$('.templates-filter-list .filter:first-child').addClass('active');
		var $btns = $('.templates-filter-list .filter').click(function() {
			if (this.id == 'all') {
				$('#RadiantthemesTemplates > .vc_ui-template').fadeIn(450);
			} else {
				var $el = $('.' + this.id).fadeIn(450);
				$('#RadiantthemesTemplates > .vc_ui-template').not($el).hide();
			}
			$btns.removeClass('active');
			$(this).addClass('active');
		})

	});

	$('#vc_inline-frame-wrapper iframe').load(function() {
		var iframe = $('#vc_inline-frame-wrapper iframe').contents();
		iframe.find("#vc_templates-more-layouts").click(function() {
			$('.templates-filter-list .filter').removeClass('active');
			$('.templates-filter-list .filter:first-child').addClass('active');
			var $btns = $('.templates-filter-list .filter').click(function() {
				if (this.id == 'all') {
					$('#RadiantthemesTemplates > .vc_ui-template').fadeIn(450);
				} else {
					var $el = $('.' + this.id).fadeIn(450);
					$('#RadiantthemesTemplates > .vc_ui-template').not($el).hide();
				}
				$btns.removeClass('active');
				$(this).addClass('active');
			})
		});
	});

});