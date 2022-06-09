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

/**
 * The SoftwareReference class is a reference to a particular version of software.
 *
 * SoftwareReference MUST have ATTRIBUTE(s) spec-name, NO value requirement
 */
class SoftwareReference extends DtoBase
{
    /**
     * Factory method with required property spec-name
     *
     * @param string $specName
     * @return static
     */
    public static function factorySpecname( string $specName ) : static
    {
        return parent::factory()
            ->setSpecName( $specName );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isSpecNameSet();
    }

    /**
     * ATTRIBUTE spec-name
     *
     * Required.  ENUM.
     * Identifies the format and semantics of the element body of this class.
     * Formal standards and specifications can be referenced as well as a free-form text description with a
     * user-provided data type.
     * These values are maintained in the "SoftwareReference-spec-id" IANA registry per Section 10.2
     *    1.  custom.  The element content is free-form and of the data type  specified by the dtype attribute.
     *                 If this value is selected, then the dtype attribute MUST be set.
     *    2.  cpe.  The element content describes a Common Platform Enumeration (CPE) entry per [NIST.CPE].
     *    3.  swid.  The element content describes a software identification (SWID) tag per [ISO19770].
     *    4.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     *
     * @var string|null
     */
    private ? string $specName = null;

    /**
     * @return string|null
     */
    public function getSpecName() : ? string
    {
        return $this->specName;
    }

    /**
     * Return bool true if specName is set
     *
     * @return bool
     */
    public function isSpecNameSet() : bool
    {
        return ( null !== $this->specName );
    }

    /**
     * @param string|null $specName
     * @return static
     */
    public function setSpecName( ? string $specName = null ) : static
    {
        $this->specName = $specName;
        return $this;
    }

    /**
     * ATTRIBUTE ext-spec-name
     *
     * Optional.  STRING.
     * A means by which to extend the spec-name attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extExtSpecName = null;

    /**
     * @return string|null
     */
    public function getExtSpecName() : ? string
    {
        return $this->extExtSpecName;
    }

    /**
     * Return bool true if extExtSpecName is set
     *
     * @return bool
     */
    public function isExtSpecNameSet() : bool
    {
        return ( null !== $this->extExtSpecName );
    }

    /**
     * @param string|null $extExtSpecName
     * @return static
     */
    public function setExtSpecName( ? string $extExtSpecName = null ) : static
    {
        $this->extExtSpecName = $extExtSpecName;
        return $this;
    }

    /**
     * ATTRIBUTE dtype
     *
     * Optional.  ENUM.
     * The data type of the element content.
     * The permitted values for this attribute are shown below.
     * The default value is "string".
     * These values are maintained in the "SoftwareReference-dtype" IANA registry per Section 10.2.
     *    1.  bytes.  The element content is of type HEXBIN.
     *    2.  integer.  The element content is of type INTEGER.
     *    3.  real.  The element content is of type REAL.
     *    4.  string.  The element content is of type STRING.
     *    5.  xml.  The element content is XML.  See Section 5.2.
     *    6.  ext-value.  A value used to indicate that this attribute is extended
     *                    and the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
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
     * The element content varies according to the value of the spec-name attribute.
     * It is defined in the data model as "xs:any" per [W3C.SCHEMA].
     *
     * Here, any value !== null
     */
    use ContentValueTrait;
}
