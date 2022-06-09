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

trait StartTimeTrait
{
    /**
     * @var DateTime|null
     */
    private ? DateTime $startTime = null;

    /**
     * @param null|bool $asString  default true
     * @return null|string|DateTime
     */
    public function getStartTime( ? bool $asString = true ) : null | string | DateTime
    {
        return ( ! empty( $this->startTime ) && $asString )
            ? self::getDateTimeString( $this->startTime )
            : $this->startTime;
    }

    /**
     * Return bool true if startTime is set
     *
     * @return bool
     */
    public function isStartTimeSet() : bool
    {
        return ( null !== $this->startTime );
    }

    /**
     * @param string|DateTime|null $startTime
     * @return static
     * @throws Exception
     */
    public function setStartTime( null|string|DateTime $startTime ) : static
    {
        $this->startTime = is_string( $startTime )
            ? new DateTime( $startTime )
            : $startTime;

        return $this;
    }
}
