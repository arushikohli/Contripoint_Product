;(function (ssaFormEmbed, undefined) {

	var appointmentId = null;
	// checks if the iframe is on the page.
	var updateFormField = function(e) {
		appointmentId = e.data.id;
		var container = e.source.frameElement.parentNode;
		var input = container.querySelector('.ssa_appointment_form_field_appointment_id')
		input.value = appointmentId
		input.dispatchEvent(new Event('change'));

	}

	ssaFormEmbed.listen = function(e) {
		if (typeof e.data == 'object' && e.data.hasOwnProperty('ssaType')) {
			if (e.data.ssaType === 'appointment') {
				updateFormField(e);
			}
		}
	}

}(window.ssaFormEmbed = window.ssaFormEmbed || {}));

window.addEventListener('message', ssaFormEmbed.listen, false);