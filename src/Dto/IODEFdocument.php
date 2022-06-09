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

use Kigkonsult\PhpIncExSdk\Dto\Traits\AdditionalDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\LangTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\VersionTrait;

/**
 * The IODEF-Document class is the top level class in the IODEF data model.
 *
 * IODEFdocument MUST have ATTRIBUTE(s) version
 * IODEFdocument MUST have at least one instance of Incident
 */
class IODEFdocument extends DtoBase
{
    /**
     * Class constructor, set version to 2.00, default
     */
    public function __construct()
    {
        $this->setVersion( '2.00' );
    }

    /**
     * Factory method with required property Incident
     *
     * @param Incident $incident
     * @return static
     */
    public static function factoryIncident( Incident $incident ) : static
    {
        return parent::factory()
            ->addIncident( $incident );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isVersionSet() && $this->isIncidentSet());
    }
    /**
     * ATTRIBUTE version
     *
     * Required.  STRING.
     * The IODEF specification version number to which this IODEF document conforms.
     * The value of this attribute MUST be "2.00".
     */
    use VersionTrait;

    /**
     * ATTRIBUTE xml:lang
     *
     * Optional.  ENUM.
     * A language identifier per Section 2.12 of [W3C.XML] whose values and form are described in [RFC5646].
     * The interpretation of this code is described in Section 6.
     */
    use LangTrait;

    /**
     * ATTRIBUTE format-id
     *
     * Optional.  STRING.
     * A free-form string to convey processing instructions to the recipient of the document.
     * Its semantics must be negotiated out of band.
     *
     * @var string|null
     */
    private ? string $formatId = null;

    /**
     * @return string|null
     */
    public function getFormatId() : ? string
    {
        return $this->formatId;
    }

    /**
     * Return bool true if formatId is set
     *
     * @return bool
     */
    public function isFormatIdSet() : bool
    {
        return ( null !== $this->formatId );
    }

    /**
     * @param string|null $formatId
     * @return static
     */
    public function setFormatId( ? string $formatId = null ) : static
    {
        $this->formatId = $formatId;
        return $this;
    }

    /**
     * ATTRIBUTE private-enum-name
     *
     * Optional.  STRING.
     * A globally unique identifier for the CSIRT generating the document to deconflict private extensions used in
     * the document. The fully qualified domain name (FQDN) associated  with the CSIRT MUST be used as the identifier.
     * See Section 5.3.
     *
     * @var string|null
     */
    private ? string $privateEnumName = null;

    /**
     * @return string|null
     */
    public function getPrivateEnumName() : ? string
    {
        return $this->privateEnumName;
    }

    /**
     * Return bool true if privateEnumName is set
     *
     * @return bool
     */
    public function isPrivateEnumNameSet() : bool
    {
        return ( null !== $this->privateEnumName );
    }

    /**
     * @param string|null $privateEnumName
     * @return static
     */
    public function setPrivateEnumName( ? string $privateEnumName = null ) : static
    {
        $this->privateEnumName = $privateEnumName;
        return $this;
    }

    /**
     * ATTRIBUTE private-enum-id
     *
     * Optional.  STRING.
     * An organizationally unique identifier for an extension used in the document.
     * If this attribute is set, the private-enum-name MUST also be set.
     * See Section 5.3.
     *
     * @var string|null
     */
    private ? string $privateEnumId = null;

    /**
     * @return string|null
     */
    public function getPrivateEnumId() : ? string
    {
        return $this->privateEnumId;
    }

    /**
     * Return bool true if privateEnumId is set
     *
     * @return bool
     */
    public function isPrivateEnumIdSet() : bool
    {
        return ( null !== $this->privateEnumId );
    }

    /**
     * @param string|null $privateEnumId
     * @return static
     */
    public function setPrivateEnumId( ? string $privateEnumId = null ) : static
    {
        $this->privateEnumId = $privateEnumId;
        return $this;
    }

    /**
     * Incident
     *
     * One or more.
     * The information related to a single incident.
     * See Section 3.2.
     *
     * @var Incident[]
     */
    private array $incident = [];

    /**
     * @return Incident[]
     */
    public function getIncident() : array
    {
        return $this->incident;
    }

    /**
     * Return bool true if incident is set
     *
     * @return bool
     */
    public function isIncidentSet() : bool
    {
        return ! empty( $this->incident );
    }

    /**
     * @param Incident $incident
     * @return static
     */
    public function addIncident( Incident $incident ) : static
    {
        $this->incident[] = $incident;
        return $this;
    }

    /**
     * @param null|Incident[] $incident
     * @return static
     */
    public function setIncident( ? array $incident = [] ) : static
    {
        $this->incident = [];
        foreach( $incident as $theIncident ) {
            $this->addIncident( $theIncident );
        }
        return $this;
    }

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
