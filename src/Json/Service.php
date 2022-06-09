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
namespace Kigkonsult\PhpIncExSdk\Json;

use Kigkonsult\PhpIncExSdk\Dto\Service as Dto;

class Service implements JsonInterface
{
    /**
     * Parse json array to populate new Service
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::IP_PROTOCOL] )) {
            $dto->setIpProtocol( $jsonArray[self::IP_PROTOCOL] );
        }
        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }
        if( isset( $jsonArray[self::SERVICENAME] )) {
            $dto->setServiceName( ServiceName::parse( $jsonArray[self::SERVICENAME] ));
        }
        if( isset( $jsonArray[self::PORT] )) {
            $dto->setPort((int) $jsonArray[self::PORT] );
        }
        if( isset( $jsonArray[self::PORTLIST] )) {
            $dto->setPortlist( $jsonArray[self::PORTLIST] );
        }
        if( isset( $jsonArray[self::PROTOCODE] )) {
            $dto->setProtoCode((int) $jsonArray[self::PROTOCODE] );
        }
        if( isset( $jsonArray[self::PROTOTYPE] )) {
            $dto->setProtoType((int) $jsonArray[self::PROTOTYPE] );
        }
        if( isset( $jsonArray[self::PROTOFIELD] )) {
            $dto->setProtoField((int) $jsonArray[self::PROTOFIELD] );
        }
        if( isset( $jsonArray[self::APPLICATIONHEADERFIELD] )) {
            foreach( $jsonArray[self::APPLICATIONHEADERFIELD] as $subJsonArray ) {
                $dto->addApplicationHeaderField( ExtensionType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::EMAILDATA] )) {
            $dto->setEmailData( EmailData::parse( $jsonArray[self::EMAILDATA] ));
        }
        if( isset( $jsonArray[self::APPLICATION] )) {
            $dto->setApplication( SoftwareType::parse( $jsonArray[self::APPLICATION] ));
        }

        return $dto;
    }

    /**
     * Write Service Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isIpProtocolSet()) {
            $jsonArray[self::IP_PROTOCOL] = $dto->getIpProtocol();
        }
        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }
        if( $dto->isServiceNameSet()) {
            $jsonArray[self::SERVICENAME] = ServiceName::write( $dto->getServiceName());
        }
        if( $dto->isPortSet()) {
            $jsonArray[self::PORT] = $dto->getPort();
        }
        if( $dto->isPortlistSet()) {
            $jsonArray[self::PORTLIST] = $dto->getPortlist();
        }
        if( $dto->isProtoCodeSet()) {
            $jsonArray[self::PROTOCODE] = $dto->getProtoCode();
        }
        if( $dto->isProtoTypeSet()) {
            $jsonArray[self::PROTOTYPE] = $dto->getProtoType();
        }
        if( $dto->isProtoFieldSet()) {
            $jsonArray[self::PROTOFIELD] = $dto->getProtoField();
        }
        if( $dto->isApplicationHeaderFieldSet()) {
            $jsonArray[self::APPLICATIONHEADERFIELD] = [];
            foreach( $dto->getApplicationHeaderField() as $item ) {
                $jsonArray[self::APPLICATIONHEADERFIELD][] = ExtensionType::write( $item );
            }
        }
        if( $dto->isEmailDataSet()) {
            $jsonArray[self::EMAILDATA] = EmailData::write( $dto->getEmailData());
        }
        if( $dto->isApplicationSet()) {
            $jsonArray[self::APPLICATION] = SoftwareType::write( $dto->getApplication());
        }

        return (object) $jsonArray;
    }
}
