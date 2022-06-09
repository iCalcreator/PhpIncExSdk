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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 * The Reference class is an external reference to relevant information such as a vulnerability, IDS alert,
 * malware sample, advisory, or attack technique.
 *
 * At least one of these classes MUST be present.
 * enum:ReferenceName, URL, Description
 */
class Reference extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isReferenceNameSet() ||
            $this->isURLSet() ||
            $this->isDescriptionSet()
        );
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.  See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * enum:ReferenceName
     *
     * Zero or one.
     * Reference identifier per [RFC7495].
     *
     * @var ReferenceName|null
     */
    private ? ReferenceName $referenceName = null;

    /**
     * @return ReferenceName|null
     */
    public function getReferenceName() : ?ReferenceName
    {
        return $this->referenceName;
    }

    /**
     * Return bool true if referenceName is set
     *
     * @return bool
     */
    public function isReferenceNameSet() : bool
    {
        return ( null !== $this->referenceName );
    }

    /**
     * @param ReferenceName|null $referenceName
     * @return static
     */
    public function setReferenceName( ? ReferenceName $referenceName = null ) : static
    {
        $this->referenceName = $referenceName;
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL to a reference.
     */
    use UrlManyTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of this reference.
     */
    use DescriptionManyTrait;
}
