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
use Kigkonsult\PhpIncExSdk\Dto\Traits\CategoryTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\CounterManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtCategoryTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\NodeRoleManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 *  The System class describes a system or network involved in an event.
 *
 * System MUST have at least one instance of Node
 */
class System extends DtoBase
{
    /**
     * Factory method with required property Node
     *
     * @param Node $node
     * @return static
     */
    public static function factoryNode( Node $node ) : static
    {
        return parent::factory()
            ->setNode( $node );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isNodeSet();
    }

    /**
     * ATTRIBUTE category
     *
     * Optional.  ENUM.
     * Classifies the role the host or network played  in the incident.
     * These values are maintained in the "System-category" IANA registry per Section 10.2.
     *    1.  source.  The System was the source of the event.
     *    2.  target.  The System was the target of the event.
     *    3.  intermediate.  The System was an intermediary in the event.
     *    4.  sensor.  The System was a sensor monitoring the event.
     *    5.  infrastructure.  The System was an infrastructure node of the IODEF document exchange.
     *    6.  ext-value.  A value used to indicate that this attribute is  extended
     *                    and the actual value is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use CategoryTrait;

    /*
     * ATTRIBUTE ext-category
     *
     * Optional.  STRING.
     * A means by which to extend the category attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtCategoryTrait;

    /**
     * ATTRIBUTE interface
     *
     * Optional.  STRING.
     * Specifies the interface on which the event(s) on this System originated.
     * If the Node class specifies a network rather than a host, this attribute has no meaning.
     *
     * @var string|null
     */
    private ? string $interface = null;

    /**
     *
     * @return string|null
     */
    public function getInterface() : ? string
    {
        return $this->interface;
    }

    /**
     * Return bool true if interface is set
     *
     * @return bool
     */
    public function isInterfaceSet() : bool
    {
        return ( null !== $this->interface );
    }

    /**
     * @param string|null $interface
     * @return static
     */
    public function setInterface( ? string $interface = null ) : static
    {
        $this->interface = $interface;
        return $this;
    }

    /**
     * ATTRIBUTE spoofed
     *
     * Optional.  ENUM.
     * An indication of confidence in whether this System was the true target or attacking host.
     * The permitted values for this attribute are shown below.
     * The default value is "unknown".
     *    1.  unknown.  The accuracy of the category attribute value is unknown.
     *    2.  yes.  The category attribute value is likely incorrect.
     *              In the case of a source, the System is likely a decoy; with a target,
     *              the System was likely not the intended victim.
     *    3.  no.  The category attribute value is believed to be correct.
     *
     * @var string|null
     */
    private ? string $spoofed = null;

    /**
     * @return string|null
     */
    public function getSpoofed() : ? string
    {
        return $this->spoofed;
    }

    /**
     * Return bool true if spoofed is set
     *
     * @return bool
     */
    public function isSpoofedSet() : bool
    {
        return ( null !== $this->spoofed );
    }

    /**
     * @param string|null $spoofed
     * @return static
     */
    public function setSpoofed( ? string $spoofed = null ) : static
    {
        $this->spoofed = $spoofed;
        return $this;
    }

    /**
     * ATTRIBUTE virtual
     *
     * Optional.  ENUM.
     * Indicates whether this System is a virtual or physical device.
     * The default value is "unknown".
     *    1.  yes.  The System is a virtual device.
     *    2.  no.  The System is a physical device.
     *    3.  unknown.  It is not known if the System is virtual.
     *
     * @var string|null
     */
    private ? string $virtual = null;

    /**
     * @return string|null
     */
    public function getVirtual() : ? string
    {
        return $this->virtual;
    }

    /**
     * Return bool true if virtual is set
     *
     * @return bool
     */
    public function isVirtualSet() : bool
    {
        return ( null !== $this->virtual );
    }

    /**
     * @param string|null $virtual
     * @return static
     */
    public function setVirtual( ? string $virtual = null ) : static
    {
        $this->virtual = $virtual;
        return $this;
    }

    /**
     * ATTRIBUTE ownership
     *
     * Optional.  ENUM.
     * Describes the ownership of this System relative to the victim in the incident.
     * These values are maintained in the"System-ownership" IANA registry per Section 10.2.
     *    1.  organization.  Corporate or enterprise owned.
     *    2.  personal.  Personally owned by an employee or affiliate of the corporation or enterprise.
     *    3.  partner.  Owned by a partner of the corporation or enterprise.
     *    4.  customer.  Owned by a customer of the corporation or enterprise.
     *    5.  no-relationship.  Owned by an entity that has no known relationship with the victim organization.
     *    6.  unknown.  Ownership is unknown.
     *    7.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using thecorresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $ownership = null;

    /**
     * @return string|null
     */
    public function getOwnership() : ? string
    {
        return $this->ownership;
    }

    /**
     * Return bool true if ownership is set
     *
     * @return bool
     */
    public function isOwnershipSet() : bool
    {
        return ( null !== $this->ownership );
    }

    /**
     * @param string|null $ownership
     * @return static
     */
    public function setOwnership( ? string $ownership = null ) : static
    {
        $this->ownership = $ownership;
        return $this;
    }

    /**
     * ATTRIBUTE ext-ownership
     *
     * Optional.  STRING.
     * A means by which to extend the ownership attribute.
     * See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extExtOwnership = null;

    /**
     * @return string|null
     */
    public function getExtOwnership() : ? string
    {
        return $this->extExtOwnership;
    }

    /**
     * Return bool true if extExtOwnership is set
     *
     * @return bool
     */
    public function isExtOwnershipSet() : bool
    {
        return ( null !== $this->extExtOwnership );
    }

    /**
     * @param string|null $extExtOwnership
     * @return static
     */
    public function setExtOwnership( ? string $extExtOwnership = null ) : static
    {
        $this->extExtOwnership = $extExtOwnership;
        return $this;
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See (rfc7970) Section 3.3.1.
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
     *                     is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE extrestriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See (rfc7970) Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * Node
     *
     * One.
     * A host or network involved in the incident.
     * See  Section 3.18.
     *
     * @var Node|null
     */
    private ? Node $node = null;

    /**
     * @return Node|null
     */
    public function getNode() : ?Node
    {
        return $this->node;
    }

    /**
     * Return bool true if node is set
     *
     * @return bool
     */
    public function isNodeSet() : bool
    {
        return ( null !== $this->node );
    }

    /**
     * @param Node|null $node
     * @return static
     */
    public function setNode( ?Node $node ) : static
    {
        $this->node = $node;
        return $this;
    }

    /**
     * NodeRole
     *
     * Zero or more.
     * The intended purpose of the system.  See (rfc7970) Section 3.18.2.
     */
    use NodeRoleManyTrait;

    /**
     * Service
     *
     * Zero or more.
     * A network service running on the system.  See (rfc7970) Section 3.20.
     *
     * @var Service[]
     */
    private array $service = [];

    /**
     * @return Service[]
     */
    public function getService() : array
    {
        return $this->service;
    }

    /**
     * Return bool true if service is set
     *
     * @return bool
     */
    public function isServiceSet() : bool
    {
        return ! empty( $this->service );
    }

    /**
     * @param Service $service
     * @return static
     */
    public function addService( Service $service ) : static
    {
        $this->service[] = $service;
        return $this;
    }

    /**
     * @param null|Service[] $service
     * @return static
     */
    public function setService( ? array $service = [] ) : static
    {
        $this->service = [];
        foreach( $service as $theService ) {
            $this->addService( $theService );
        }
        return $this;
    }

    /**
     * OperatingSystem
     *
     * Zero or more.  SOFTWARE.
     * The operating system running on the system.
     *
     * @var SoftwareType[]
     */
    private array $operatingSystem = [];

    /**
     * @return SoftwareType[]
     */
    public function getOperatingSystem() : array
    {
        return $this->operatingSystem;
    }

    /**
     * Return bool true if operatingSystem is set
     *
     * @return bool
     */
    public function isOperatingSystemSet() : bool
    {
        return ! empty( $this->operatingSystem );
    }

    /**
     * @param SoftwareType $operatingSystem
     * @return static
     */
    public function addOperatingSystem( SoftwareType $operatingSystem ) : static
    {
        $this->operatingSystem[] = $operatingSystem;
        return $this;
    }

    /**
     * @param null|SoftwareType[] $operatingSystem
     * @return static
     */
    public function setOperatingSystem( ? array $operatingSystem = [] ) : static
    {
        $this->operatingSystem = [];
        foreach( $operatingSystem as $theOperatingSystem ) {
            $this->addOperatingSystem( $theOperatingSystem );
        }
        return $this;
    }


    /**
     * Counter
     *
     * Zero or more.
     * A counter with which to summarize properties of this host or network.
     * See (rfc7970) Section 3.18.3.
     */
    use CounterManyTrait;

    /**
     *  AssetID
     *
     * Zero or more.  STRING.
     * An asset identifier for the System.
     *
     * @var string[]
     */
    private array $assetID = [];

    /**
     * @return string[]
     */
    public function getAssetID() : array
    {
        return $this->assetID;
    }

    /**
     * Return bool true if assetID is set
     *
     * @return bool
     */
    public function isAssetIDSet() : bool
    {
        return ! empty ( $this->assetID );
    }

    /**
     * @param string $assetID
     * @return static
     */
    public function addAssetID( string $assetID ) : static
    {
        $this->assetID[] = $assetID;
        return $this;
    }

    /**
     * @param null|string[] $assetID
     * @return static
     */
    public function setAssetID( ? array $assetID = [] ) : static
    {
        $this->assetID = [];
        foreach( $assetID as $theAssetID ) {
            $this->addAssetID( $theAssetID );
        }
        return $this;
    }

    /**
     * Description
     *
     * Zero or more. ML_STRING.
     * A free-form text description of the  System.
     */
    use DescriptionManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more. EXTENSION.
     * A mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
