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

use Kigkonsult\PhpIncExSdk\Dto\System as Dto;

class System extends ValidateBase
{
    /**
     * System
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

        $key    = self::getKey(  $upper, self::NODE );
        if( ! $dto->isRequiredSet()) { // i.e. Node
            $return = false;
            $result[$key] = self::$REQUIRED;
        }
        elseif( false === Node::check( $dto->getNode(), $result, $key )) {
            $return = false;
        }
        if( ! self::extAttrOk( $dto->getCategory(), $dto->isExtCategorySet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::CATEGORY, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getOwnership(), $dto->isExtOwnershipSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::OWNERSHIP, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isNodeRoleSet()) {
            $key    = self::getKey(  $upper, self::NODEROLE );
            foreach( $dto->getNodeRole() as $x => $item ) {
                if( false === NodeRole::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isServiceSet()) {
            $key    = self::getKey(  $upper, self::SERVICE );
            foreach( $dto->getService() as $x => $item ) {
                if( false === Service::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isOperatingSystemSet()) {
            $key    = self::getKey(  $upper, self::OPERATINGSYSTEM );
            foreach( $dto->getOperatingSystem() as $x => $item ) {
                if( false === SoftwareType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isCounterSet()) {
            $key    = self::getKey(  $upper, self::COUNTER );
            foreach( $dto->getCounter() as $x => $item ) {
                if( false === Counter::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isDescriptionSet()) {
            $key    = self::getKey(  $upper, self::DESCRIPTION );
            foreach( $dto->getDescription() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isAdditionalDataSet()) {
            $key    = self::getKey(  $upper, self::ADDITIONALDATA );
            foreach( $dto->getAdditionalData() as $x => $item ) {
                if( false === ExtensionType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        return $return;
    }
}
