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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\SignatureManyTrait;

/**
 *  The EmailData class describes headers from an email message and cryptographic hashes and signatures applied to it.
 *
 * No requirements found
 */
class EmailData extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return true;
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * EmailTo
     *
     * Zero or more.  EMAIL.
     * The value of the "To:" header field (Section 3.6.3 of [RFC5322]) in an email.
     *
     * An email address is represented in the information model by the EMAIL data type.
     * The format of the EMAIL data type is documented in Section 3.4.1 of [RFC5322] and Section 3.3 of [RFC6531].
     * The EMAIL data type is implemented in the data model as an "xs:string" type per Section 3.2.1 of [W3C.SCHEMA.DTYPES].
     *
     * @var string[]
     */
    protected array $emailTo = [];

    /**
     * @return string[]
     */
    public function getEmailTo() : array
    {
        return $this->emailTo;
    }

    /**
     * Return bool true if emailTo is not empty
     *
     * @return bool
     */
    public function isEmailToSet() : bool
    {
        return ! empty( $this->emailTo );
    }

    /**
     * @param string $emailTo
     * @return static
     */
    public function addEmailTo( string $emailTo ) : static
    {
        $this->emailTo[] = $emailTo;
        return $this;
    }

    /**
     * @param null|string[] $emailTo
     * @return static
     */
    public function setEmailTo( ? array $emailTo = [] ) : static
    {
        $this->emailTo = [];
        foreach( $emailTo as $theEmailTo) {
            $this->addEmailTo( $theEmailTo );
        }
        return $this;
    }


    /**
     * EmailFrom
     *
     * Zero or one.  EMAIL.
     * The value of the "From:" header field (Section 3.6.2 of [RFC5322]) in an email.
     *
     * An email address is represented in the information model by the EMAIL data type.
     * The format of the EMAIL data type is documented in Section 3.4.1 of [RFC5322] and Section 3.3 of [RFC6531].
     * The EMAIL data type is implemented in the data model as an "xs:string" type per Section 3.2.1 of [W3C.SCHEMA.DTYPES].
     *
     * @var string|null
     */
    private ? string $emailFrom = null;

    /**
     * @return string|null
     */
    public function getEmailFrom() : ? string
    {
        return $this->emailFrom;
    }

    /**
     * Return bool true if emailFrom is set
     *
     * @return bool
     */
    public function isEmailFromSet() : bool
    {
        return ( null !== $this->emailFrom );
    }

    /**
     * @param string|null $emailFrom
     * @return static
     */
    public function setEmailFrom( ? string $emailFrom = null ) : static
    {
        $this->emailFrom = $emailFrom;
        return $this;
    }

    /**
     * EmailSubject
     *
     * Zero or one.  STRING.
     * The value of the "Subject:" header field in an email.
     * See Section 3.6.5 of [RFC5322].
     *
     * @var string|null
     */
    private ? string $emailSubject = null;

    /**
     * @return string|null
     */
    public function getEmailSubject() : ? string
    {
        return $this->emailSubject;
    }

    /**
     * Return bool true if emailSubject is set
     *
     * @return bool
     */
    public function isEmailSubjectSet() : bool
    {
        return ( null !== $this->emailSubject );
    }

    /**
     * @param string|null $emailSubject
     * @return static
     */
    public function setEmailSubject( ? string $emailSubject = null ) : static
    {
        $this->emailSubject = $emailSubject;
        return $this;
    }

    /**
     * EmailX-Mailer
     *
     * Zero or one.  STRING.
     * The value of the "X-Mailer:" header field in an email.
     *
     * @var string|null
     */
    private ? string $emailXMailer = null;

    /**
     * @return string|null
     */
    public function getEmailXMailer() : ? string
    {
        return $this->emailXMailer;
    }

    /**
     * Return bool true if emailXMailer is set
     *
     * @return bool
     */
    public function isEmailXMailerSet() : bool
    {
        return ( null !== $this->emailXMailer );
    }

    /**
     * @param string|null $emailXMailer
     * @return static
     */
    public function setEmailXMailer( ? string $emailXMailer = null ) : static
    {
        $this->emailXMailer = $emailXMailer;
        return $this;
    }

    /**
     * EmailHeaderField
     *
     * Zero or more.  EXTENSION.
     *
     * The header name and value of an arbitrary header field of the email message.
     * The name attribute MUST be set to the header name.
     * The header value MUST be set in the element body.
     * The dtype attribute MUST be set to "string".
     *
     * @var ExtensionType[]
     */
    private array $emailHeaderField = [];

    /**
     * @return ExtensionType[]
     */
    public function getEmailHeaderField() : array
    {
        return $this->emailHeaderField;
    }

    /**
     * Return bool true if emailHeaderField is not empty
     *
     * @return bool
     */
    public function isEmailHeaderFieldSet() : bool
    {
        return ! empty( $this->emailHeaderField );
    }

    /**
     * @param ExtensionType $emailHeaderField
     * @return static
     */
    public function addEmailHeaderField( ExtensionType $emailHeaderField ) : static
    {
        $this->emailHeaderField[] = $emailHeaderField;
        return $this;
    }

    /**
     * @param null|ExtensionType[] $emailHeaderField
     * @return static
     */
    public function setEmailHeaderField( ? array $emailHeaderField = [] ) : static
    {
        $this->emailHeaderField = [];
        foreach( $emailHeaderField as $extensionType ) {
            $this->addEmailHeaderField( $extensionType );
        }
        return $this;
    }

    /**
     * EmailHeaders
     *
     * Zero or one.  STRING.
     * The headers of an email message.
     *
     * @var string|null
     */
    private ? string $emailHeaders = null;

    /**
     * @return string|null
     */
    public function getEmailHeaders() : ? string
    {
        return $this->emailHeaders;
    }

    /**
     * Return bool true if emailHeaders is set
     *
     * @return bool
     */
    public function isEmailHeadersSet() : bool
    {
        return ( null !== $this->emailHeaders );
    }

    /**
     * @param string|null $emailHeaders
     * @return static
     */
    public function setEmailHeaders( ? string $emailHeaders ) : static
    {
        $this->emailHeaders = $emailHeaders;
        return $this;
    }

    /**
     * EmailBody
     *
     * Zero or one.  STRING.
     * The body of an email message.
     *
     * @var string|null
     */
    private ? string $emailBody = null;

    /**
     * @return string|null
     */
    public function getEmailBody() : ? string
    {
        return $this->emailBody;
    }

    /**
     * Return bool true if emailBody is set
     *
     * @return bool
     */
    public function isEmailBodySet() : bool
    {
        return ( null !== $this->emailBody );
    }

    /**
     * @param string|null $emailBody
     * @return static
     */
    public function setEmailBody( ? string $emailBody = null ) : static
    {
        $this->emailBody = $emailBody;
        return $this;
    }

    /**
     * EmailMessage
     *
     * Zero or one.  STRING.
     * The headers and body of an email message.
     *
     * @var string|null
     */
    private ? string $emailMessage = null;

    /**
     * @return string|null
     */
    public function getEmailMessage() : ? string
    {
        return $this->emailMessage;
    }

    /**
     * Return bool true if emailMessage is set
     *
     * @return bool
     */
    public function isEmailMessageSet() : bool
    {
        return ( null !== $this->emailMessage );
    }

    /**
     * @param string|null $emailMessage
     * @return static
     */
    public function setEmailMessage( ? string $emailMessage = null ) : static
    {
        $this->emailMessage = $emailMessage;
        return $this;
    }

    /**
     * HashData
     *
     * Zero or more.
     * Hash(es) associated with this email message.
     * See Section 3.26.
     *
     * @var HashData[]
     */
    private array $hashData = [];

    /**
     * @return HashData[]
     */
    public function getHashData() : array
    {
        return $this->hashData;
    }

    /**
     * Return bool true if hashData is set
     *
     * @return bool
     */
    public function isHashDataSet() : bool
    {
        return ! empty( $this->hashData );
    }

    /**
     * @param HashData $hashData
     * @return static
     */
    public function addHashData( HashData $hashData ) : static
    {
        $this->hashData[] = $hashData;
        return $this;
    }

    /**
     * @param null|HashData[] $hashData
     * @return static
     */
    public function setHashData( ? array $hashData = [] ) : static
    {
        $this->hashData = [];
        foreach( $hashData as $theHashData ) {
            $this->addHashData( $theHashData );
        }
        return $this;
    }

    /**
     * Signature
     *
     * Zero or more.
     * Signature(s) associated with this email message.
     */
    use SignatureManyTrait;
}
