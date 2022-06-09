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
namespace Kigkonsult\PhpIncExSdk\Json;

use Exception;
use Kigkonsult\PhpIncExSdk\Dto\IndicatorExpression as Dto;

class IndicatorExpression implements JsonInterface
{
    /**
     * Parse json array to populate new IndicatorExpression
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::OPERATOR] )) {
            $dto->setOperator( $jsonArray[self::OPERATOR] );
        }
        if( isset( $jsonArray[self::EXT_OPERATOR] )) {
            $dto->setExtOperator( $jsonArray[self::EXT_OPERATOR] );
        }
        if( isset( $jsonArray[self::INDICATOREXPRESSION] )) {
            foreach( $jsonArray[self::INDICATOREXPRESSION] as $subJsonArray ) {
                $dto->addIndicatorExpression( self::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::OBSERVABLE] )) {
            foreach( $jsonArray[self::OBSERVABLE] as $subJsonArray ) {
                $dto->addObservable( Observable::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::UID_REF] )) {
            foreach( $jsonArray[self::UID_REF] as $sub ) {
                $dto->addUidRef( $sub );
            }
        }
        if( isset( $jsonArray[self::INDICATORREFERENCE] )) {
            foreach( $jsonArray[self::INDICATORREFERENCE] as $subJsonArray ) {
                $dto->addIndicatorReference( IndicatorReference::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::CONFIDENCE] )) {
            $dto->setConfidence( Confidence::parse( $jsonArray[self::CONFIDENCE] ));
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write IndicatorExpression Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isOperatorSet()) {
            $jsonArray[self::OPERATOR] = $dto->getOperator();
        }
        if( $dto->isExtOperatorSet()) {
            $jsonArray[self::EXT_OPERATOR] = $dto->getExtOperator();
        }
        if( $dto->isIndicatorExpressionSet()) {
            $jsonArray[self::INDICATOREXPRESSION] = [];
            foreach( $dto->getIndicatorExpression() as $item ) {
                $jsonArray[self::INDICATOREXPRESSION][] = self::write( $item );
            }
        }
        if( $dto->isObservableSet()) {
            $jsonArray[self::OBSERVABLE] = [];
            foreach( $dto->getObservable() as $item ) {
                $jsonArray[self::OBSERVABLE][] = Observable::write( $item );
            }
        }
        if( $dto->isUidRefSet()) {
            $jsonArray[self::UID_REF] = [];
            foreach( $dto->getUidRef() as $item ) {
                $jsonArray[self::UID_REF][] = $item;
            }
        }
        if( $dto->isIndicatorReferenceSet()) {
            $jsonArray[self::INDICATORREFERENCE] = [];
            foreach( $dto->getIndicatorReference() as $item ) {
                $jsonArray[self::INDICATORREFERENCE][] = IndicatorReference::write( $item );
            }
        }
        if( $dto->isConfidenceSet()) {
            $jsonArray[self::CONFIDENCE] = Confidence::write( $dto->getConfidence());
        }
        if( $dto->isAdditionalDataSet()) {
            $jsonArray[self::ADDITIONALDATA] = [];
            foreach( $dto->getAdditionalData() as $item ) {
                $jsonArray[self::ADDITIONALDATA][] = ExtensionType::write( $item );
            }
        }

        return (object) $jsonArray;
    }
}
