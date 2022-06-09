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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * The RecordPattern class describes where in the log data provided or referenced in the RecordData class
 * relevant information can be found. It provides a way to reference subsets of information, identified by
 * a pattern, in a large log file, audit trail, or forensic data.
 *
 * RecordPattern MUST have ATTRIBUTE(s) type and value  value
 */
class RecordPattern extends DtoBase
{
    /**
     * Factory method with required properties type and value
     *
     * @param string $type
     * @param string $value
     * @return static
     */
    public static function factoryTypeValue( string $type, string $value ) : static
    {
        return parent::factory()
            ->setType( $type )
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isTypeSet() && $this->isValueSet());
    }

    /**
     * ATTRIBUTE type
     *
     * Required.  ENUM.
     * Describes the type of pattern being specified in the element content.
     * The default is "regex".
     * These values are maintained in the "RecordPattern-type" IANA registry per Section 10.2.
     *    1.  regex.  Regular expression as defined by POSIX Extended Regular Expressions (ERE) in Chapter 9 of [IEEE.POSIX].
     *    2.  binary.  Binhex-encoded binary pattern, per the HEXBIN data type.
     *    3.  xpath.  XML Path (XPath) [W3C.XPATH].
     *    4.  ext-value.  A value used to indicate that this attribute is extended
     *                    and the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use TypeTrait;

    /**
     * ATTRIBUTE ext-type
     *
     * Optional.  STRING.
     * A means by which to extend the type attribute. See Section 5.1.1.
     */
    use ExtTypeTrait;

    /**
     * ATTRIBUTE offset
     *
     * Optional.  INTEGER.
     * Amount of units (determined by the offsetunit attribute) to seek into the RecordItem data
     * before matching the pattern.
     *
     * @var int|null
     */
    private ? int $offset = null;

    /**
     * @return int|null
     */
    public function getOffset() : ?int
    {
        return $this->offset;
    }

    /**
     * Return bool true if offset is set
     *
     * @return bool
     */
    public function isOffsetSet() : bool
    {
        return ( null !== $this->offset );
    }

    /**
     * @param int|null $offset
     * @return static
     */
    public function setOffset( ? int $offset ) : static
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * ATTRIBUTE offsetunit
     *
     * Optional.  ENUM.
     * Describes the units of the offset attribute.
     * The default is "line".
     * These values are maintained in the "RecordPattern-offsetunit" IANA registry per Section 10.2.
     *    1.  line.  Offset is a count of lines.
     *    2.  byte.  Offset is a count of bytes.
     *    3.  ext-value.  A value used to indicate that this attribute is extended and the actual value is
     *                    provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $offsetunit = null;

    /**
     * @return string|null
     */
    public function getOffsetunit() : ? string
    {
        return $this->offsetunit;
    }

    /**
     * Return bool true if offsetunit is set
     *
     * @return bool
     */
    public function isOffsetunitSet() : bool
    {
        return ( null !== $this->offsetunit );
    }

    /**
     * @param string|null $offsetunit
     * @return static
     */
    public function setOffsetunit( ? string $offsetunit = null ) : static
    {
        $this->offsetunit = $offsetunit;
        return $this;
    }

    /**
     * ATTRIBUTE  ext-offsetunit
     *
     * Optional.  STRING.
     * A means by which to extend the offsetunit attribute.  See Section 5.1.1.

     * @var string|null
     */
    private ? string $extOffsetunit = null;

    /**
     * @return string|null
     */
    public function getExtOffsetunit() : ? string
    {
        return $this->extOffsetunit;
    }

    /**
     * Return bool true if extOffsetunit is set
     *
     * @return bool
     */
    public function isExtOffsetunitSet() : bool
    {
        return ( null !== $this->extOffsetunit );
    }

    /**
     * @param string|null $extOffsetunit
     * @return static
     */
    public function setExtOffsetunit( ? string $extOffsetunit = null ) : static
    {
        $this->extOffsetunit = $extOffsetunit;
        return $this;
    }

    /**
     * ATTRIBUTE  instance
     *
     * Optional.  INTEGER.
     * Number of times to apply the specified pattern.
     *
     * @var int|null
     */
    private ? int $instance = null;

    /**
     * @return int|null
     */
    public function getInstance() : ?int
    {
        return $this->instance;
    }

    /**
     * Return bool true if instance is set
     *
     * @return bool
     */
    public function isInstanceSet() : bool
    {
        return ( null !== $this->instance );
    }

    /**
     * @param int|null $instance
     * @return static
     */
    public function setInstance( ? int $instance ) : static
    {
        $this->instance = $instance;
        return $this;
    }

    /**
     * Content name value
     *
     * The content of the class is of type STRING and specifies a search pattern.
     */
    use ContentValueTrait;
}
