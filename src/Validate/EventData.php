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

use Kigkonsult\PhpIncExSdk\Dto\EventData as Dto;

class EventData extends ValidateBase
{
    /**
     * EventData
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
            $key = $upper . self::$PROPLIST;
            static $IMPLODELIST = [
                self::DESCRIPTION,
                self::DETECTTIME,
                self::STARTTIME,
                self::ENDTIME,
                self::RECOVERYTIME,
                self::REPORTTIME,
                self::CONTACT,
                self::DISCOVERY,
                self::ASSESSMENT,
                self::METHOD,
                self::SYSTEM,
                self::EXPECTATION,
                self::RECORDDATA,
                self::EVENTDATA,
                self::ADDITIONALDATA
            ];
            $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList( $IMPLODELIST ));
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isDescriptionSet()) {
            $key    = self::getKey(  $upper, self::DESCRIPTION );
            foreach( $dto->getDescription() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isContactSet()) {
            $key    = self::getKey(  $upper, self::CONTACT );
            foreach( $dto->getContact() as $x => $item ) {
                if( false === Contact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isDiscoverySet()) {
            $key    = self::getKey(  $upper, self::DISCOVERY );
            foreach( $dto->getDiscovery() as $x => $item ) {
                if( false === Discovery::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isMethodSet()) {
            $key    = self::getKey(  $upper, self::METHOD );
            foreach( $dto->getMethod() as $x => $item ) {
                if( false === Method::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isExpectationSet()) {
            $key    = self::getKey(  $upper, self::EXPECTATION );
            foreach( $dto->getExpectation() as $x => $item ) {
                if( false === Expectation::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isRecordDataSet()) {
            $key    = self::getKey(  $upper, self::RECORDDATA );
            foreach( $dto->getRecordData() as $x => $item ) {
                if( false === RecordData::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isEventDataSet()) {
            $key    = self::getKey(  $upper, self::EVENTDATA );
            foreach( $dto->getEventData() as $x => $item ) {
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
