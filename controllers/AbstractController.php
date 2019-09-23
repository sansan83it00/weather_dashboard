<?php

/**
 * Class AbstractController
 *
 * The father of the controllers, which has the getBlock function to display a view
 *
 */
class AbstractController
{
    /**
     * Includes the template asked by $templateName with the data used to complete the page.
     *
     * @param $templateName
     * @param array $templateParam
     *
     * @return void
     */
    function getBlock($templateName, $templateParam = array()){
        $templatePath = "views/$templateName.php";
        extract($templateParam);
		
        require "$templatePath";
    }
}