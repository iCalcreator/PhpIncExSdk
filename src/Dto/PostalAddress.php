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
 *  The PostalAddress class specifies a postal address and associated annotation.
 *
 * PostalAddress MUST have at least one instance of PAddress
 */
class PostalAddress extends DtoBase
{
    /**
     * Factory method with required property pAddress (i.e. MLStringType value)
     *
     * @param string $pAddress
     * @return static
     */
    public static function factoryPAddress( string $pAddress ) : static
    {
        return parent::factory()
            ->setPAddress( MLStringType::factoryValue( $pAddress ));
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isPAddressSet();
    }

    /**
     * ATTRIBUTE type
     *
     * Optional.  ENUM.
     * Categorizes the type of address described in the PAddress class.
     * These values are maintained in the "PostalAddress-type" IANA registry per Section 10.2.
     *    1.  street.  An address describing a physical location.
     *    2.  mailing.  An address to which correspondence should be sent.
     *    3.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use TypeTrait;

    /**
     * ATTRIBUTE ext-type
     *
     * Optional.  STRING.
     * A means by which to extend the type attribute.
     * See Section 5.1.1.
     */
    use ExtTypeTrait;

    /**
     * PAddress
     *
     * One.  POSTAL.  A postal address.
     * A postal address is represented in the information model by the POSTAL data type.
     * The format of the POSTAL data type is documented in Section 2.23 of [RFC4519]
     * as a free-form multi-line string separated by the "$" character.
     * The POSTAL data type is implemented in the data model as an "iodef:MLStringType" type.
     */
    /**
     * @var MLStringType|null
     */
    private ? MLStringType $pAddress = null;

    /**
     * @return MLStringType|null
     */
    public function getPAddress() : ? MLStringType
    {
        return $this->pAddress;
    }

    /**
     * Return bool true if pAddress is set
     *
     * @return bool
     */
    public function isPAddressSet() : bool
    {
        return ( null !== $this->pAddress );
    }

    /**
     * @param MLStringType|null $pAddress
     * @return static
     */
    public function setPAddress( ? MLStringType $pAddress = null ) : static
    {
        $this->pAddress = $pAddress;
        return $this;
    }

    /**
     * Description
     *
     * Zero or more.  ML_STRING.  A free-form text description of the address.
     */
    use DescriptionManyTrait;
}
