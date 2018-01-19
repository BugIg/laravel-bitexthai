<?php
namespace BugIg\Bitexthai;

use Illuminate\Support\Facades\Facade;

class BitexthaiAPIFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'BitexthaiAPI';
    }
}