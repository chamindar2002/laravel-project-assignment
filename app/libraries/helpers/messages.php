<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of messages
 *
 * @author chaminda
 */
class Messages {
    //put your code here
    private static $crud_messages = array(
        'add_success' => 'New Record Added Successfully.',
        'edit_success' => 'Data Saved Successfully.',
        'delete_success' => 'Record Deleted Successfully.',
    );
    
    public static function getCrudMessages($msg_key){
        if(array_key_exists($msg_key, self::$crud_messages))
                        return self::$crud_messages[$msg_key];
                
     return $msg_key;           
    }
}

?>
