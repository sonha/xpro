/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    //config.filebrowserBrowseUrl = '/admin/shg_admin/js/kcfinder/browse.php?type=files';
    config.filebrowserBrowseUrl = '/admin/VCMediaManager';
    //config.filebrowserImageBrowseUrl = '/admin/shg_admin/js/kcfinder/browse.php?type=images';
    config.filebrowserImageBrowseUrl = '/admin/VCMediaManager';
    //config.filebrowserFlashBrowseUrl = '/admin/shg_admin/js/kcfinder/browse.php?type=flash';
    config.filebrowserFlashBrowseUrl = '/admin/VCMediaManager';
    config.filebrowserUploadUrl = '/admin/shg_admin/js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '/admin/shg_admin/js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/admin/shg_admin/js/kcfinder/upload.php?type=flash';
    config.width = 600;
    config.extraPlugins = 'sohagame,youtube,insertpre';


    config.insertpre_class = 'prettyprint';
};
