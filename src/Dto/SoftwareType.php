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
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 * The rfc7970 SOFTWARE data type:
 *
 * A particular version of software is represented in the information model by the SOFTWARE data type.
 * This software can be described by using a reference, a URL, or with free-form text.
 *
 * At least one of SoftwareReference, URL or Description MUST be present.
 */
class SoftwareType extends DtoBase
{
    /**
     * Factory method with property SoftwareReference
     *
     * @param SoftwareReference $softwareReference
     * @return static
     */
    public static function factorySoftwareReference( SoftwareReference $softwareReference ) : static
    {
        return parent::factory()
            ->setSoftwareReference( $softwareReference );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isSoftwareReferenceSet() || $this->isUrlSet() || $this->isDescriptionSet());
    }

    /**
     * SoftwareReference
     *
     * Zero or one.
     * Reference to a software application.
     * See (rfc7970) Section 2.15.1.
     *
     * @var SoftwareReference|null
     */
    private ? SoftwareReference $softwareReference = null;

    /**
     * @return SoftwareReference|null
     */
    public function getSoftwareReference() : ? SoftwareReference
    {
        return $this->softwareReference;
    }

    /**
     * Return bool true if softwareReference is set
     *
     * @return bool
     */
    public function isSoftwareReferenceSet() : bool
    {
        return ( null !== $this->softwareReference );
    }

    /**
     * @param SoftwareReference|null $softwareReference
     * @return static
     */
    public function setSoftwareReference( ? SoftwareReference $softwareReference = null ) : static
    {
        $this->softwareReference = $softwareReference;
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.  A URL to a resource describing the software.
     */
    use UrlManyTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.  A free-form text description of the software.
     */
    use DescriptionManyTrait;
}
