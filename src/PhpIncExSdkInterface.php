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
namespace Kigkonsult\PhpIncExSdk;

interface PhpIncExSdkInterface
{
    /**
     * '(json) names as constants (for class, properties, attributes, value...)
     */
    public const ACTION              = 'action';
    public const ADDITIONALDATA      = 'AdditionalData';
    public const ADDRESS             = 'Address';
    public const ALTERNATIVEID       = 'AlternativeID';
    public const ALTERNATIVEINDICATORID = 'AlternativeIndicatorID';
    public const APPLICATION         = 'Application';
    public const APPLICATIONHEADERFIELD = 'ApplicationHeaderField';
    public const ASSESSMENT          = 'Assessment';
    public const ASSETID             = 'AssetID';
    public const ASSOCIATEDSOFTWARE  = 'AssociatedSoftware';
    public const ATTACKPHASE         = 'AttackPhase';
    public const ATTACKPHASEID       = 'AttackPhaseID';
    public const ATTACKPATTERN       = 'AttackPattern';
    public const BULKOBSERVABLE      = 'BulkObservable';
    public const BULKOBSERVABLEFORMAT = 'BulkObservableFormat';
    public const BULKOBSERVABLELIST  = 'BulkObservableList';
    public const BUSINESSIMPACT      = 'BusinessImpact';
    public const CAMPAIGN            = 'Campaign';
    public const CAMPAIGNID          = 'CampaignID';
    public const CANONICALIZATIONMETHOD = 'CanonicalizationMethod';
    public const CATEGORY            = 'category';
    public const CAUSE               = 'Cause';
    public const CERTIFICATE         = 'Certificate';
    public const CERTIFICATEDATA     = 'CertificateData';
    public const COMPLESION          = 'completion';
    public const CONFIDENCE          = 'Confidence';
    public const CONTACT             = 'Contact';
    public const CONTACTNAME         = 'ContactName';
    public const CONTACTTITLE        = 'ContactTitle';
    public const CONTENTID           = 'ContentID';
    public const COUNTER             = 'Counter';
    public const CURRENCY            = 'currency';
    public const DATEDOMAINWASCHECKED = 'DateDomainWasChecked';
    public const DATETIME            = 'DateTime';
    public const DEFINEDCOA          = 'DefinedCOA';
    public const DESCRIPTION         = 'Description';
    public const DETECTIONCONFIGURATION = 'DetectionConfiguration';
    public const DETECTIONPATTERN    = 'DetectionPattern';
    public const DETECTTIME          = 'DetectTime';
    public const DIGESTMETHOD        = 'DigestMethod';
    public const DIGESTVALUE         = 'DigestValue';
    public const DISCOVERY           = 'Discovery';
    public const DOMAIN_STATUS       = 'domain-status';
    public const DOMAINCONTACTS      = 'DomainContacts';
    public const DOMAINDATA          = 'DomainData';
    public const DTYPE               = 'dtype';
    public const DURATION            = 'duration';
    public const EMAIL               = 'Email';
    public const EMAILBODY           = 'EmailBody';
    public const EMAILDATA           = 'EmailData';
    public const EMAILFROM           = 'EmailFrom';
    public const EMAILHEADERFIELD    = 'EmailHeaderField';
    public const EMAILHEADERS        = 'EmailHeaders';
    public const EMAILMESSAGE        = 'EmailMessage';
    public const EMAILSUBJECT        = 'EmailSubject';
    public const EMAILTO             = 'EmailTo';
    public const EMAILX_MAILER       = 'EmailX-Mailer';
    public const ENDTIME             = 'EndTime';
    public const EUID_REF            = 'euid-ref';
    public const EVENTDATA           = 'EventData';
    public const EXPECTATION         = 'Expectation';
    public const EXPIRATIONDATE      = 'ExpirationDate';
    public const EXT_ACTION          = 'ext-action';
    public const EXT_CATEGORY        = 'ext-category';
    public const EXT_DOMAIN_STATUS   = 'ext-domain-status';
    public const EXT_DTYPE           = 'ext-dtype';
    public const EXT_DURATION        = 'ext-duration';
    public const EXT_METRIC          = 'ext-metric';
    public const EXT_OFFSETUNIT      = 'ext-offsetunit';
    public const EXT_OPERATOR        = 'ext-operator';
    public const EXT_OWNERSHIP       = 'ext-ownership';
    public const EXT_PURPOSE         = 'ext-purpose';
    public const EXT_RATING          = 'ext-rating';
    public const EXT_REGISTRY        = 'ext-registry';
    public const EXT_REGISTRYACTION  = 'ext-registryaction';
    public const EXT_RESTRICTION     = 'ext-restriction';
    public const EXT_ROLE            = 'ext-role';
    public const EXT_SEVERITY        = 'ext-severity';
    public const EXT_SOURCE          = 'ext-source';
    public const EXT_SPEC_NAME       = 'ext-spec-name';
    public const EXT_SPECID          = 'ext-SpecID';
    public const EXT_STATUS          = 'ext-status';
    public const EXT_SYSTEM_STATUS   = 'ext-system-status';
    public const EXT_TYPE            = 'ext-type';
    public const EXT_UNIT            = 'ext-unit';
    public const EXT_VALUE           = 'ext-value';
    public const FILE                = 'File';
    public const FILEDATA            = 'FileData';
    public const FILENAME            = 'FileName';
    public const FILEPROPERTIES      = 'FileProperties';
    public const FILESIZE            = 'FileSize';
    public const FILETYPE            = 'FileType';
    public const FORMAT_ID           = 'format-id';
    public const FORMATID            = 'formatid';
    public const FUZZYHASH           = 'FuzzyHash';
    public const FUZZYHASHVALUE      = 'FuzzyHashValue';
    public const GENERATIONTIME      = 'GenerationTime';
    public const HANDLE              = 'handle';
    public const HASH                = 'Hash';
    public const HASHDATA            = 'HashData';
    public const HASHTARGETID        = 'HashTargetID';
    public const HISTORY             = 'History';
    public const HISTORYITEM         = 'HistoryItem';
    public const IANASERVICE         = 'IANAService';
    public const ID                  = 'ID';
    public const IMPACT              = 'Impact';
    public const INCIDENT            = 'Incident';
    public const INCIDENTCATEGORY    = 'IncidentCategory';
    public const INCIDENTID          = 'IncidentID';
    public const INDICATOR           = 'Indicator';
    public const INDICATOREXPRESSION = 'IndicatorExpression';
    public const INDICATORID         = 'IndicatorID';
    public const INDICATORREFERENCE  = 'IndicatorReference';
    public const INSTANCE            = 'instance';
    public const INTENDEDIMPACT      = 'IntendedImpact';
    public const INTERFACE           = 'interface';
    public const IP_PROTOCOL         = 'ip-protocol';
    public const KEY                 = 'Key';
    public const KEYNAME             = 'KeyName';
    public const KEYVALUE            = 'KeyValue';
    public const LANG                = 'lang';
    public const LCID                = 'id';
    public const LOCATION            = 'Location';
    public const MEANING             = 'meaning';
    public const METHOD              = 'Method';
    public const METRIC              = 'metric';
    public const MITIGATINGFACTOR    = 'MitigatingFactor';
    public const MONETARYIMPACT      = 'MonetaryImpact';
    public const NAME                = 'Name';
    public const LCNAME              = 'name';
    public const NAMESERVERS         = 'Nameservers';
    public const NODE                = 'Node';
    public const NODEROLE            = 'NodeRole';
    public const OBSERVABLE          = 'Observable';
    public const OBSERVABLE_ID       = 'observable-id';
    public const OCCURRENCE          = 'occurrence';
    public const OFFSET              = 'offset';
    public const OFFSETUNIT          = 'offsetunit';
    public const OPERATINGSYSTEM     = 'OperatingSystem';
    public const OPERATOR            = 'operator';
    public const OWNERSHIP           = 'ownership';
    public const PADDRESS            = 'PAddress';
    public const PLATFORM            = 'Platform';
    public const PORT                = 'Port';
    public const PORTLIST            = 'Portlist';
    public const POSTALADDRESS       = 'PostalAddress';
    public const PRIVATE             = 'private';  // BasicStructure::SpecID, indicates ext-SpecID must be used
    public const PRIVATE_ENUM_ID     = 'private-enum-id';
    public const PRIVATE_ENUM_NAME   = 'private-enum-name';
    public const PROTOCODE           = 'ProtoCode';
    public const PROTOFIELD          = 'ProtoField';
    public const PROTOTYPE           = 'ProtoType';
    public const PURPOSE             = 'purpose';
    public const RATING              = 'rating';
    public const RAWDATA             = 'RawData';
    public const RECORDDATA          = 'RecordData';
    public const RECORDITEM          = 'RecordItem';
    public const RECORDPATTERN       = 'RecordPattern';
    public const RECOVERYTIME        = 'RecoveryTime';
    public const REFERENCE           = 'Reference';
    public const REFERENCENAME       = 'ReferenceName';
    public const REGISTRATIONDATE    = 'RegistrationDate';
    public const REGISTRY            = 'registry';
    public const REGISTRYACTION      = 'registryaction';
    public const REGISTRYHANDLE      = 'RegistryHandle';
    public const RELATEDACTIVITY     = 'RelatedActivity';
    public const RELATEDDNS          = 'RelatedDNS';
    public const REPORTTIME          = 'ReportTime';
    public const RESTRICTION         = 'restriction';
    public const ROLE                = 'role';
    public const SAMEDOMAINCONTACT   = 'SameDomainContact';
    public const SCOPE               = 'scope';
    public const SCORING             = 'Scoring';
    public const SERVER              = 'Server';
    public const SERVICE             = 'Service';
    public const SERVICENAME         = 'ServiceName';
    public const SEVERITY            = 'severity';
    public const SIGNATURE           = 'Signature';
    public const SOURCE              = 'source';
    public const SOFTWAREREFERENCE   = 'SoftwareReference';
    public const SPEC_ID             = 'spec-id';
    public const SPEC_NAME           = 'spec-name';
    public const SPECID              = 'SpecID';
    public const SPECINDEX           = 'specIndex';
    public const SPOOFED             = 'spoofed';
    public const STARTTIME           = 'StartTime';
    public const STATUS              = 'status';
    public const SYSTEM              = 'System';
    public const SYSTEM_STATUS       = 'system-status';
    public const SYSTEMIMPACT        = 'SystemImpact';
    public const TELEPHONE           = 'Telephone';
    public const TELEPHONENUMBER     = 'TelephoneNumber';
    public const THREATACTOR         = 'ThreatActor';
    public const THREATACTORID       = 'ThreatActorID';
    public const TIMEIMPACT          = 'TimeImpact';
    public const TIMEZONE            = 'Timezone';
    public const TRANSLATIONID       = 'translation-id';
    public const TYPE                = 'type';
    public const UID_REF             = 'uid-ref';
    public const UNIT                = 'unit';
    public const URL                 = 'URL';
    public const VALUE               = 'value';
    public const VERSION             = 'version';
    public const VIRTUAL             = 'virtual';
    public const VLAN_NAME           = 'vlan-name';
    public const VLAN_NUM            = 'vlan-num';
    public const VULNERABILITY       = 'Vulnerability';
    public const WEAKNESS            = 'Weakness';
    public const WINDOWSREGISTRYKEYSMODIFIED = 'WindowsRegistryKeysModified';
    public const X509DATA            = 'X509Data';

}
