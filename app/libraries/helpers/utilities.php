<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpers
 *
 * @author chaminda
 */
class utilities{
    //put your code here
    
    public static function paginationPageSize(){
        return 5;
    }
    
    public static function getAppDetails(){
        return array(
            'name'=>'Assignment:chamindar2002@yahoo.com/0773784828'
        );
    }


    public static function accessControlFlags(){
        return array('block' => 'BLOCK', 'allow' => 'ALLOW');
    }
    
    public static function getDateFormat(){
        return 'd-m-Y';
    }
    
    public static function getXmlFeedFilePath($file){
        return base_path().'/public/xmlfeeds/'.$file;
    }
    
    public static function stripInvalidXml($value)
    {
        $ret = "";
        $current;
        if (empty($value)) {
            return $ret;
        }

        $length = strlen($value);
        for ($i=0; $i < $length; $i++) {
            $current = ord($value{$i});
            if (($current == 0x9) ||
                ($current == 0xA) ||
                ($current == 0xD) ||
                (($current >= 0x28) && ($current <= 0xD7FF)) ||
                (($current >= 0xE000) && ($current <= 0xFFFD)) ||
                (($current >= 0x10000) && ($current <= 0x10FFFF))) {
                $ret .= chr($current);
            }
            else {
                $ret .= " ";
            }
        }
        return $ret;
    }
    
    
}

?>
