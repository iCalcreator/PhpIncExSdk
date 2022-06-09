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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ApplicationTrait;

/**
 * The Hash class describes a cryptographic hash value; the algorithm and application used to generate it;
 * and the canonicalization method applied to the object being hashed.
 *
 * Hash MUST have at least one instance of ds:DigestMethod and ds:DigestValue
 */
class Hash extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $digestMethod
     * @param string $digestValue
     * @return static
     */
    public static function factoryDigestMethodDigestvalue( string $digestMethod, string $digestValue ) : static
    {
        return parent::factory()
            ->setDigestMethod( $digestMethod )
            ->setDigestValue( $digestValue );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isDigestMethodSet() && $this->isDigestValueSet());
    }
    /**
     * ds:DigestMethod
     *
     * One.
     * The hash algorithm used to generate the hash.
     * See (rfc7970) Section 4.3.3.5 of [W3C.XMLSIG].
     *
     * @var string|null
     */
    private ? string $digestMethod = null;

    /**
     * @return string|null
     */
    public function getDigestMethod() : ? string
    {
        return $this->digestMethod;
    }

    /**
     * Return bool true if digestMethod is set
     *
     * @return bool
     */
    public function isDigestMethodSet() : bool
    {
        return ( null !== $this->digestMethod );
    }

    /**
     * @param string|null $digestMethod
     * @return static
     */
    public function setDigestMethod( ? string $digestMethod = null ) : static
    {
        $this->digestMethod = $digestMethod;
        return $this;
    }

    /**
     * ds:DigestValue
     *
     * One.
     * The computed hash value.
     * See (rfc7970) Section 4.3.3.6 of [W3C.XMLSIG].
     *
     * @var string|null
     */
    private ? string $digestValue = null;

    /**
     * @return string|null
     */
    public function getDigestValue() : ? string
    {
        return $this->digestValue;
    }

    /**
     * Return bool true if digestValue is set
     *
     * @return bool
     */
    public function isDigestValueSet() : bool
    {
        return ( null !== $this->digestValue );
    }

    /**
     * @param string|null $digestValue
     * @return static
     */
    public function setDigestValue( ? string $digestValue = null ) : static
    {
        $this->digestValue = $digestValue;
        return $this;
    }

    /**
     * ds:CanonicalizationMethod
     *
     * Zero or one.
     * The canonicalization method used on the object being hashed.
     * See (rfc7970) Section 4.3.1 of [W3C.XMLSIG].
     *
     * @var string|null
     */
    private ? string $canonicalizationMethod = null;

    /**
     * @return string|null
     */
    public function getCanonicalizationMethod() : ? string
    {
        return $this->canonicalizationMethod;
    }

    /**
     * Return bool true if canonicalizationMethod is set
     *
     * @return bool
     */
    public function isCanonicalizationMethodSet() : bool
    {
        return ( null !== $this->canonicalizationMethod );
    }

    /**
     * @param string|null $canonicalizationMethod
     * @return static
     */
    public function setCanonicalizationMethod( ? string $canonicalizationMethod = null ) : static
    {
        $this->canonicalizationMethod = $canonicalizationMethod;
        return $this;
    }

    /**
     * Application
     *
     * Zero or one.  SOFTWARE.
     * The application used to calculate the  hash.
     */
    use ApplicationTrait;

}
