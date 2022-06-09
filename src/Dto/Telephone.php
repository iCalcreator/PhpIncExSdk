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

use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * The Telephone class describes a telephone number and associated annotation.
 *
 * Telephone MUST have at least one instance of TelephoneNumber
 */
class Telephone extends DtoBase
{
    /**
     * Factory method with required property telephoneNumber
     *
     * @param string $telephoneNumber
     * @return static
     */
    public static function factoryTelephoneNumber( string $telephoneNumber ) : static
    {
        return parent::factory()
            ->setTelephoneNumber( $telephoneNumber );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isTelephoneNumberSet();
    }

    /**
     * ATTRIBUTE type
     *
     * Optional.  ENUM.  Categorizes the type of telephone number described in the TelephoneNumber class.
     * These values are maintained in the "Telephone-type" IANA registry per Section 10.2.
     *    1.  wired.  A number of a wire-line (land-line) phone.
     *    2.  mobile.  A number of a mobile phone.
     *    3.  fax.  A number to a fax machine.
     *    4.  hotline.  A number to a regularly monitored operational hotline.
     *    5.  ext-value.  A value used to indicate that this attribute is extended
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
     * TelephoneNumber
     *
     * One.  PHONE.
     * A telephone number.
     * A telephone number is represented in the information model by the PHONE data type.
     * The format of the PHONE data type is documented in [E.164].
     * The PHONE data type is implemented in the data model as an "xs:string" type per Section 3.2.1 of [W3C.SCHEMA.DTYPES].
     *
     * @var string|null
     */
    private ? string $telephoneNumber = null;

    /**
     * @return string|null
     */
    public function getTelephoneNumber() : ? string
    {
        return $this->telephoneNumber;
    }

    /**
     * Return bool true if telephoneNumber is set
     *
     * @return bool
     */
    public function isTelephoneNumberSet() : bool
    {
        return ( null !== $this->telephoneNumber );
    }

    /**
     * @param string|null $telephoneNumber
     * @return static
     */
    public function setTelephoneNumber( ? string $telephoneNumber = null ) : static
    {
        $this->telephoneNumber = $telephoneNumber;
        return $this;
    }

    /**
     * Description
     *
     * Zero or more.  ML_STRING.  A free-form text description of the phone number.
     */
    use DescriptionManyTrait;
}
