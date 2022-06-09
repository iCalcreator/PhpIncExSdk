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

use Kigkonsult\PhpIncExSdk\Dto\Contact as Dto;

class Contact extends ValidateBase
{
    /**
     * Contact
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

        if( ! $dto->isRequiredSet()) {
            $return = false;
            if( ! $dto->isRoleSet() ) {
                self::updResultWithReqPropname( $upper, self::ROLE, $result );
            }
            if( ! $dto->isTypeSet() ) {
                self::updResultWithReqPropname( $upper, self::TYPE, $result );
            }
            if( ! $dto->isRequiredAnySet()) {
                $key = $upper . self::$PROPLIST;
                static $IMPLODELIST = [
                    self::CONTACTNAME,
                    self::CONTACTTITLE,
                    self::DESCRIPTION,
                    self::REGISTRYHANDLE,
                    self::POSTALADDRESS,
                    self::EMAIL,
                    self::TELEPHONE,
                    self::TIMEZONE,
                    self::CONTACT,
                    self::ADDITIONALDATA
                ];
                $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList( $IMPLODELIST ));
            }
        }
        if( ! self::extAttrOk( $dto->getRole(), $dto->isExtRoleSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::ROLE, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getType(), $dto->isExtTypeSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::TYPE, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isContactnameSet()) {
            $key    = self::getKey(  $upper, self::CONTACTNAME );
            foreach( $dto->getContactName() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isContactTitleSet()) {
            $key    = self::getKey(  $upper, self::CONTACTTITLE );
            foreach( $dto->getContactTitle() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
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

        if( $dto->isRegistryHandleSet()) {
            $key    = self::getKey(  $upper, self::REGISTRYHANDLE );
            foreach( $dto->getRegistryHandle() as $x => $item ) {
                if( false === RegistryHandle::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isPostalAddressSet()) {
            $key    = self::getKey(  $upper, self::POSTALADDRESS );
            foreach( $dto->getPostalAddress() as $x => $item ) {
                if( false === PostalAddress::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isEmailSet()) {
            $key    = self::getKey(  $upper, self::EMAIL );
            foreach( $dto->getEmail() as $x => $item ) {
                if( false === Email::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isTelephoneSet()) {
            $key    = self::getKey(  $upper, self::TELEPHONE );
            foreach( $dto->getTelephone() as $x => $item ) {
                if( false === Telephone::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isContactSet()) {
            $key    = self::getKey(  $upper, self::CONTACT );
            foreach( $dto->getContact() as $x => $item ) {
                if( false === self::check( $item, $result, self::getKeyIxd( $key, $x ))) {
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
