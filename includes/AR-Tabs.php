<?php
if( !defined( 'MEDIAWIKI' ) ){
        die( "This is not a valid access point.\n" );
}

$wgHooks['SkinTemplateNavigation'][] = 'replaceTabs';
function replaceTabs( &$skin, &$links) {
        // Add an additional link
        //$subPath = explode("/", $_SERVER[REQUEST_URI])[1]; #'wiki'
        //$pageName = str_replace("/".$subPath, "", $_SERVER[REQUEST_URI]);
        $links['views']['subpage'] = array(
                'class' => false, // false or 'selected', defines whether the tab should be highlighted
                'text' => 'Unterseite erstellen', // what the tab says
                'href' => "https://$_SERVER[HTTP_HOST]/wiki/CreatePage?superpage=".explode("?", str_replace("/wiki/", "", "$_SERVER[REQUEST_URI]"))[0],
        );
        return true;
}
