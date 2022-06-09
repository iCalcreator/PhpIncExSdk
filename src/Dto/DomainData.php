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

use DateTime;
use Exception;
use Kigkonsult\PhpIncExSdk\Dto\Traits\NameTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;

/**
 * The DomainData class describes a domain name and metadata associated with this domain.
 *
 * DomainData MUST have ATTRIBUTE(s) system-status and domain-status
 * DomainData MUST have at least one instance of Name
 */
class DomainData extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $systemStatus
     * @param string $domainStatus
     * @param string $name
     * @return static
     */
    public static function factorySystemDomainName(
        string $systemStatus,
        string $domainStatus,
        string $name
    ) : static
    {
        return parent::factory()
            ->setSystemStatus( $systemStatus )
            ->setDomainStatus( $domainStatus )
            ->setName( $name );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isSystemStatusSet() &&
            $this->isDomainStatusSet() &&
            $this->isNameSet()
        );
    }
    /**
     * ATTRIBUTE system-status
     *
     * Required.  ENUM.
     * Assesses the domain's involvement in the event.
     * These values are maintained in the "DomainData-system-status" IANA registry per Section 10.2.
     *    1.  spoofed.  This domain was spoofed.
     *    2.  fraudulent.  This domain was operated with fraudulent intentions.
     *    3.  innocent-hacked.  This domain was compromised by a third party.
     *    4.  innocent-hijacked.  This domain was deliberately hijacked.
     *    5.  unknown.  No categorization for this domain known.
     *    6.  ext-value.  A value used to indicate that this attribute is extended and the actual value is
     *                    provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $systemStatus = null;

    /**
     * @return string|null
     */
    public function getSystemStatus() : ? string
    {
        return $this->systemStatus;
    }

    /**
     * Return bool true if systemStatus is set
     *
     * @return bool
     */
    public function isSystemStatusSet() : bool
    {
        return ( null !== $this->systemStatus );
    }

    /**
     * @param string|null $systemStatus
     * @return static
     */
    public function setSystemStatus( ? string $systemStatus = null ) : static
    {
        $this->systemStatus = $systemStatus;
        return $this;
    }

    /**
     * ATTRIBUTE ext-system-status
     *
     * Optional.  STRING.
     * A means by which to extend the system-status attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extSystemStatus = null;

    /**
     * @return string|null
     */
    public function getExtSystemStatus() : ? string
    {
        return $this->extSystemStatus;
    }

    /**
     * Return bool true if extSystemStatus is set
     *
     * @return bool
     */
    public function isExtSystemStatusSet() : bool
    {
        return ( null !== $this->extSystemStatus );
    }

    /**
     * @param string|null $extSystemStatus
     * @return static
     */
    public function setExtSystemStatus( ? string $extSystemStatus = null ) : static
    {
        $this->extSystemStatus = $extSystemStatus;
        return $this;
    }

    /**
     * ATTRIBUTE domain-status
     *
     * Required.  ENUM.
     * Categorizes the registry status of the domain at the time the document was generated.
     * These values and their associated descriptions are derived from Section 3.2.2 of [RFC3982].
     * These values are maintained in the "DomainData-domain-status" IANA registry per Section 10.2.
     *    1.   reservedDelegation.  The domain is permanently inactive.
     *    2.   assignedAndActive.  The domain is in a normal state.
     *    3.   assignedAndInactive.  The domain has an assigned registration, but the delegation is inactive.
     *    4.   assignedAndOnHold.  The domain is in dispute.
     *    5.   revoked.  The domain is in the process of being purged from the database.
     *    6.   transferPending.  The domain is pending a change in authority.
     *    7.   registryLock.  The domain is on hold by the registry.
     *    8.   registrarLock.  Same as "registryLock".
     *    9.   other.  The domain has a known status, but it is not one of the redefined enumerated values.
     *    10.  unknown.  The domain has an unknown status.
     *    11.  ext-value.  A value used to indicate that this attribute is extended and the actual value is
     *                     provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $domainStatus = null;

    /**
     * @return string|null
     */
    public function getDomainStatus() : ? string
    {
        return $this->domainStatus;
    }

    /**
     * Return bool true if domainStatus is set
     *
     * @return bool
     */
    public function isDomainStatusSet() : bool
    {
        return ( null !== $this->domainStatus );
    }

    /**
     * @param string|null $domainStatus
     * @return static
     */
    public function setDomainStatus( ? string $domainStatus = null ) : static
    {
        $this->domainStatus = $domainStatus;
        return $this;
    }

    /**
     * ATTRIBUTE ext-domain-status
     *
     * Optional.  STRING.
     * A means by which to extend the domain-status attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extDomainStatus = null;

    /**
     * @return string|null
     */
    public function getExtDomainStatus() : ? string
    {
        return $this->extDomainStatus;
    }

    /**
     * Return bool true if extDomainStatus is set
     *
     * @return bool
     */
    public function isExtDomainStatusSet() : bool
    {
        return ( null !== $this->extDomainStatus );
    }

    /**
     * @param string|null $extDomainStatus
     * @return static
     */
    public function setExtDomainStatus( ? string $extDomainStatus = null ) : static
    {
        $this->extDomainStatus = $extDomainStatus;
        return $this;
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * Name
     *
     * One.  STRING.
     * The domain name of a system.
     */
    use NameTrait;

    /**
     * DateDomainWasChecked
     *
     * Zero or one.  DATETIME.
     * A timestamp of when the domain listed in the Name class was resolved.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $dateDomainWasChecked = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getDateDomainWasChecked( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->dateDomainWasChecked ) && $asString )
            ? self::getDateTimeString( $this->dateDomainWasChecked )
            : $this->dateDomainWasChecked;
    }

    /**
     * Return bool true if dateDomainWasChecked is set
     *
     * @return bool
     */
    public function isDateDomainWasCheckedSet() : bool
    {
        return ( null !== $this->dateDomainWasChecked );
    }

    /**
     * @param string|DateTime|null $dateDomainWasChecked
     * @return static
     * @throws Exception
     */
    public function setDateDomainWasChecked( null|string|DateTime $dateDomainWasChecked ) : static
    {
        $this->dateDomainWasChecked = is_string( $dateDomainWasChecked )
            ? new DateTime( $dateDomainWasChecked )
            : $dateDomainWasChecked;
        return $this;
    }

    /**
     * RegistrationDate
     *
     * Zero or one.  DATETIME.
     * A timestamp of when domain listed in the Name class was registered.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $registrationDate = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getRegistrationDate( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->registrationDate ) && $asString )
            ? self::getDateTimeString( $this->registrationDate )
            : $this->registrationDate;
    }

    /**
     * Return bool true if registrationDate is set
     *
     * @return bool
     */
    public function isRegistrationDateSet() : bool
    {
        return ( null !== $this->registrationDate );
    }

    /**
     * @param string|DateTime|null $registrationDate
     * @return static
     * @throws Exception
     */
    public function setRegistrationDate( null|string|DateTime $registrationDate ) : static
    {
        $this->registrationDate = is_string( $registrationDate )
            ? new DateTime( $registrationDate )
            : $registrationDate;
        return $this;
    }

    /**
     * ExpirationDate
     *
     * Zero or one.  DATETIME.
     * A timestamp of when the domain listed in the Name class is set to expire.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $expirationDate = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getExpirationDate( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->expirationDate ) && $asString )
            ? self::getDateTimeString( $this->expirationDate )
            : $this->expirationDate;
    }

    /**
     * Return bool true if expirationDate is set
     *
     * @return bool
     */
    public function isExpirationDateSet() : bool
    {
        return ( null !== $this->expirationDate );
    }

    /**
     * @param string|DateTime|null $expirationDate
     * @return static
     * @throws Exception
     */
    public function setExpirationDate( null|string|DateTime $expirationDate ) : static
    {
        $this->expirationDate = is_string( $expirationDate )
            ? new DateTime( $expirationDate )
            : $expirationDate;
        return $this;
    }

    /**
     * RelatedDNS
     *
     * Zero or more.  EXTENSION.
     * Additional DNS records associated with this domain.
     *
     * @var ExtensionType[]
     */
    private array $relatedDNS = [];

    /**
     * @return ExtensionType[]
     */
    public function getRelatedDNS() : array
    {
        return $this->relatedDNS;
    }

    /**
     * Return bool true if relatedDNS is not empty
     *
     * @return bool
     */
    public function isRelatedDNSSet() : bool
    {
        return ! empty( $this->relatedDNS );
    }

    /**
     * @param ExtensionType $relatedDNS
     * @return static
     */
    public function addRelatedDNS( ExtensionType $relatedDNS ) : static
    {
        $this->relatedDNS[] = $relatedDNS;
        return $this;
    }
    /**
     * @param null|ExtensionType[] $relatedDNS
     * @return static
     */
    public function setRelatedDNS( ? array $relatedDNS = [] ) : static
    {
        $this->relatedDNS = [];
        foreach( $relatedDNS as $theRelatedDNS ) {
            $this->addRelatedDNS( $theRelatedDNS );
        }
        return $this;
    }

    /**
     * Nameservers
     *
     * Zero or more.
     * The nameservers identified for the domain listed in the Name class.
     * See Section 3.19.1.
     *
     * @var Nameservers[]
     */
    private array $nameservers = [];

    /**
     * @return Nameservers[]
     */
    public function getNameservers() : array
    {
        return $this->nameservers;
    }

    /**
     * Return bool true if nameservers is set
     *
     * @return bool
     */
    public function isNameserversSet() : bool
    {
        return ! empty( $this->nameservers );
    }

    /**
     * @param Nameservers $nameservers
     * @return static
     */
    public function addNameservers( Nameservers $nameservers ) : static
    {
        $this->nameservers[] = $nameservers;
        return $this;
    }

    /**
     * @param null|Nameservers[] $nameservers
     * @return static
     */
    public function setNameservers( ? array $nameservers = [] ) : static
    {
        $this->nameservers = [];
        foreach( $nameservers as $theNameservers ) {
            $this->addNameservers( $theNameservers );
        }
        return $this;
    }

    /**
     * DomainContacts
     *
     * Zero or one.
     * Contact information for the domain listed in the Name class supplied by the registrar or through a whois query.
     *
     * @var DomainContacts|null
     */
    private ? DomainContacts $domainContacts = null;

    /**
     * @return DomainContacts|null
     */
    public function getDomainContacts() : ? DomainContacts
    {
        return $this->domainContacts;
    }

    /**
     * Return bool true if domainContacts is set
     *
     * @return bool
     */
    public function isDomainContactsSet() : bool
    {
        return ( null !== $this->domainContacts );
    }

    /**
     * @param DomainContacts|null $domainContacts
     * @return static
     */
    public function setDomainContacts( ?DomainContacts $domainContacts ) : static
    {
        $this->domainContacts = $domainContacts;
        return $this;
    }
}
