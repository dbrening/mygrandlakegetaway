(function ($) {
	'use strict'
	$(function () {
		$('pre code').each(function ( i, block ) {
			hljs.highlightBlock(block);

			var btnHtml = '<div class="btn-clipboard-wrapper"><button class="btn-clipboard btn btn-maincolor btn-sm" title="Copy to clipboard"><i class="fa fa-copy"></i> Copy</button></div>';
			$(this).before(btnHtml);
			$('.btn-clipboard').tooltip();
		});

		var clipboard = new Clipboard('.btn-clipboard', {
			target: function (trigger) {
				return trigger.parentNode.nextElementSibling
			}
		});

		clipboard.on('success', function (e) {
			$(e.trigger)
				.attr('title', 'Copied!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'Copy to clipboard')
				.tooltip('_fixTitle')

			e.clearSelection()
		});

		clipboard.on('error', function (e) {
			var modifierKey = /Mac/i.test(navigator.userAgent) ? '\u2318' : 'Ctrl-'
			var fallbackMsg = 'Press ' + modifierKey + 'C to copy'

			$(e.trigger)
				.attr('title', fallbackMsg)
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'Copy to clipboard')
				.tooltip('_fixTitle')
		})
	})
}(jQuery));