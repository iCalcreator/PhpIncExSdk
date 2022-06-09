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
use Kigkonsult\PhpIncExSdk\Dto\Traits\SeverityTrait;

/**
 * The MonetaryImpact class describes the financial impact of the activity on an organization.
 * For example, this impact may consider losses due to the cost of the investigation or recovery, diminished
 * productivity of the staff, or a tarnished reputation that will affect future opportunities.
 *
 * Value required
 */
class MonetaryImpact extends DtoBase
{
    /**
     * Factory method with required property value
     *
     * @param float $value
     * @return static
     */
    public static function factoryValue( float $value ) : static
    {
        return parent::factory()
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isValueSet());
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
     * ATTRIBUTE  currency
     *
     * Optional.  STRING.
     * Defines the currency in which the value in the element content is expressed.
     * The permitted values are defined in "Codes for the representation of currencies" [ISO4217].
     * There is no default value.
     *
     * @var string|null
     */
    private ? string $currency = null;

    /**
     * @return string|null
     */
    public function getCurrency() : ? string
    {
        return $this->currency;
    }

    /**
     * Return bool true if currency is set
     *
     * @return bool
     */
    public function isCurrencySet() : bool
    {
        return ( null !== $this->currency );
    }

    /**
     * @param string|null $currency
     * @return static
     */
    public function setCurrency( ? string $currency = null ) : static
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Content
     *
     * The content of the class is of type REAL and specifies a quantity of money.
     * The currency attribute defines the currency of this value.
     */
    use ContentRealTrait;
}
