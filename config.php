<?php
    /**
     * Get config
     * 
     * @return array
     */
    function getSettings() {
        return [
            "site_name" => "My site",
            "site_url" => "http://mysite.ru",
            "assets" => [
                "version" => 2,
                "minify" => true,
            ],
            "db" => [
                "user" => "admin",
                "password" => "ifghigh8y8rt347ghi",
                "name" => "my_database"
            ],
            "app" => [
                "services" => [
                    "resizer" => [
                        "prefer_format" => "webp",
                        "fallback_format" => "jpeg"
                    ]
                ]
            ]
        ];
    }
        
    /**
     * Get config option value 
     * 
     * @param string $optionName
     * @param string $default
     * 
     * @return mixed
     *
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
