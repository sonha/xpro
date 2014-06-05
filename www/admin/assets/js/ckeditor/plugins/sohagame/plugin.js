
// Register the plugin within the editor.
$(
function(){
CKEDITOR.plugins.add( 'sohagame', {

	// Register the icons. They must match command names.
	icons: 'sohagame',

	// The plugin initialization logic goes inside this method.
	init: function( editor ) {

		// Define an editor command that inserts a timestamp.
		editor.addCommand( 'insertSohagameImages', {

			// Define the function that will be fired when the command is executed.
			exec: function( editor ) {
				window.__________cke = editor;
                if(typeof($.cke_loadImages) == "undefined"){
                    alert("Missing javascript library: imagesPicker @vubuivan(at)sohagame.vn");
                    return;
                }else $.cke_loadImages();
			}
		});



        // Create the toolbar button that executes the above command.
		editor.ui.addButton( 'sohagame', {
			label: 'Chèn Ảnh',
			command: 'insertSohagameImages',
			toolbar: 'insert',
            icon : this.path + 'icons/sohagame.png'
		});

	}
});
}
);