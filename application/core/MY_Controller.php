<?php

class MY_Controller extends CI_Controller {
    
   function __construct(){
       
       // Load the CI_Controller
       parent::__construct();
       
       // Grab the users IP address
       $user_ip = $this->geolocation->get_client_ip();
       
       // Return an object of the users location data
       $location_data = $this->geolocation->location_by_ip($user_ip);
      
       // Decode our JSON response
       $location = json_decode($location_data);
  
       /*
        * Object $location:
        
            $location->ipAddress;
            $location->countryCode;
            $location->countryName;
            $location->regionName;
            $location->cityName;
            $location->zipCode;
            $location->latitude;
            $location->longitude; 

                                    */
   }
  
    
}