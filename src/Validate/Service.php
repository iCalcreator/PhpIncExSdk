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
declare( strict_types = 1 );
namespace Kigkonsult\PhpIncExSdk\Validate;

use Kigkonsult\PhpIncExSdk\Dto\Service as Dto;

class Service extends ValidateBase
{
    /**
     * Service
     *
     * @param Dto $dto
     * @param array|null $result
     * @param string|null $upper
     * @return bool
     */
    public static function check( Dto $dto, ?array & $result = [], ?string $upper = '' ) : bool
    {
        $return = true;
        $upper  = self::getClassUpper( $upper );

        if( ! $dto->isRequiredSet()) { // i.e. none set
            $return = false;
            $key    = $upper . self::$PROPLIST;
            static $IMPLODELIST = [
                self::SERVICENAME,
                self::PORT,
                self::PORTLIST,
                self::PROTOCODE,
                self::PROTOTYPE,
                self::PROTOFIELD,
                self::APPLICATIONHEADERFIELD,
                self::EMAILDATA,
                self::APPLICATION
            ];
            $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList($IMPLODELIST ));
        }

        if( $dto->isServiceNameSet() &&
            ( false === ServiceName::check(
                $dto->getServiceName(),
                $result,
                self::getKey(  $upper, self::SERVICENAME )))) {
            $return = false;
        }

        if( $dto->isApplicationHeaderFieldSet()) {
            $key    = self::getKey(  $upper, self::APPLICATIONHEADERFIELD );
            foreach( $dto->getApplicationHeaderField() as $x => $item ) {
                if( false === ExtensionType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isEmailDataSet() &&
            ( false === EmailData::check(
                $dto->getEmailData(),
                $result,
                self::getKey(  $upper, self::EMAILDATA )))) {
            $return = false;
        }

        if( $dto->isApplicationSet() &&
            ( false === SoftwareType::check(
                $dto->getApplication(),
                $result,
                self::getKey(  $upper, self::APPLICATION )))) {
            $return = false;
        }

        return $return;
    }
}
