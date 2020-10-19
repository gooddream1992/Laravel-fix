<?php 


function XMLtoArray($xml) {
    $previous_value = libxml_use_internal_errors(true);
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false; 
    $dom->loadXml($xml);
    libxml_use_internal_errors($previous_value);
    if (libxml_get_errors()) {
        return [];
    }
    return DOMtoArray($dom);
}

function DOMtoArray($root) {
    $result = array();

    if ($root->hasAttributes()) {
        $attrs = $root->attributes;
        foreach ($attrs as $attr) {
            $result['@attributes'][$attr->name] = $attr->value;
        }
    }

    if ($root->hasChildNodes()) {
        $children = $root->childNodes;
        if ($children->length == 1) {
            $child = $children->item(0);
            if (in_array($child->nodeType,[XML_TEXT_NODE,XML_CDATA_SECTION_NODE])) {
                $result['_value'] = $child->nodeValue;
                return count($result) == 1
                    ? $result['_value']
                    : $result;
            }

        }
        $groups = array();
        foreach ($children as $child) {
            if (!isset($result[$child->nodeName])) {
                $result[$child->nodeName] = DOMtoArray($child);
            } else {
                if (!isset($groups[$child->nodeName])) {
                    $result[$child->nodeName] = array($result[$child->nodeName]);
                    $groups[$child->nodeName] = 1;
                }
                $result[$child->nodeName][] = DOMtoArray($child);
            }
        }
    }
    return $result;
}



                    
/*            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://stg.highwaybus.com/rs-int03-stg-rel/er/EXT_RESERVATION",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "<?xml version=\"1.0\" encoding=\"Shift_JIS\"?>\n<soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n  <soap:Body>\n
<EXT_RESERVATION> <AGENT_CD>KBB</AGENT_CD>\n <RESULTCD>I001</RESULTCD>\n <DATAKBN>01</DATAKBN>\n <OFFICE_CD>ksk002</OFFICE_CD>\n <AGENT_ACCOUNT_ID>KBB00101</AGENT_ACCOUNT_ID>\n <RESERVE_NO></RESERVE_NO>\n <UPDATE_TS>20201010174338093</UPDATE_TS>\n <PRE_RESERVE_RESULT_ONE_COM>\n  <RESULT_CD>I201</RESULT_CD>\n  <TRANSPORT_CD>KO </TRANSPORT_CD>\n <TRANSPORT_NAME>??</TRANSPORT_NAME>\n  <WAY_NO>20</WAY_NO>\n  <WAY_ID>4101</WAY_ID>\n  <SERVICE_DT>20201010</SERVICE_DT>\n  <BUS_NO>52901</BUS_NO>\n  <ON_STATION_CD>1292</ON_STATION_CD>\n  <ON_STATION_NAME>???????????</ON_STATION_NAME>\n  <ON_STATION_RYAKU>?????BT</ON_STATION_RYAKU>\n  <DEPARTURE_TS>2020/10/10 08:30</DEPARTURE_TS>\n  <OFF_STATION_CD>3129</OFF_STATION_CD>\n  <OFF_STATION_NAME>?????</OFF_STATION_NAME>\n  <OFF_STATION_RYAKU>?????</OFF_STATION_RYAKU>\n  <ARRIVAL_TS>2020/10/10 11:00</ARRIVAL_TS>\n </PRE_RESERVE_RESULT_ONE_COM>\n
 <PRE_RESERVE_RESULT_ONE>\n  <TICKET>\n   <DISCNT_NO>0</DISCNT_NO>\n   <WEB_RECEIPT_NAME>??</WEB_RECEIPT_NAME>\n   <DISCNT_NAME>????</DISCNT_NAME>\n   <TWO_WAY_DISCNT_FLG>0</TWO_WAY_DISCNT_FLG>\n   <FARE>2100</FARE>\n   <MEN_CLASS_KBN>1</MEN_CLASS_KBN>\n   <HANDICAP_KBN>2</HANDICAP_KBN>\n   <SEAT_NAME>01C</SEAT_NAME>\n  </TICKET>\n  <TICKET>\n   <DISCNT_NO>0</DISCNT_NO>\n   <WEB_RECEIPT_NAME>??</WEB_RECEIPT_NAME>\n   <DISCNT_NAME>????</DISCNT_NAME>\n   <TWO_WAY_DISCNT_FLG>0</TWO_WAY_DISCNT_FLG>\n   <FARE>2100</FARE>\n   <MEN_CLASS_KBN>1</MEN_CLASS_KBN>\n   <HANDICAP_KBN>2</HANDICAP_KBN>\n   <SEAT_NAME>01D</SEAT_NAME>\n  </TICKET>\n </PRE_RESERVE_RESULT_ONE>\n <PRE_RESERVE_RESULT_TWO_COM>\n  <RESULT_CD></RESULT_CD>\n  <TRANSPORT_CD></TRANSPORT_CD>\n  <TRANSPORT_NAME></TRANSPORT_NAME>\n
  <WAY_NO></WAY_NO>\n  <WAY_ID></WAY_ID>\n  <SERVICE_DT></SERVICE_DT>\n  <BUS_NO></BUS_NO>\n  <ON_STATION_CD></ON_STATION_CD>\n  <ON_STATION_NAME></ON_STATION_NAME>\n  <ON_STATION_RYAKU></ON_STATION_RYAKU>\n  <DEPARTURE_TS></DEPARTURE_TS>\n  <OFF_STATION_CD></OFF_STATION_CD>\n  <OFF_STATION_NAME></OFF_STATION_NAME>\n  <OFF_STATION_RYAKU></OFF_STATION_RYAKU>\n  <ARRIVAL_TS></ARRIVAL_TS>\n </PRE_RESERVE_RESULT_TWO_COM>\n <PRE_RESERVE_RESULT_TWO>\n </PRE_RESERVE_RESULT_TWO>\n </EXT_RESERVATION>\n </soap:Body>\n</soap:Envelope>\n",
                CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache",
                  "content-type: text/xml",
                ),
            ));
<?xml version=\"1.0\" encoding=\"Shift_JIS\"?>\n<soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n  <soap:Body>\n
<EXT_RESERVATION> <ERIF010> <AGENT_CD>KBB</AGENT_CD>\n <PW>PQAgqX09sX</PW>\n <DATAKBN>01</DATAKBN>\n <TARGET_UPDATE_TS>2020100210101000</TARGET_UPDATE_TS>\n     <TARGET_MASTER_KBN>1</TARGET_MASTER_KBN>
\n </ERIF010>\n </EXT_RESERVATION>\n </soap:Body>\n</soap:Envelope>\n  
<?xml version=\"1.0\" encoding=\"Shift_JIS\"?>\n<soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n  <soap:Body>\n
<EXT_RESERVATION>  <AGENT_CD>KBB</AGENT_CD>\n <PW>PQAgqX09sX</PW>\n <DATAKBN>01</DATAKBN>\n <TARGET_UPDATE_TS>2020100210101000</TARGET_UPDATE_TS>\n     <TARGET_MASTER_KBN>1</TARGET_MASTER_KBN>
\n </ERIF010>\n </EXT_RESERVATION>\n </soap:Body>\n</soap:Envelope>\n
*/




$curl = curl_init();
curl_setopt_array($curl, array(
                CURLOPT_URL => "https://stg.highwaybus.com/rs-int03-stg-rel/er/EXT_RESERVATION?AGENT_CD=KBB&PW=PQAgqX09sX&DATAKBN=01&TARGET_UPDATE_TS=2020100210101000&TARGET_MASTER_KBN=1",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "",
                CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache",
                  "content-type: text/xml",
                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);
            $result = array();
	    if ($err) {
              echo "cURL Error #:" . $err;
            } else {
//	echo $response;exit;
                        $result = XMLtoArray($response);
echo "<pre>";
print_r($result);
echo "</pre>";
                        
            }?>