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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ContentValueTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DtypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtDtypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\MeaningTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\NameTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * Information not otherwise represented in the IODEF can be added using the EXTENSION data type.
 * This data type is a generic extension mechanism.
 * https://www.rfc-editor.org/rfc/rfc7203.txt
 *
 * ExtensionType MUST have ATTRIBUTE(s) dtype and value : value
 */
class ExtensionType extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $dtype
     * @param string $value
     * @return static
     */
    public static function factoryDtypeValue( string $dtype, string $value ) : static
    {
        return parent::factory()
            ->setDtype( $dtype )
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isDtypeSet() && $this->isValueSet());
    }

    /**
     * ATTRIBUTE name
     *
     * Optional.  STRING.
     * A free-form name of the field or data element.
     */
    use NameTrait;

    /**
     * ATTRIBUTE dtype
     *
     * Required.  ENUM.
     * The data type of the element content.  The default value is "string".
     * These values are maintained in the "ExtensionType-dtype" IANA registry per Section 10.2.
     *    1.   boolean.  The element content is of type BOOLEAN.
     *    2.   byte.  The element content is of type BYTE.
     *    3.   bytes.  The element content is of type HEXBIN.
     *    4.   character.  The element content is of type CHARACTER.
     *    5.   date-time.  The element content is of type DATETIME. (YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z')
     *    6.   ntpstamp.  Same as date-time.
     *    7.   integer.  The element content is of type INTEGER.
     *    8.   portlist.  The element content is of type PORTLIST.
     *    9.   real.  The element content is of type REAL.
     *    10.  string.  The element content is of type STRING.
     *    11.  file.  The element content is a base64-encoded binary file encoded as a BYTE[] type.
     *    12.  path.  The element content is a file-system path encoded as a STRING type.
     *    13.  frame.  The element content is a Layer 2 frame encoded as a HEXBIN type.
     *    14.  packet.  The element content is a Layer 3 packet encoded as a HEXBIN type.
     *    15.  ipv4-packet.  The element content is an IPv4 packet encoded as a HEXBIN type.
     *    16.  ipv6-packet.  The element content is an IPv6 packet encoded as a HEXBIN type.
     *    17.  url.  The element content is of type URL.
     *    18.  csv.  The element content is a comma-separated value (CSV) list per Section 2 of [RFC4180] encoded as a STRING type.
     *    19.  winreg.  The element content is a Microsoft Windows registry key encoded as a STRING type.
     *    20.  xml.  The element content is XML.  See Section 5.2.
     *    21.  ext-value.  A value used to indicate that this attribute is extended
     *                     and the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use DtypeTrait;

    /**
     * ATTRIBUTE ext-dtype
     *
     * Optional.  STRING.
     * A means by which to extend the dtype attribute.
     * See Section 5.1.1.
     */
    use ExtDtypeTrait;

    /**
     * ATTRIBUTE meaning
     *
     * Optional.  STRING.
     * A free-form text description of the element content.
     */
    use MeaningTrait;

    /**
     * ATTRIBUTE formatid
     *
     * Optional.  STRING.
     * An identifier referencing the format or semantics of the element content.
     *
     * @var string|null
     */
    protected ? string $formatid = null;

    /**
     * @return string|null
     */
    public function getFormatid() : ? string
    {
        return $this->formatid;
    }

    /**
     * Return bool true if formatid is set
     *
     * @return bool
     */
    public function isFormatidSet() : bool
    {
        return ( null !== $this->formatid );
    }

    /**
     * @param string|null $formatid
     * @return static
     */
    public function setFormatid( ? string $formatid = null ) : static
    {
        $this->formatid = $formatid;
        return $this;
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See Section 3.3.1.
     * These values are maintained in the "Restriction" IANA registry per Section 10.2.
     *    1.   public.  The information can be freely distributed without restriction.
     *    2.   partner.  The information may be shared within a closed  community of peers, partners,
     *                   or affected parties, but cannot be openly published.
     *    3.   need-to-know.  The information may be shared only within the organization with individuals
     *                        that have a need to know.
     *    4.   private.  The information may not be shared.
     *    5.   default.  The information can be shared according to an information disclosure policy
     *                   pre-arranged by the communicating parties.
     *    6.   white.  Same as 'public'.
     *    7.   green.  Same as 'partner'.
     *    8.   amber.  Same as 'need-to-know'.
     *    9.   red.  Same as 'private'.
     *    10.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * ATTRIBUTE
     *
     * Optional.  ID.
     * See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * The element content of this type is the extension being added to the data model.
     * This content is defined in the data model as "xs:any" per [W3C.SCHEMA].
     */
    use ContentValueTrait;
}
