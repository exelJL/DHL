<?php

$data = '<?xml version="1.0" encoding="UTF-8"?>
<ShipmentRequest xsi:noNamespaceSchemaLocation="ShipmentMsgRequest.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<shipreq:ShipmentRequest>
		<RequestedShipment>
			<ShipmentInfo>
				<DropOffType>REQUEST_COURIER</DropOffType>
				<ServiceType>U</ServiceType>
				<Account> XXXXXXXXX</Account>
				<Currency>EUR</Currency>
				<UnitOfMeasurement>SI</UnitOfMeasurement>
				<PackagesCount>1</PackagesCount>
				<LabelType>PDF</LabelType>
				<LabelTemplate>ECOM26_84_001</LabelTemplate>
			</ShipmentInfo>
			<ShipTimestamp>2010-10-29T09:30:47GMT+01:00</ShipTimestamp>
			<PickupLocationCloseTime>16:12</PickupLocationCloseTime>
			<SpecialPickupInstruction>fragile items</SpecialPickupInstruction>
			<PickupLocation>west wing 3rd Floor</PickupLocation>
			<PaymentInfo>DAP</PaymentInfo>
			<InternationalDetail>
				<Commodities>
					<NumberOfPieces>1</NumberOfPieces>
					<Description>ppps sd</Description>
					<CountryOfManufacture>CZ</CountryOfManufacture>
					<Quantity>1</Quantity>
					<UnitPrice>10</UnitPrice>
					<CustomsValue>1</CustomsValue>
				</Commodities>
				<Content>NON_DOCUMENTS</Content>
			</InternationalDetail>
			<Ship>
				<Shipper>
					<Contact>
						<PersonName>John Smith</PersonName>
						<CompanyName>DHL</CompanyName>
						<PhoneNumber>003932423423</PhoneNumber>
						<EmailAddress>John.Smith@dhl.com</EmailAddress>
					</Contact>
					<Address>
						<StreetLines>V Parku 2308/10</StreetLines>
						<City>Prague</City>
						<PostalCode>14800</PostalCode>
						<CountryCode>CZ</CountryCode>
					</Address>
				</Shipper>
				<Recipient>
					<Contact>
						<PersonName>Jane Smith</PersonName>
						<CompanyName>Deutsche Post DHL</CompanyName>
						<PhoneNumber>004922832432423</PhoneNumber>
						<EmailAddress>Jane.Smith@dhl.de</EmailAddress>
					</Contact>
					<Address>
						<StreetLines>Via Felice Matteucci 2</StreetLines>
						<City>Firenze</City>
						<PostalCode>50127</PostalCode>
						<CountryCode>IT</CountryCode>
					</Address>
				</Recipient>
			</Ship>
			<Packages>
				<RequestedPackages number="1">
					<InsuredValue>10</InsuredValue>
					<Weight>9.0</Weight>
					<Dimensions>
						<Length>46</Length>
						<Width>34</Width>
						<Height>31</Height>
					</Dimensions>
					<CustomerReferences>TEST CZ-IT</CustomerReferences>
				</RequestedPackages>
			</Packages>
		</RequestedShipment>
	</shipreq:ShipmentRequest>
</ShipmentRequest>';

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