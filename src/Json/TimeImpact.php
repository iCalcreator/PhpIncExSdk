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

use Kigkonsult\PhpIncExSdk\Dto\TimeImpact as Dto;

class TimeImpact implements JsonInterface
{
    /**
     * Parse json array to populate new TimeImpact
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::SEVERITY] )) {
            $dto->setSeverity( $jsonArray[self::SEVERITY] );
        }
        if( isset( $jsonArray[self::METRIC] )) {
            $dto->setMetric( $jsonArray[self::METRIC] );
        }
        if( isset( $jsonArray[self::EXT_METRIC] )) {
            $dto->setExtMetric( $jsonArray[self::EXT_METRIC] );
        }
        if( isset( $jsonArray[self::DURATION] )) {
            $dto->setDuration( $jsonArray[self::DURATION] );
        }
        if( isset( $jsonArray[self::EXT_DURATION] )) {
            $dto->setExtDuration( $jsonArray[self::EXT_DURATION] );
        }
        if( isset( $jsonArray[self::VALUE] )) {
            $dto->setValue((float) $jsonArray[self::VALUE] );
        }

        return $dto;
    }

    /**
     * Write TimeImpact Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isSeveritySet()) {
            $jsonArray[self::SEVERITY] = $dto->getSeverity();
        }
        if( $dto->isMetricSet()) {
            $jsonArray[self::METRIC] = $dto->getMetric();
        }
        if( $dto->isExtMetricSet()) {
            $jsonArray[self::EXT_METRIC] = $dto->getExtMetric();
        }
        if( $dto->isDurationSet()) {
            $jsonArray[self::DURATION] = $dto->getDuration();
        }
        if( $dto->isExtDurationSet()) {
            $jsonArray[self::EXT_DURATION] = $dto->getExtDuration();
        }
        if( $dto->isValueSet()) {
            $jsonArray[self::VALUE] = $dto->getValue();
        }

        return (object) $jsonArray;
    }
}
