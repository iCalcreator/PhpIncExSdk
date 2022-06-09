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
namespace Kigkonsult\PhpIncExSdk\Dto\Traits;

use Kigkonsult\PhpIncExSdk\Dto\Contact;

trait ContactManyTrait
{
    /**
     * @var Contact[]
     */
    private array $contact = [];

    /**
     * @return Contact[]
     */
    public function getContact() : array
    {
        return $this->contact;
    }

    /**
     * Return bool true if contact is set
     *
     * @return bool
     */
    public function isContactSet() : bool
    {
        return ! empty( $this->contact );
    }

    /**
     * @param Contact $contact
     * @return static
     */
    public function addContact( Contact $contact ) : static
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * @param Contact[] $contact
     * @return static
     */
    public function setContact( ? array $contact = [] ) : static
    {
        $this->contact = [];
        foreach( $contact as $theContact ) {
            $this->addContact( $theContact );
        }
        return $this;
    }
}
