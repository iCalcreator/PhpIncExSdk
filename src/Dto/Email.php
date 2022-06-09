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

use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\TypeTrait;

/**
 * The Email class specifies an email address and associated annotation.
 *
 * Email MUST have at least one instance of EmailTo
 */
class Email extends DtoBase
{
    /**
     * Factory method with required property
     *
     * @param string $emailTo

     * @return static
     */
    public static function factoryEmailTo( string $emailTo ) : static
    {
        return parent::factory()
            ->setEmailTo( $emailTo );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isEmailToSet();
    }

    /**
     * ATTRIBUTE type
     *
     * Optional.  ENUM.
     * Categorizes the type of email address described in the EmailTo class.
     * These values are maintained in the "Email-type" IANA registry per Section 10.2.
     *    1.  direct.  An email address of an individual.
     *    2.  hotline.  An email address regularly monitored for operational purposes.
     *    3.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See Section 5.1.1.

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
     * EmailTo
     *
     * One.  EMAIL.
     * An email address.
     * An email address is represented in the information model by the EMAIL data type.
     * The format of the EMAIL data type is documented in Section 3.4.1 of [RFC5322] and Section 3.3 of [RFC6531].
     *
     * @var string|null
     */
    private ? string $emailTo = null;

    /**
     * @return string|null
     */
    public function getEmailTo() : ? string
    {
        return $this->emailTo;
    }

    /**
     * Return bool true if emailTo is set
     *
     * @return bool
     */
    public function isEmailToSet() : bool
    {
        return ( null !== $this->emailTo );
    }

    /**
     * @param string|null $emailTo
     * @return static
     */
    public function setEmailTo( ? string $emailTo = null ) : static
    {
        $this->emailTo = $emailTo;
        return $this;
    }

    /*
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the email address.
     */
    use DescriptionManyTrait;
}
