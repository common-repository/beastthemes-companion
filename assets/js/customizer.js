jQuery( document ).ready(function($) {
	"use strict";

	/**
	 * Pill Checkbox Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	$( ".pill_checkbox_control .sortable" ).sortable({
		placeholder: "pill-ui-state-highlight",
		update: function( event, ui ) {
			BeastthemesGetAllPillCheckboxes($(this).parent());
		}
	});

	$('.pill_checkbox_control .sortable-pill-checkbox').on('change', function () {
		BeastthemesGetAllPillCheckboxes($(this).parent().parent().parent());
	});

	// Get the values from the checkboxes and add to our hidden field
	function BeastthemesGetAllPillCheckboxes($element) {
		var inputValues = $element.find('.sortable-pill-checkbox').map(function() {
			if( $(this).is(':checked') ) {
				return $(this).val();
			}
		}).toArray();
		$element.find('.customize-control-sortable-pill-checkbox').val(inputValues).trigger('change');
	}

});

jQuery( document ).ready( function($) {

	/* === Sortable Multi-CheckBoxes === */

	/* Make it sortable. */
	$( 'ul.beastthemes_companion-share-multicheck-sortable-list' ).sortable({
		handle: '.beastthemes_companion-share-multicheck-sortable-handle',
		axis: 'y',
		update: function( e, ui ){
			$('input.beastthemes_companion-share-multicheck-sortable-item').trigger( 'change' );
		}
	});

	/* On changing the value. */
	$( "input.beastthemes_companion-share-multicheck-sortable-item" ).on( 'change', function() {

		/* Get the value, and convert to string. */
		this_checkboxes_values = $( this ).parents( 'ul.beastthemes_companion-share-multicheck-sortable-list' ).find( 'input.beastthemes_companion-share-multicheck-sortable-item' ).map( function() {
			var active = '0';
			if( $(this).prop("checked") ){
				var active = '1';
			}
			return this.name + ':' + active;
		}).get().join( ',' );

		/* Add the value to hidden input. */
		$( this ).parents( 'ul.beastthemes_companion-share-multicheck-sortable-list' ).find( 'input.beastthemes_companion-share-multicheck-sortable' ).val( this_checkboxes_values ).trigger( 'change' );

	});

	/* === Multi-CheckBoxes === */

	/* On changing the value. */
	$( "input.beastthemes_companion-share-multicheck-item" ).on( 'change', function() {

		/* Get the value (only the "checked" item), and convert to comma separated string. */
		this_checkboxes_values = $( this ).parents( 'ul.beastthemes_companion-share-multicheck-list' ).find( 'input.beastthemes_companion-share-multicheck-item:checked' ).map( function() {
			return this.name;
		}).get().join( ',' );

		/* Add the value to hidden input. */
		$( this ).parents( 'ul.beastthemes_companion-share-multicheck-list' ).find( 'input.beastthemes_companion-share-multicheck' ).val( this_checkboxes_values ).trigger( 'change' );

	});
});