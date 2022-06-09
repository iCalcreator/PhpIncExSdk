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
 * The ServiceName class identifies an application protocol.
 * It can be described by referencing an IANA-registered protocol, by referencing a URL, or with free-form text.
 *
 * At least one of these classes MUST be present.
 * IANAService, URL, Description
 */
class ServiceName extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isIANAServiceSet() ||
            $this->isURLSet() ||
            $this->isDescriptionSet()
        );
    }
    /**
     * IANAService
     *
     * Zero or one.  STRING.
     * The name of the service per the "Service Name" field of the registry [IANA.Ports].
     *
     * @var string|null
     */
    private ? string $ianaService = null;

    /**
     * @return string|null
     */
    public function getIanaService() : ? string
    {
        return $this->ianaService;
    }

    /**
     * Return bool true if ianaService is set
     *
     * @return bool
     */
    public function isIanaServiceSet() : bool
    {
        return ( null !== $this->ianaService );
    }

    /**
     * @param string|null $ianaService
     * @return static
     */
    public function setIanaService( ? string $ianaService = null ) : static
    {
        $this->ianaService = $ianaService;
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL to a resource describing the service.
     */
    use UrlManyTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the service.
     */
    use DescriptionManyTrait;
}
