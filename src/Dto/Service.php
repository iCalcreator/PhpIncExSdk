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

use InvalidArgumentException;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ApplicationTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\EmailDataTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;

/**
 * The Service class describes a network service.
 * The service is described by a protocol, port, protocol header field, and application providing or using the service.
 *
 * At least one of these classes MUST be present.
 * ServiceName, Port, Portlist, ProtoCode, ProtoType, ProtoField, ApplicationHeaderField, EmailData, Application
 */
class Service extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isServiceNameSet() ||
            $this->isPortSet() ||
            $this->isPortlistSet() ||
            $this->isProtoCodeSet() ||
            $this->isProtoTypeSet() ||
            $this->isProtoFieldSet() ||
            $this->isApplicationHeaderFieldSet() ||
            $this->isEmailDataSet() ||
            $this->isApplicationSet()
        );
    }
    /**
     * ATTRIBUTE ip-protocol
     *
     * Optional.  INTEGER.
     * The IANA-assigned IP protocol number per [IANA.Protocols].
     * The attribute MUST be set if a Port, Portlist, ProtoCode, ProtoType, or ProtoField class is present.
     *
     * @var string|null
     */
    private ? string $ipProtocol = null;

    /**
     * @return string|null
     */
    public function getIpProtocol() : ? string
    {
        return $this->ipProtocol;
    }

    /**
     * Return bool true if ipProtocol is set
     *
     * @return bool
     */
    public function isIpProtocolSet() : bool
    {
        return ( null !== $this->ipProtocol );
    }

    /**
     * @param string|null $ipProtocol
     * @return static
     */
    public function setIpProtocol( ? string $ipProtocol = null ) : static
    {
        $this->ipProtocol = $ipProtocol;
        return $this;
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See (rfc7970) Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * ServiceName
     *
     * Zero or one.
     * A protocol name.
     *
     * @var ServiceName|null
     */
    private ? ServiceName $serviceName = null;

    /**
     * @return ServiceName|null
     */
    public function getServiceName() : ? ServiceName
    {
        return $this->serviceName;
    }

    /**
     * Return bool true if serviceName is set
     *
     * @return bool
     */
    public function isServiceNameSet() : bool
    {
        return ( null !== $this->serviceName );
    }

    /**
     * @param ServiceName|null $serviceName
     * @return static
     */
    public function setServiceName( ?serviceName $serviceName ) : static
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    /**
     * Port
     *
     * Zero or one.  INTEGER.
     * A port number.
     *
     * @var int|null
     */
    private ? int $port = null;

    /**
     * @return int|null
     */
    public function getPort() : ?int
    {
        return $this->port;
    }

    /**
     * Return bool true if port is set
     *
     * @return bool
     */
    public function isPortSet() : bool
    {
        return ( null !== $this->port );
    }

    /**
     * @param int|null $port
     * @return static
     */
    public function setPort( ? int $port = null ) : static
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Portlist
     *
     * Zero or one.  PORTLIST.
     * A list of port numbers.
     *
     * A list of network ports is represented in the information model by the PORTLIST data type.
     * A PORTLIST consists of a comma-separated list of numbers and ranges (N-M means ports N through M, inclusive).
     * It is formatted according to the following regular expression: "\d+(\-\d+)?(,\d+(\-\d+)?)*".
     * For example, "2,5-15,30,32,40-50,55-60".
     *
     * @var string|null
     */
    private ? string $portlist = null;

    /**
     * @return string|null
     */
    public function getPortlist() : ? string
    {
        return $this->portlist;
    }

    /**
     * Return bool true if portlist is set
     *
     * @return bool
     */
    public function isPortlistSet() : bool
    {
        return ( null !== $this->portlist );
    }

    /**
     * @param string|null $portlist
     * @return static
     * @throws InvalidArgumentException
     */
    public function setPortlist( ? string $portlist = null ) : static
    {
        static $PATTERN = "/\d+(\-\d+)?(,\d+(\-\d+)?)*/";
        if( ! empty( $portlist ) && ( 1 !== preg_match( $PATTERN, $portlist ))) {
            throw new InvalidArgumentException( 'invalid format Service::portlist : ' . $portlist );
        }
        $this->portlist = $portlist;
        return $this;
    }

    /**
     * ProtoCode
     *
     * Zero or one.  INTEGER.
     * A transport-layer (Layer 4) protocol-specific code field (e.g., ICMP code field).
     *
     * @var int|null
     */
    private ? int $protoCode = null;

    /**
     * @return int|null
     */
    public function getProtoCode() : ?int
    {
        return $this->protoCode;
    }

    /**
     * Return bool true if protoCode is set
     *
     * @return bool
     */
    public function isProtoCodeSet() : bool
    {
        return ( null !== $this->protoCode );
    }

    /**
     * @param int|null $protoCode
     * @return static
     */
    public function setProtoCode( ? int $protoCode ) : static
    {
        $this->protoCode = $protoCode;
        return $this;
    }

    /**
     * ProtoType
     *
     * Zero or one.  INTEGER.
     * A transport-layer (Layer 4) protocol-specific type field (e.g., ICMP type field).
     *
     * @var int|null
     */
    private ? int $protoType = null;

    /**
     * @return int|null
     */
    public function getProtoType() : ?int
    {
        return $this->protoType;
    }

    /**
     * Return bool true if protoType is set
     *
     * @return bool
     */
    public function isProtoTypeSet() : bool
    {
        return ( null !== $this->protoType );
    }

    /**
     * @param int|null $protoType
     * @return static
     */
    public function setProtoType( ? int $protoType ) : static
    {
        $this->protoType = $protoType;
        return $this;
    }

    /**
     * ProtoField
     *
     * Zero or one.  INTEGER.
     * A transport-layer (Layer 4) protocol-specific flag field (e.g., TCP flag field).
     *
     * @var int|null
     */
    private ? int $protoField = null;

    /**
     * @return int|null
     */
    public function getProtoField() : ?int
    {
        return $this->protoField;
    }

    /**
     * Return bool true if protoField is set
     *
     * @return bool
     */
    public function isProtoFieldSet() : bool
    {
        return ( null !== $this->protoField );
    }

    /**
     * @param int|null $protoField
     * @return static
     */
    public function setProtoField( ? int $protoField ) : static
    {
        $this->protoField = $protoField;
        return $this;
    }

    /**
     * ApplicationHeaderField
     *
     * One or more.  EXTENSION.
     * A field name and value in a protocol header.
     * The name attribute MUST be set to the field name.
     * The field value MUST be set in the element content.
     *
     * @var ExtensionType[]
     */
    private array $applicationHeaderField = [];

    /**
     * @return ExtensionType[]|null
     */
    public function getApplicationHeaderField() : ? array
    {
        return $this->applicationHeaderField;
    }

    /**
     * Return bool true if applicationHeaderField is set
     *
     * @return bool
     */
    public function isApplicationHeaderFieldSet() : bool
    {
        return ! empty( $this->applicationHeaderField );
    }

    /**
     * @param ExtensionType $applicationHeaderField
     * @return static
     */
    public function addApplicationHeaderField( ExtensionType $applicationHeaderField ) : static
    {
        $this->applicationHeaderField[] = $applicationHeaderField;
        return $this;
    }

    /**
     * @param null|ExtensionType[] $applicationHeaderField
     * @return static
     */
    public function setApplicationHeaderField( ? array $applicationHeaderField = [] ) : static
    {
        $this->applicationHeaderField = [];
        foreach( $applicationHeaderField as $theApplicationHeaderField ) {
            $this->addApplicationHeaderField(  $theApplicationHeaderField );
        }
        return $this;
    }

    /**
     * EmailData
     *
     * Zero or one.
     * Headers associated with an email message.
     * See (rfc7970) Section 3.21.
     */
    use EmailDataTrait;

    /**
     * Application
     *
     * Zero or one.  SOFTWARE.
     * The application acting as either the  client or the server for the service.
     */
    use  ApplicationTrait;
}
