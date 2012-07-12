<?php

class Highlight_View_Helper_GetHighlightContainer extends Zend_View_Helper_Abstract
{
    /**
     * returns the highlight container for the given name or proxy
     */
    public function getHighlightContainer($attached)
    {
        $table = Centurion_Db::getSingleton('highlight/container');
        
        Centurion_Cache_TagManager::addTag($table);
        Centurion_Cache_TagManager::addTag(Centurion_Db::getSingleton('highlight/row'));
        
        if(is_string($attached)) {
            $containerRow = Centurion_Db::getSingleton('highlight/container')->findOneByName($attached);
        }
        else if($attached instanceof Centurion_Db_Table_Row_Abstract) {
            $containerRow = Centurion_Db::getSingleton('highlight/container')->findOneByProxy($attached);
        }
        
        return $containerRow;
    }
}
