<?php
/**
 * @package     ox
 * @copyright   Copyright (C) 2018 Zorca. All rights reserved.
 * @license     See LICENSE file for details.
 */

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

if (!function_exists('ox_helper')) {
    function ox_helper()
    {
        return 'ox_helper';
    }
}

if (!function_exists('ox_check_domain')) {
    function ox_check_domain($domain)
    {
        $domain_regex = '/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/';
        if (preg_match($domain_regex, $domain)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('ox_mkdir')) {
    function ox_mkdir($dir, $mode = 0775)
    {
        $fs = new Filesystem();
        $fs->mkdir($dir, $mode);
    }
}

if (!function_exists('ox_chown')) {
    function ox_chown($dir, $owner, $group)
    {
        $fs = new Filesystem();
        $fs->chown($dir, $owner, true);
        $fs->chgrp($dir, $group, true);
    }
}
