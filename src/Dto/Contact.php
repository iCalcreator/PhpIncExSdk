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
use Kigkonsult\PhpIncExSdk\Dto\Traits\AdditionalDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * The Contact class describes contact information for organizations and personnel involved in the incident.
 * This class allows for the naming of the involved party, specifying contact information for them, and
 * identifying their role in the incident.
 *
 * Contact MUST have ATTRIBUTE(s) role and type
 *
 * At least one of the aggregate classes MUST be present in an instance of the Contact class.
 * ContactName, ContactTitle, Description, RegistryHandle, PostalAddress, Email,
 * Telephone, Timezone, Contact, AdditionalData
 */
class Contact extends DtoBase
{
    /**
     * Factory method with required role/type properties
     *
     * @param string $role
     * @param string $type
     * @return static
     */
    public static function factoryRoleType( string $role, string $type ) : static
    {
        return parent::factory()
            ->setRole( $role )
            ->setType( $type );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isRoleSet() && $this->isTypeSet() && $this->isRequiredAnySet());
    }

    /**
     * @return bool
     */
    public function isRequiredAnySet() : bool
    {
        return             (
            $this->isContactNameSet() ||
            $this->isContactTitleSet() ||
            $this->isDescriptionSet() ||
            $this->isRegistryHandleSet() ||
            $this->isPostalAddressSet() ||
            $this->isEmailSet() ||
            $this->isTelephoneSet() ||
            $this->isTimezoneSet() ||
            $this->isContactSet() ||
            $this->isAdditionalDataSet()
        );
    }

    /**
     * ATTRIBUTE role
     *
     * Required.  ENUM.
     * Indicates the role the contact fulfills.
     * These values are maintained in the "Contact-role" IANA registry per Section 10.2.
     *    1.   creator.  The entity that generates the document.
     *    2.   reporter.  The entity that reported the information.
     *    3.   admin.  An administrative contact or business owner for an asset or organization.
     *    4.   tech.  An entity responsible for the day-to-day management of technical issues for an asset or organization.
     *    5.   provider.  An external hosting provider for an asset.
     *    6.   user.  An end-user of an asset or part of an organization.
     *    7.   billing.  An entity responsible for billing issues for an asset or organization.
     *    8.   legal.  An entity responsible for legal issues related to an asset or organization.
     *    9.   irt.  An entity responsible for handling security issues for an asset or organization.
     *    10.  abuse.  An entity responsible for handling abuse originating from an asset or organization.
     *    11.  cc.  An entity that is to be kept informed about the events related to an asset or organization.
     *    12.  cc-irt.  A CSIRT or information-sharing organization coordinating activity related to an asset or organization.
     *    13.  leo.  A law enforcement organization supporting the investigation of activity affecting an asset or organization.
     *    14.  vendor.  The vendor that produces an asset.
     *    15.  vendor-support.  A vendor that provides services.
     *    16.  victim.  A victim in the incident.
     *    17.  victim-notified.  A victim in the incident who has been notified.
     *    18.  ext-value.  A value used to indicate that this attribute is extended and the actual value is provided
     *                     using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $role = null;

    /**
     * @return string|null
     */
    public function getRole() : ? string
    {
        return $this->role;
    }

    /**
     * Return bool true if role is set
     *
     * @return bool
     */
    public function isRoleSet() : bool
    {
        return ( null !== $this->role );
    }

    /**
     * @param string|null $role
     * @return static
     */
    public function setRole( ? string $role = null ) : static
    {
        $this->role = $role;
        return $this;
    }

    /**
     * ATTRIBUTE ext-role
     *
     * Optional.  STRING.
     * A means by which to extend the role attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extRole = null;

    /**
     * @return string|null
     */
    public function getExtRole() : ? string
    {
        return $this->extRole;
    }

    /**
     * Return bool true if extRole is set
     *
     * @return bool
     */
    public function isExtRoleSet() : bool
    {
        return ( null !== $this->extRole );
    }

    /**
     * @param string|null $extRole
     * @return static
     */
    public function setExtRole( ? string $extRole = null ) : static
    {
        $this->extRole = $extRole;
        return $this;
    }

    /**
     * ATTRIBUTE type
     *
     * Required.  ENUM.
     * Indicates the type of contact being described.
     * This attribute is defined as an enumerated list.
     * These values are  maintained in the "Contact-type" IANA registry per Section 10.2.
     *    1.  person.  The information for this contact references an individual.
     *    2.  organization.  The information for this contact references an organization.
     *    3.  ext-value.  A value used to indicate that this attribute is extended
     *                    and the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
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
     * ContactName
     *
     * Zero or more.  ML_STRING.
     * The name of the contact.
     * The contact  may either be an organization or a person.
     * The type attribute disambiguates the semantics.
     *
     * @var MLStringType[]
     */
    private array $contactName = [];

    /**
     * @return MLStringType[]
     */
    public function getContactName() : array
    {
        return $this->contactName;
    }

    /**
     * Return bool true if contactName is not empty
     *
     * @return bool
     */
    public function isContactNameSet() : bool
    {
        return ! empty( $this->contactName );
    }

    /**
     * @param MLStringType $contactName
     * @return static
     */
    public function addContactName( MLStringType $contactName ) : static
    {
        $this->contactName[] = $contactName;
        return $this;
    }

    /**
     * @param null|MLStringType[] $contactName
     * @return static
     */
    public function setContactName( ? array $contactName = [] ) : static
    {
        $this->contactName = [];
        foreach( $contactName as $theContactName) {
            $this->addContactName( $theContactName );
        }
        return $this;
    }

    /**
     * ContactTitle
     *
     * Zero or more.  ML_STRING.
     * The title for the individual named in the ContactName.
     *
     * @var MLStringType[]
     */
    private array $contactTitle = [];

    /**
     * @return MLStringType[]
     */
    public function getContactTitle() : array
    {
        return $this->contactTitle;
    }

    /**
     * Return bool true if contactTitle is not empty
     *
     * @return bool
     */
    public function isContactTitleSet() : bool
    {
        return ! empty( $this->contactTitle );
    }

    /**
     * @param MLStringType $contactTitle
     * @return static
     */
    public function addContactTitle( MLStringType $contactTitle ) : static
    {
        $this->contactTitle[] = $contactTitle;
        return $this;
    }

    /**
     * @param null|MLStringType[] $contactTitle
     * @return static
     */
    public function setContactTitle( ? array $contactTitle = [] ) : static
    {
        $this->contactTitle = [];
        foreach( $contactTitle as $theContactTitle) {
            $this->addContactTitle( $theContactTitle );
        }
        return $this;
    }

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the contact.
     */
    use DescriptionManyTrait;

    /**
     * RegistryHandle
     *
     * Zero or more.
     * A handle name into the registry of the contact.
     * See Section 3.9.1.
     *
     * @var RegistryHandle[]
     */
    private array $registryHandle = [];

    /**
     * @return RegistryHandle[]
     */
    public function getRegistryHandle() : array
    {
        return $this->registryHandle;
    }

    /**
     * Return bool true if registryHandle is set
     *
     * @return bool
     */
    public function isRegistryHandleSet() : bool
    {
        return ! empty( $this->registryHandle );
    }

    /**
     * @param RegistryHandle $registryHandle
     * @return static
     */
    public function addRegistryHandle( RegistryHandle $registryHandle ) : static
    {
        $this->registryHandle[] = $registryHandle;
        return $this;
    }

    /**
     * @param null|RegistryHandle[] $registryHandle
     * @return static
     */
    public function setRegistryHandle( ? array $registryHandle = [] ) : static
    {
        $this->registryHandle = [];
        foreach( $registryHandle as $theRegistryHandle ) {
            $this->addRegistryHandle( $theRegistryHandle );
        }
        return $this;
    }

    /**
     * PostalAddress
     *
     * Zero or more.
     * The postal address of the contact.
     * See Section 3.9.2.
     *
     * @var PostalAddress[]
     */
    private array $postalAddress = [];

    /**
     * @return PostalAddress[]
     */
    public function getPostalAddress() : array
    {
        return $this->postalAddress;
    }

    /**
     * Return bool true if postalAddress is set
     *
     * @return bool
     */
    public function isPostalAddressSet() : bool
    {
        return ! empty( $this->postalAddress );
    }

    /**
     * @param PostalAddress $postalAddress
     * @return static
     */
    public function addPostalAddress( PostalAddress $postalAddress ) : static
    {
        $this->postalAddress[] = $postalAddress;
        return $this;
    }

    /**
     * @param null|PostalAddress[] $postalAddress
     * @return static
     */
    public function setPostalAddress( ? array $postalAddress = [] ) : static
    {
        $this->postalAddress = [];
        foreach( $postalAddress as $thePostalAddress ) {
            $this->addPostalAddress( $thePostalAddress );
        }
        return $this;
    }

    /**
     * Email
     *
     * Zero or more.
     * The telephone number of the contact.
     * See Section 3.9.4.
     *
     * @var Email[]
     */
    private array $email = [];

    /**
     * @return Email[]
     */
    public function getEmail() : array
    {
        return $this->email;
    }

    /**
     * Return bool true if email is set
     *
     * @return bool
     */
    public function isEmailSet() : bool
    {
        return ! empty( $this->email );
    }

    /**
     * @param Email $email
     * @return static
     */
    public function addEmail( Email $email ) : static
    {
        $this->email[] = $email;
        return $this;
    }

    /**
     * @param null|Email[] $email
     * @return static
     */
    public function setEmail( ? array $email = [] ) : static
    {
        $this->email = [];
        foreach( $email as $theEmail ) {
            $this->addEmail( $theEmail );
        }
        return $this;
    }

    /**
     * Telephone
     *
     * Zero or more.
     * The telephone number of the contact.
     * See Section 3.9.4.
     *
     * @var Telephone[]
     */
    private array $telephone = [];

    /**
     * @return Telephone[]
     */
    public function getTelephone() : array
    {
        return $this->telephone;
    }

    /**
     * Return bool true if telephone is set
     *
     * @return bool
     */
    public function isTelephoneSet() : bool
    {
        return ! empty( $this->telephone );
    }

    /**
     * @param Telephone $telephone
     * @return static
     */
    public function addTelephone( Telephone $telephone ) : static
    {
        $this->telephone[] = $telephone;
        return $this;
    }

    /**
     * @param null|Telephone[] $telephone
     * @return static
     */
    public function setTelephone( ? array $telephone = [] ) : static
    {
        $this->telephone = [];
        foreach( $telephone as $theTelephone ) {
            $this->addTelephone( $theTelephone );
        }
        return $this;
    }

    /**
     * Timezone
     *
     * Zero or one.  TIMEZONE.
     * The timezone (offset) in which the contact resides.
     *
     * A timezone offset from UTC is represented in the information model by the TIMEZONE data type.
     * It is formatted according to the following regular expression: "Z|[\+\-](0[0-9]|1[0-4]):[0-5][0-9]".
     *
     * @var string|null
     */
    private ? string $timezone = null;

    /**
     * @return string|null
     */
    public function getTimezone() : ? string
    {
        return $this->timezone;
    }

    /**
     * Return bool true if timezone is set
     *
     * @return bool
     */
    public function isTimezoneSet() : bool
    {
        return ( null !== $this->timezone );
    }

    /**
     * @param string|null $timezone
     * @return static
     * @throws InvalidArgumentException
     */
    public function setTimezone( ? string $timezone = null ) : static
    {
        static $PATTERN = "/Z|[+\-](0[0-9]|1[0-4]):[0-5][0-9]/";
        if( ! empty( $timezone ) && ( 1 !== preg_match( $PATTERN, $timezone ))) {
            throw new InvalidArgumentException( 'invalid format Contact::timezone : ' . $timezone );
        }
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * Contact
     *
     * Zero or more.
     * A recursive definition of the Contact class.
     * This definition can be used to group common data pertaining to multiple points of contact
     * and is especially useful when listing multiple contacts at the same organization.
     */
    use ContactManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
