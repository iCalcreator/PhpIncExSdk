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

use Kigkonsult\PhpIncExSdk\Dto\Indicator as Dto;

class Indicator extends ValidateBase
{
    /**
     * Indicator
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
            if( ! $dto->isIndicatorIDSet() ) {
                self::updResultWithReqPropname( $upper, self::INDICATORID, $result );
            }
            if( ! $dto->isObservableSet() &&
                ! $dto->isIndicatorExpressionSet() &&
                ! $dto->isUidRefSet() &&
                ! $dto->isIndicatorReferenceSet()) {
                $key = $upper . self::$PROPLIST;
                static $IMPLODELIST = [
                    self::OBSERVABLE,
                    self::INDICATOREXPRESSION,
                    self::UID_REF,
                    self::INDICATORREFERENCE
                ];
                $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList( $IMPLODELIST ));
            }
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isIndicatorIDSet() &&
            ( false === IndicatorID::check(
                $dto->getIndicatorID(),
                $result,
                self::getKey(  $upper, self::INDICATORID )))) {
            $return = false;
        }

        if( $dto->isAlternativeIndicatorIDSet()) {
            $key    = self::getKey(  $upper, self::ALTERNATIVEINDICATORID );
            foreach( $dto->getAlternativeIndicatorID() as $x => $item ) {
                if( false === AlternativeIndicatorID::check( $item, $result, self::getKeyIxd( $key, $x ))) {
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

        if( $dto->isContactSet()) {
            $key    = self::getKey(  $upper, self::CONTACT );
            foreach( $dto->getContact() as $x => $item ) {
                if( false === Contact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isObservableSet() &&
            ( false === Observable::check(
                $dto->getObservable(),
                $result, self::getKey(  $upper, self::OBSERVABLE ))
            )) {
            $return = false;
        }

        if( $dto->isIndicatorReferenceSet() &&
            ( false === IndicatorReference::check(
                $dto->getIndicatorReference(),
                $result,
                self::getKey(  $upper, self::INDICATORREFERENCE )))
        ) {
            $return = false;
        }

        if( $dto->isNodeRoleSet()) {
            $key    = self::getKey(  $upper, self::NODEROLE );
            foreach( $dto->getNodeRole() as $x => $item ) {
                if( false === NodeRole::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isAttackPhaseSet()) {
            $key    = self::getKey(  $upper, self::ATTACKPHASE );
            foreach( $dto->getAttackPhase() as $x => $item ) {
                if( false === AttackPhase::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isReferenceSet()) {
            $key    = self::getKey(  $upper, self::REFERENCE );
            foreach( $dto->getReference() as $x => $item ) {
                if( false === Reference::check( $item, $result, self::getKeyIxd( $key, $x ))) {
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
