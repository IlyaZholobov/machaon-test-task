<?php
    include "settings.php"
    /**
     * Get config option value 
     * 
     * @param string $optionName
     * @param string $default
     * 
     * @return string|array|mixed
     * @throw Exception
     */
    function getConfig($optionName, $default = '') {
        $keys = explode(".", $optionName);
        $optionValue = getSettings();
        
        try{
            foreach ($keys as $key){
            if (isset($optionValue[$key]) === true){
                $optionValue = $optionValue[$key];
            }elseif (empty($default) === false){
                return $default;
            }else{
                throw new Exception("Option not installed");
            }
        };
        
        return  $optionValue;
        }catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }
    }
  
echo (getConfig("db.hosts"));