<?php
if( !defined( 'MEDIAWIKI' ) ){
        die( "This is not a valid access point.\n" );
}

//https://www.mediawiki.org/wiki/Manual%3aHooks/SkinTemplateNavigation
$wgHooks['SkinTemplateNavigation'][] = function ( &$skin, &$links ) {
        // Add an additional link
        //https://stackoverflow.com/questions/18442495/how-to-get-current-page-url-in-mediawiki
        $links['views']['subpage'] = array(
                'class' => false, // false or 'selected', defines whether the tab should be highlighted
                'text' => 'Unterseite erstellen', // what the tab says
                'href' => "https://$_SERVER[HTTP_HOST]/wiki/CreatePage?superpage=" . $skin->getTitle()->getDBkey(),
        );

	//not placed properly with Skin:Timeless -> use javascript
	//$request = $skin->getRequest();
	//$reveal = $request->getText( 'reveal' );
	//$links['actions']['slide'] = array(
	//	'class' => ( $reveal == 'true') ? 'selected' : false,
	//	'text' => "Slideshow",
	//	'href' => $skin->makeArticleUrlDetails($skin->getTitle()->getFullText(), 'reveal=true' )['href']
	//);

        return true;
};
