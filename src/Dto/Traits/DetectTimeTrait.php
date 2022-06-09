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

use DateTime;
use Exception;

trait DetectTimeTrait
{
    /**
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     *
     * @var DateTime|null
     */
    private ? DateTime $detectTime = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getDetectTime( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->detectTime ) && $asString )
            ? self::getDateTimeString( $this->detectTime )
            : $this->detectTime;
    }

    /**
     * Return bool true if detectTime is set
     *
     * @return bool
     */
    public function isDetectTimeSet() : bool
    {
        return ( null !== $this->detectTime );
    }

    /**
     * @param string|DateTime|null $detectTime
     * @return static
     * @throws Exception
     */
    public function setDetectTime( null|string|DateTime $detectTime ) : static
    {
        $this->detectTime = is_string( $detectTime )
            ? new DateTime( $detectTime )
            : $detectTime;
        return $this;
    }
}
