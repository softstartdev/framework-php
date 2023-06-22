<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\classes;

use MxSoftstart\FrameworkPhp\classes\enties\User as STFUser;

class User extends  STFUser {

    function __construct($appName) {
        
        parent::__construct($appName);
	}

}