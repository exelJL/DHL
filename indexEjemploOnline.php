<?php

$data = '<?xml version="1.0" encoding="UTF-8"?>
<req:ShipmentRequest xmlns:req="http://www.dhl.com" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com ship-val-global-req.xsd" schemaVersion="6.2">
	<Request>
		<ServiceHeader>
			<MessageTime>2020-06-01T11:28:56.000-08:00</MessageTime>
			<MessageReference>1234567890123456789012345678901</MessageReference>
			<SiteID>DServiceVal</SiteID>
			<Password>testServVal</Password>
		</ServiceHeader>
		<MetaData>
			<SoftwareName>Cron</SoftwareName>
			<SoftwareVersion>6</SoftwareVersion>
		</MetaData>
	</Request>
	<RegionCode>EU</RegionCode>
	<NewShipper>N</NewShipper>
	<LanguageCode>en</LanguageCode>
	<PiecesEnabled>Y</PiecesEnabled>
	<Billing>
		<ShipperAccountNumber>950000002</ShipperAccountNumber>
		<ShippingPaymentType>S</ShippingPaymentType>
		<BillingAccountNumber>950000002</BillingAccountNumber>
		<DutyPaymentType>R</DutyPaymentType>
	</Billing>
	<Consignee>
		<CompanyName>ABM Life Centre</CompanyName>
		<AddressLine>Central 1</AddressLine>
		<AddressLine>Changi Business Park</AddressLine>
		<City>Singapore</City>
		<Division>sg</Division>
		<PostalCode>486048</PostalCode>
		<CountryCode>SG</CountryCode>
		<CountryName>Singapore</CountryName>
		<Contact>
			<PersonName>raobeert bere</PersonName>
			<PhoneNumber>11234-325423</PhoneNumber>
			<PhoneExtension>45232</PhoneExtension>
			<FaxNumber>11234325423</FaxNumber>
			<Telex>454586</Telex>
			<Email>nl@email.com</Email>
		</Contact>
	</Consignee>
	<Commodity>
		<CommodityCode>cc</CommodityCode>
		<CommodityName>cn</CommodityName>
	</Commodity>
	<Dutiable>
		<DeclaredValue>150.00</DeclaredValue>
		<DeclaredCurrency>EUR</DeclaredCurrency>
		<ScheduleB>3002905110</ScheduleB>
		<ExportLicense>D123456</ExportLicense>
		<ShipperEIN>112233445566</ShipperEIN>
		<ShipperIDType>S</ShipperIDType>
		<ImportLicense>ImportLic</ImportLicense>
		<ConsigneeEIN>ConEIN2123</ConsigneeEIN>
		<TermsOfTrade>DAP</TermsOfTrade>
	</Dutiable>
	<ShipmentDetails>
		<NumberOfPieces>2</NumberOfPieces>
		<Pieces>
			<Piece>
				<PieceID>1</PieceID>
				<PackageType>EE</PackageType>
				<Weight>20</Weight>
				<DimWeight>1200.0</DimWeight>
				<Width>2102</Width>
				<Height>220</Height>
				<Depth>200</Depth>
			</Piece>
			<Piece>
				<PieceID>2</PieceID>
				<PackageType>EE</PackageType>
				<Weight>35</Weight>
				<DimWeight>1200.0</DimWeight>
				<Width>120</Width>
				<Height>130</Height>
				<Depth>100</Depth>
			</Piece>
		</Pieces>
		<Weight>55</Weight>
		<WeightUnit>K</WeightUnit>
		<GlobalProductCode>P</GlobalProductCode>
		<LocalProductCode>P</LocalProductCode>
		<Date>2020-06-01</Date>
		<Contents>FOR TESTING PURPOSE ONLY. PLEASE DO NOT SHIP!</Contents>
		<DoorTo>DD</DoorTo>
		<DimensionUnit>C</DimensionUnit>
		<InsuredAmount>50.00</InsuredAmount>
		<PackageType>EE</PackageType>
		<IsDutiable>Y</IsDutiable>
		<CurrencyCode>EUR</CurrencyCode>
	</ShipmentDetails>
	<Shipper>
		<ShipperID>190083500</ShipperID>
		<CompanyName>BP Europa SE - BP Nederland</CompanyName>
		<RegisteredAccount>272317228</RegisteredAccount>
		<AddressLine>Anchoragelaan 8</AddressLine>
		<AddressLine>LD Schiol lane</AddressLine>
		<City>Schiphol</City>
		<Division>ld</Division>
		<PostalCode>1118</PostalCode>
		<CountryCode>NL</CountryCode>
		<CountryName>Netherlands</CountryName>
		<Contact>
			<PersonName>enquiry sing</PersonName>
			<PhoneNumber>11234-325423</PhoneNumber>
			<PhoneExtension>45232</PhoneExtension>
			<FaxNumber>11234325423</FaxNumber>
			<Telex>454586</Telex>
			<Email>test@anc.com</Email>
		</Contact>
	</Shipper>
	<SpecialService>
		<SpecialServiceType>A</SpecialServiceType>
	</SpecialService>
	<SpecialService>
		<SpecialServiceType>I</SpecialServiceType>
	</SpecialService>
	<Place>
		<ResidenceOrBusiness>B</ResidenceOrBusiness>
		<CompanyName>BP Europa SE - BP Nederland</CompanyName>
		<AddressLine>Anchoragelaan 8</AddressLine>
		<AddressLine>LD Schiol lane</AddressLine>
		<City>Schiphol</City>
		<CountryCode>NL</CountryCode>
		<DivisionCode>nl</DivisionCode>
		<Division>nl</Division>
		<PostalCode>1118</PostalCode>
		<PackageLocation>reception</PackageLocation>
	</Place>
	<EProcShip>N</EProcShip>
	<LabelImageFormat>PDF</LabelImageFormat>
</req:ShipmentRequest>
';

$tuCurl = curl_init();
curl_setopt($tuCurl, CURLOPT_URL, "https://xmlpitest-ea.dhl.com/XMLShippingServlet");
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HEADER, 0);
curl_setopt($tuCurl, CURLOPT_POST, 1);
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));

$tuData = curl_exec($tuCurl);
curl_close($tuCurl);
$simple = $tuData;
$xml = simplexml_load_string($tuData);
print"<pre>";
print_r($xml);
?>