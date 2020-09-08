<?php
/***********************************
 * Author: Zach
 * Date: 4/11/16
 * Licence: MIT
 ***********************************/

/***********************************
 * Edited By: Erwin
 * Date: 8/9/20
 * Licence: MIT
 ***********************************/

if ( ! function_exists('cas')) {
    /**
     * Initiate CAS hook.
     *
     * @return \Subfission\Cas\CasManager
     */
    function cas()
    {
        return app('cas');
    }
}

if (!function_exists('cas_citizen')) {
    /**
     * Initiate CAS hook.
     *
     * @return \Subfission\Cas\CasManager
     */
    function cas_citizen()
    {
        return app('cas_citizen');
    }
}
