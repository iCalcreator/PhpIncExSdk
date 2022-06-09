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

use Kigkonsult\PhpIncExSdk\Dto\EmailData as Dto;

class EmailData implements JsonInterface
{
    /**
     * Parse json array to populate new AlEmailDataert
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }

        if( isset( $jsonArray[self::EMAILTO] )) {
            foreach( $jsonArray[self::EMAILTO] as $subJsonArray ) {
                $dto->addEmailTo( $subJsonArray );
            }
        }

        if( isset( $jsonArray[self::EMAILFROM] )) {
            $dto->setEmailFrom( $jsonArray[self::EMAILFROM] );
        }

        if( isset( $jsonArray[self::EMAILSUBJECT] )) {
            $dto->setEmailSubject( $jsonArray[self::EMAILSUBJECT] );
        }

        if( isset( $jsonArray[self::EMAILX_MAILER] )) {
            $dto->setEmailXMailer( $jsonArray[self::EMAILX_MAILER] );
        }

        if( isset( $jsonArray[self::EMAILHEADERFIELD] )) {
            foreach( $jsonArray[self::EMAILHEADERFIELD] as $subJsonArray ) {
                $dto->addEmailHeaderField( ExtensionType::parse( $subJsonArray ));
            }
        }

        if( isset( $jsonArray[self::EMAILHEADERS] )) {
            $dto->setEmailHeaders( $jsonArray[self::EMAILHEADERS] );
        }

        if( isset( $jsonArray[self::EMAILBODY] )) {
            $dto->setEmailBody( $jsonArray[self::EMAILBODY] );
        }

        if( isset( $jsonArray[self::EMAILMESSAGE] )) {
            $dto->setEmailMessage( $jsonArray[self::EMAILMESSAGE] );
        }

        if( isset( $jsonArray[self::HASHDATA] )) {
            foreach( $jsonArray[self::HASHDATA] as $subJsonArray ) {
                $dto->addHashData( HashData::parse( $subJsonArray ));
            }
        }

        if( isset( $jsonArray[self::SIGNATURE] )) {
            foreach( $jsonArray[self::SIGNATURE] as $sub ) {
                $dto->addSignature( $sub );
            }
        }

        return $dto;
    }

    /**
     * Write EmailData Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }

        if( $dto->isEmailToSet()) {
            $jsonArray[self::EMAILTO] = [];
            foreach( $dto->getEmailTo() as $item ) {
                $jsonArray[self::EMAILTO][] = $item;
            }
        }

        if( $dto->isEmailFromSet()) {
            $jsonArray[self::EMAILFROM] = $dto->getEmailFrom();
        }

        if( $dto->isEmailSubjectSet()) {
            $jsonArray[self::EMAILSUBJECT] = $dto->getEmailSubject();
        }

        if( $dto->isEmailXMailerSet()) {
            $jsonArray[self::EMAILX_MAILER] = $dto->getEmailXMailer();
        }

        if( $dto->isEmailHeaderFieldSet()) {
            $jsonArray[self::EMAILHEADERFIELD] = [];
            foreach( $dto->getEmailHeaderField() as $item ) {
                $jsonArray[self::EMAILHEADERFIELD][] = ExtensionType::write( $item );
            }
        }

        if( $dto->isEmailHeadersSet()) {
            $jsonArray[self::EMAILHEADERS] = $dto->getEmailHeaders();
        }

        if( $dto->isEmailBodySet()) {
            $jsonArray[self::EMAILBODY] = $dto->getEmailBody();
        }

        if( $dto->isEmailMessageSet()) {
            $jsonArray[self::EMAILMESSAGE] = $dto->getEmailMessage();
        }

        if( $dto->isHashDataSet()) {
            $jsonArray[self::HASHDATA] = [];
            foreach( $dto->getHashData() as $item ) {
                $jsonArray[self::HASHDATA][] = HashData::write( $item );
            }
        }

        if( $dto->isSignatureSet()) {
            $jsonArray[self::SIGNATURE] = [];
            foreach( $dto->getSignature() as $item ) {
                $jsonArray[self::SIGNATURE][] = $item;
            }
        }

        return (object) $jsonArray;
    }
}
