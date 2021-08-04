<?php
    include "settings.php";

    /**
     * Get config option value 
     * 
     * @param string $optionName
     * @param mixed $default
     * 
     * @return mixed
     *
     * @throw Exception
     */
    function getConfig($optionName, $default = '') {
        $countArgs = func_num_args();
        $keys = explode(".", $optionName);
        $optionValue = getSettings();
        
        try{
            foreach ($keys as $key){
                if (array_key_exists($key, (is_array($optionValue) === true) ? $optionValue : []) === true) {
                    $optionValue = $optionValue[$key];
                }elseif ($countArgs === 2){
                    return $default;
                }else{
                    throw new Exception("Option not installed");
                }
            };
        
            return  $optionValue;
        }catch (Exception $e) {
            return $e;
        }
    }
 
    echo (getConfig("db.users"));