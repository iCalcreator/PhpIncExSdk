<?php
/**
 * PhpIncExSdk is the PHP SDK implementation of rfc8727,
 *            JSON Binding of the Incident Object Description Exchange Format (rfc7970)
 *
 * This file is a part of PhpIncExSdk.
 *
 * @author    Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @copyright 2022 Kjell-Inge Gustafsson, kigkonsult, All rights reserved
 * @link      https://kigkonsult.se
 * @license   Subject matter of licence is the software PhpIncExSdk.
 *            The above copyright, link, package and this licence notice shall
 *            be included in all copies or substantial portions of the PhpIncExSdk.
 *
 *            PhpIncExSdk is free software: you can redistribute it and/or modify
 *            it under the terms of the GNU Lesser General Public License as
 *            published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *            PhpIncExSdk is distributed in the hope that it will be useful,
 *            but WITHOUT ANY WARRANTY; without even the implied warranty of
 *            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *            GNU Lesser General Public License for more details.
 *
 *            You should have received a copy of the GNU Lesser General Public License
 *            along with PhpIncExSdk. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * test/autoload.php
 *
 * PhpIncExSdk package test autoloader
 */
spl_autoload_register(
    function( $class ) {
        static $BS      = '\\';
        static $PHP     = '.php';
        static $PREFIX  = 'Kigkonsult\\PhpIncExSdk\\';
        static $SRC     = 'src';
        static $SRCDIR  = null;
        static $TEST    = 'test';
        static $TESTDIR = null;
        if( 0 !== strncmp( $PREFIX, $class, 23 )) {
            return false;
        }
        $class = substr( $class, 23 );
        if( str_contains( $class, $BS ) ) {
            $class = str_replace( $BS, DIRECTORY_SEPARATOR, $class );
        }
        if( is_null( $SRCDIR )) {
            $SRCDIR  = dirname( __DIR__ ) . DIRECTORY_SEPARATOR . $SRC . DIRECTORY_SEPARATOR;
            $TESTDIR = dirname(__DIR__ ) . DIRECTORY_SEPARATOR . $TEST . DIRECTORY_SEPARATOR;
        }
        $file = $SRCDIR . $class . $PHP;
        if( file_exists( $file )) {
            include $file;
        }
        else {
            $file = $TESTDIR . $class . $PHP;
            if( file_exists( $file )) {
                include $file;
            }
        }
    }
);