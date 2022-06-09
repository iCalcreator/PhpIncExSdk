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
namespace Kigkonsult\PhpIncExSdk\Dto;

use Kigkonsult\PhpIncExSdk\Dto\Traits\ContentRealTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DurationTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtDurationTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\MeaningTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * The Counter class summarizes multiple occurrences of an event or conveys counts or rates of various features.
 *
 * Counter MUST have ATTRIBUTE(s) type and unit and Value
 */
class Counter extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $type
     * @param string $unit
     * @param float $value
     * @return static
     */
    public static function factoryTypeUnitValue( string $type, string $unit, float $value ) : static
    {
        return parent::factory()
            ->setType( $type )
            ->setUnit( $unit )
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isTypeSet() && $this->isUnitSet() && $this->isValueSet());
    }

    /**
     * ATTRIBUTE type
     *
     * Required.  ENUM.
     * Specifies the type of counter specified in the element content.
     * These values are maintained in the "Counter-type" IANA registry per Section 10.2.
     *    1.  count.  The Counter class value is a counter.
     *    2.  peak.  The Counter class value is a peak value.
     *    3.  average.  The Counter class value is an average.
     *    4.  ext-value.  A value used to indicate that this attribute is extended
     *                    and the actual value is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use TypeTrait;

    /**
     * ATTRIBUTE ext-type
     *
     * Optional.  STRING.
     * A means by which to extend the type attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtTypeTrait;

    /**
     * ATTRIBUTE unit
     *
     * Required.  ENUM.
     * Specifies the units of the element content.
     *  These values are maintained in the "Counter-unit" IANA registry per Section 10.2.
     *    1.   byte.  Bytes transferred.
     *    2.   mbit.  Megabits (Mbits) transferred.
     *    3.   packet.  Packets.
     *    4.   flow.  Network flow records.
     *    5.   session.  Sessions.
     *    6.   alert.  Notifications generated by another system (e.g., IDS or SIEM system).
     *    7.   message.  Messages (e.g., mail messages).
     *    8.   event.  Events.
     *    9.   host.  Hosts.
     *    10.  site.  Site.
     *    11.  organization.  Organizations.
     *    12.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $unit = null;

    /**
     * @return string|null
     */
    public function getUnit() : ? string
    {
        return $this->unit;
    }

    /**
     * Return bool true if unit is set
     *
     * @return bool
     */
    public function isUnitSet() : bool
    {
        return ( null !== $this->unit );
    }

    /**
     * @param string|null $unit
     * @return static
     */
    public function setUnit( ? string $unit = null ) : static
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * ATTRIBUTE ext-unit
     *
     * Optional.  STRING.
     * A means by which to extend the unit attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    protected ? string $extUnit = null;

    /**
     * @return string|null
     */
    public function getExtUnit() : ? string
    {
        return $this->extUnit;
    }

    /**
     * Return bool true if extUnit is set
     *
     * @return bool
     */
    public function isExtUnitSet() : bool
    {
        return ( null !== $this->extUnit );
    }

    /**
     * @param string|null $extUnit
     * @return static
     */
    public function setExtUnit( ? string $extUnit = null ) : static
    {
        $this->extUnit = $extUnit;
        return $this;
    }

    /**
     * Attribute meaning
     *
     * Optional.  STRING.  A
     * free-form text description of the metric represented by the Counter
     */
    use MeaningTrait;

    /**
     * Attribute duration
     *
     * Optional.  ENUM.
     * If present, the Counter class represents a rate.
     * This attribute specifies a unit of time over which the rate whose
     * units are specified in the unit attribute is being conveyed.
     * This attribute is the denominator of the rate (where the unit attribute specified the nominator).
     * The possible values of this attribute are defined in the duration attribute of Section 3.12.3
     *    1.  second.  The unit of the element content is seconds.
     *    2.  minute.  The unit of the element content is minutes.
     *    3.  hour.  The unit of the element content is hours.
     *    4.  day.  The unit of the element content is days.
     *    5.  month.  The unit of the element content is months.
     *    6.  quarter.  The unit of the element content is quarters.
     *    7.  year.  The unit of the element content is years.
     *    8.  ext-value.  A value used to indicate that this attribute is extended
     *                    and the actual value is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use DurationTrait;

    /**
     * Attribute ext-duration
     *
     * Optional.  STRING.
     * A means by which to extend the duration attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtDurationTrait;

    /**
     * Content
     *
     * The content of the class is a value of type REAL whose meaning and units are determined by the type
     * and duration attributes, respectively.  If the duration attribute is present, the element content is a rate.
     * Otherwise, it is a simple counter.
     */
    use ContentRealTrait;
}
