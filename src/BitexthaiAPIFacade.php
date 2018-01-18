<?php
namespace BugIM\bitexthai;

use Illuminate\Support\Facades\Facade;

class BitexthaiAPIFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'bitexthai';
    }
}