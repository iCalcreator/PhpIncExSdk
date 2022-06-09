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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ReferenceManyTrait;

/**
 * https://www.rfc-editor.org/rfc/rfc7203.txt
 * 4.4.  Basic Structure of the Extension Classes
 *
 * Attribute SpecID required
 */
abstract class BasicStructure extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $specId
     * @return static
     */
    public static function factorySpecId( string $specId ) : static
    {
        return parent::factory()
            ->setSpecId( $specId );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isSpecIdSet();
    }

    /**
     * ATTRIBUTE SpecID
     *
     * <xsd:attribute name="SpecID" type="xsd:string" use="required"/>
     * [rfc7203] ...When the value "private" is used, ext-SpecID element MUST be used. ..
     *
     * @var string|null
     */
    protected ? string $specId = null;

    /**
     * @return string|null
     */
    public function getSpecId() : ? string
    {
        return $this->specId;
    }

    /**
     * Return bool true if specId is set
     *
     * @return bool
     */
    public function isSpecIdSet() : bool
    {
        return ( null !== $this->specId );
    }

    /**
     * @param string|null $specId
     * @return static
     */
    public function setSpecId( ? string $specId = null) : static
    {
        $this->specId = $specId;
        return $this;
    }

    /**
     * ATTRIBUTE ext-SpecID
     *
     * <xsd:attribute name="ext-SpecID" type="xsd:string"/>
     *
     * @var string|null
     */
    protected ? string $extExtSpecId = null;

    /**
     * @return string|null
     */
    public function getExtSpecId() : ? string
    {
        return $this->extExtSpecId;
    }

    /**
     * Return bool true if extExtSpecId is set
     *
     * @return bool
     */
    public function isExtSpecIdSet() : bool
    {
        return ( null !== $this->extExtSpecId );
    }

    /**
     * @param string|null $extExtSpecId
     * @return static
     */
    public function setExtSpecId( ? string $extExtSpecId = null ) : static
    {
        $this->extExtSpecId = $extExtSpecId;
        return $this;
    }

    /**
     * ATTRIBUTE ContentID
     *
     * <xsd:attribute name="ContentID" type="xsd:string"/>
     *
     * @var string|null
     */
    protected ? string $contentID = null;

    /**
     * @return string|null
     */
    public function getContentID() : ? string
    {
        return $this->contentID;
    }

    /**
     * Return bool true if contentID is set
     *
     * @return bool
     */
    public function isContentIDSet() : bool
    {
        return ( null !== $this->contentID );
    }

    /**
     * @param string|null $contentID
     * @return static
     */
    public function setContentID( ? string $contentID = null ) : static
    {
        $this->contentID = $contentID;
        return $this;
    }

    /**
     * RawData
     *
     *   <xsd:choice>
     *     <xsd:element name="RawData" type="sci:XMLDATA"  minOccurs="0" maxOccurs="unbounded"/>
     *         <xsd:element ref="iodef:Reference" minOccurs="0" maxOccurs="unbounded"/>
     *   </xsd:choice>
     *
     * @var string[]
     */
    protected array $rawData = [];

    /**
     * @return string[]
     */
    public function getRawData() : array
    {
        return $this->rawData;
    }

    /**
     * Return bool true if rawData is set
     *
     * @return bool
     */
    public function isRawDataSet() : bool
    {
        return ! empty( $this->rawData );
    }

    /**
     * @param string $rawData
     * @return static
     */
    public function addRawData( string $rawData ) : static
    {
        $this->rawData[] = $rawData;
        return $this;
    }

    /**
     * @param null|string[] $rawData
     * @return static
     */
    public function setRawData( ? array $rawData = [] ) : static
    {
        $this->rawData = [];
        foreach( $rawData as $theRawData ) {
            $this->addRawData( $theRawData );
        }
        return $this;
    }

    /**
     *   <xsd:choice>
     *         <xsd:element name="RawData" type="sci:XMLDATA"  minOccurs="0" maxOccurs="unbounded"/>
     *     <xsd:element ref="iodef:Reference" minOccurs="0" maxOccurs="unbounded"/>
     *   </xsd:choice>
     */
    use ReferenceManyTrait;
}
