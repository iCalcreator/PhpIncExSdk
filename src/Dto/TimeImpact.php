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
use Kigkonsult\PhpIncExSdk\Dto\Traits\SeverityTrait;

/**
 * The TimeImpact class describes the impact of the incident on an organization as a function of time.
 * It provides a way to convey down time and recovery time.
 *
 * TimeImpact MUST have ATTRIBUTE(s) metric and value :value
 */
class TimeImpact extends DtoBase
{
    /**
     * Factory method with required properties metric and value
     *
     * @param string $metric
     * @param float $value
     * @return static
     */
    public static function factoryMetricValue( string $metric, float $value ) : static
    {
        return parent::factory()
            ->setMetric( $metric )
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isMetricSet() && $this->isValueSet());
    }

    /**
     * ATTRIBUTE severity
     *
     * Optional.  ENUM.
     * An estimate of the relative severity of the activity.
     * The permitted values are shown below.
     * There is no default value.
     *    1.  low.  Low severity
     *    2.  medium.  Medium severity
     *    3.  high.  High severity
     */
    use SeverityTrait;

    /**
     * ATTRIBUTE metric
     *
     * Required.  ENUM.
     * Defines the meaning of the value in the element content.
     * These values are maintained in the "TimeImpact-metric" IANA registry per Section 10.2.
     *    1.  labor.  Total staff time to recovery from the activity
     *                 (e.g., 2 employees working 4 hours each would be 8 hours).
     *    2.  elapsed.  Elapsed time from the beginning of the recovery to its completion (i.e., wall-clock time).
     *    3.  downtime.  Duration of time for which some provided service(s) was not available.
     *    4.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $metric = null;

    /**
     * @return string|null
     */
    public function getMetric() : ? string
    {
        return $this->metric;
    }

    /**
     * Return bool true if metric is set
     *
     * @return bool
     */
    public function isMetricSet() : bool
    {
        return ( null !== $this->metric );
    }

    /**
     * @param string|null $metric
     * @return static
     */
    public function setMetric( ? string $metric = null ) : static
    {
        $this->metric = $metric;
        return $this;
    }

    /**
     * ATTRIBUTE ext-metric
     *
     * Optional.  STRING.
     * A means by which to extend the metric attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extMetric = null;

    /**
     * @return string|null
     */
    public function getExtMetric() : ? string
    {
        return $this->extMetric;
    }

    /**
     * Return bool true if extMetric is set
     *
     * @return bool
     */
    public function isExtMetricSet() : bool
    {
        return ( null !== $this->extMetric );
    }

    /**
     * @param string|null $extMetric
     * @return static
     */
    public function setExtMetric( ? string $extMetric = null ) : static
    {
        $this->extMetric = $extMetric;
        return $this;
    }

    /**
     * Attribute duration
     *
     * Optional.  ENUM.
     * Defines the unit of time for the value in the element content.
     * The default value is "hour".
     * These values are maintained in the "TimeImpact-duration" IANA registry per Section 10.2.
     *    1.  second.  The unit of the element content is seconds.
     *    2.  minute.  The unit of the element content is minutes.
     *    3.  hour.  The unit of the element content is hours.
     *    4.  day.  The unit of the element content is days.
     *    5.  month.  The unit of the element content is months.
     *    6.  quarter.  The unit of the element content is quarters.
     *    7.  year.  The unit of the element content is years.
     *    8.  ext-value.  A value used to indicate that this attribute is extended
     *                    and the actual value is provided using the  corresponding ext-* attribute.  See Section 5.1.1.
     */
    use DurationTrait;

    /**
     * Attribute ext-duration
     *
     * Optional.  STRING.
     * A means by which to extend the duration attribute.
     * See Section 5.1.1.
     */
    use ExtDurationTrait;

    /**
     * value
     *
     * The content of the class is of type REAL and specifies an amount of time. The duration attribute
     * provides units for this content, and the metric attribute explains what this content is measuring.
     */
    use ContentRealTrait;
}
