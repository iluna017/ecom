/**
 * Module for displaying "Waiting for..." dialog using Bootstrap
 *
 * @author Eugene Maslovich <ehpc@em42.ru>
 */
/*<div class="modal" id="myModal2" data-backdrop="static">
	<div class="modal-dialog modal-sm">
      <div class="modal-content bodyModal">
        <div class="panelHead">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Imagen</h4>
        </div>
        <div id="modalBody" name="modalBody" class="modal-body">
          
        </div>
      <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
      </div>
    </div>
</div>*/
function modal(title, body, hiddenFunction){
	if($("#divPrincipal").is(':visible')){
		$("#divPrincipal").modal('hide');
	}

	var $modal = $(
		'<div id="divPrincipal" class="modal"  role="dialog" >' +
		'<div class="modal-dialog">' +
	      '<div class="modal-content bodyModal">'+
	        '<div class="modal-header panelHead">'+
	          '<h4 class="modal-title">'+title+'</h4>'+
	        '</div>'+
	        '<div class="modal-body">'+body+'</div>'+
	        '<div class="modal-footer">'+
	          '<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>'+
	        '</div>'+
	      '</div></div></div>');
	$modal.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-sm');
	$modal.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
		if(hiddenFunction != null) {
			$('#divPrincipal').append('<script type=\"text/javascript\"> '+hiddenFunction+' </script>');
		}
		$('#divPrincipal').remove();
	});
		$modal.modal('show');

}

function modalDocuments(title, documents){
	var $modal=$('<div class="modal fade" id="myModal" role="dialog">'+
	    '<div class="modal-dialog">'+
	      '<!-- Modal content-->'+
	      '<div class="modal-content" style="background-color:#DED5E5">'+
	        '<div class="modal-header panelHead">'+
	          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
	          '<h4 class="modal-title">'+title+'</h4>'+
	        '</div>'+
	        '<div class="modal-body backtable">'+
	          '<table class="table table-hover" id="documents" name="documents">'+documents+'</table>'+
	        '</div>'+
	        '<div class="modal-footer">'+
	          '<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>'+
	        '</div>'+
	      '</div>'+
	    '</div>'+
	  '</div>');
	var height = $(window).height() - 200;
	$modal.find(".modal-body").css("max-height", height);
	$modal.modal('show');
}

var waitingDialog = waitingDialog || (function ($) {
    'use strict';

	// Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="z-index:1060;padding-top:55%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			if (typeof options === 'undefined') {
				options = {};
			}
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			var settings = $.extend({
				dialogSize: 'm',
				progressType: '',
				onHide: null // This callback runs after the dialog was hidden
			}, options);

			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Adding callbacks
			if (typeof settings.onHide === 'function') {
				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
					settings.onHide.call($dialog);
				});
			}
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	};

})(jQuery);
