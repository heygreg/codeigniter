<?php

class Geolocation {
    
    
    /*
     *  Geolocation Library for CodeIgniter 2
     *  @author:  Greg :: github.com/heygreg
     *  Dependencies:  http://www.ipinfodb.com/index.php API KEY
     *  My Key: *** INSERT KEY HERE ***
     */
    
    
    public function get_client_ip() {
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
        {
            
            $ip = $_SERVER['HTTP_CLIENT_IP'];
            
        }
        
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        {
            
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            
        } 
        
        else 
        {
            
            $ip = $_SERVER['REMOTE_ADDR'];
            
        }
        
        switch($ip)
        {
            
            case("::1"):
                
                return "Home IP Address";
                
            default:
                
                return $ip;
                
        }

    }
    
    public function location_by_ip($ip_address) {
        
        $ch = curl_init();
            
                $headers = array(
                                    'Accept: application/json',
                                    'Content-Type: application/json'
                            );
                
                
                curl_setopt($ch, CURLOPT_URL, "http://api.ipinfodb.com/v3/ip-city/?key=**INSERT KEY HERE***&ip=" . $ip_address . "&format=json");
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $location_data = curl_exec($ch);
        if(!$location_data)
        {
            
            return "Location data not found.";
            
        }
        
        return $location_data;
        
        
    }
}
