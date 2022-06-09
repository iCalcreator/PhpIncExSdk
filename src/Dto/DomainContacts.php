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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactManyTrait;

/**
 * The DomainContacts class describes the contact information for a given domain
 * provided either by the registrar or through a whois query.
 *
 * DomainContacts MUST have at least one instance of Contact
 */
class DomainContacts extends DtoBase
{
    /**
     * Factory method with required property
     *
     * @param Contact $contact
     * @return static
     */
    public static function factoryContact( Contact $contact ) : static
    {
        return parent::factory()
            ->addContact( $contact );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isContactSet();
    }

    /**
     * SameDomainContact
     *
     * Zero or one.  STRING.
     * A domain name already cited in this document or through previous exchange that contains the identical
     * contact information as the domain name in question.  The domain contact information associated with
     * this domain should be used instead of an explicit definition with the Contact class.
     *
     * @var string|null
     */
    private ? string $sameDomainContact = null;

    /**
     * @return string|null
     */
    public function getSameDomainContact() : ? string
    {
        return $this->sameDomainContact;
    }

    /**
     * Return bool true if sameDomainContact is set
     *
     * @return bool
     */
    public function isSameDomainContactSet() : bool
    {
        return ( null !== $this->sameDomainContact );
    }

    /**
     * @param string|null $sameDomainContact
     * @return static
     */
    public function setSameDomainContact( ? string $sameDomainContact = null ) : static
    {
        $this->sameDomainContact = $sameDomainContact;
        return $this;
    }

    /**
     * Contact
     *
     * One or more.
     * Contact information for the domain.
     * See (rfc7970) Section 3.9.
     */
    use ContactManyTrait;
}
