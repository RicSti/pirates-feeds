<?php
$xml = ("http://piraten.rsc24.de/index.php/tag/pp/feed/");
$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;
$channel_lastBuildDate = $channel->getElementsByTagName('lastBuildDate')
->item(0)->childNodes->item(0)->nodeValue;

$rssfeed =  '<?xml version="1.0" encoding="utf-8"?>';
$rssfeed .= '<rss version="2.0">';
$rssfeed .= '<channel>';
$rssfeed .= '<title>'.$channel_title.'</title>';
$rssfeed .= '<link>'.$channel_link.'</link>';
$rssfeed .= '<description>'.$channel_desc.'</description>';
$rssfeed .= '<language>de-DE</language>';
$rssfeed .= '<copyright>Copyright (c) 2021 RicSti</copyright>';
$rssfeed .= '<lastBuildDate>' . $channel_lastBuildDate . '</lastBuildDate>';
$rssfeed .= '<pubDate>' . $channel_lastBuildDate . '</pubDate>';
$rssfeed .= '<ttl>60</ttl>';

$x = $xmlDoc->getElementsByTagName('item');

$hashtags_array = array (
//Bund & LVs    
//                         'Piratenpartei' => ['#Piratenpartei Deutschland','die','der','der','die','EuropeanPirates'],
                         'Piraten_SN' => ['#PIRATEN Sachsen','die','der','den','die','Piratenpartei'],
                         'PiratenBremen' => ['#PIRATEN Bremen','die','der','den','die','Piratenpartei'],
                         'PiratenNDS' => ['#PIRATEN Niedersachsen','die','der','den','die','Piratenpartei'],
                         'PiratenBayern' => ['#PIRATEN Bayern','die','der','den','die','Piratenpartei'],
                         'piratenhamburg' => ['#PIRATEN Hamburg','die','der','den','die','Piratenpartei'],
                         'PiratenLSA' => ['#PIRATEN Sachsen-Anhalt','die','der','den','die','Piratenpartei'],
                         'Piraten_MV' => ['#PIRATEN Mecklenburg-Vorpommern','die','der','den','die','Piratenpartei'],
                         'PiratenTH' => ['#PIRATEN Thüringen','die','der','den','die','Piratenpartei'],
                         'PIRATEN_Saar' => ['#PIRATEN Saarland','die','der','den','die','Piratenpartei'],
                         'PiratenparteiSH' => ['#PIRATEN Schleswig-Holstein','die','der','den','die','Piratenpartei'],
                         'PiratenBW' => ['#PIRATEN Baden-Württemberg','die','der','den','die','Piratenpartei'],
                         'PiratenNRW' => ['#PIRATEN Nordrhein-Westfalen','die','der','den','die','Piratenpartei'],
                         'PiratenBerlin' => ['#PIRATEN Berlin','die','der','den','die','Piratenpartei'],
                         'piratenrlp' => ['#PIRATEN Rheinland-Pfalz','die','der','den','die','Piratenpartei'],
                         'piratenparteibb' => ['#PIRATEN Brandenburg','die','der','den','die','Piratenpartei'],
                         'PiratenHessen' => ['#PIRATEN Hessen','die','der','den','die','Piratenpartei'],

//Flaschenpost
                         'PP_Flaschenpost' => ['#PIRATEN Flaschenpost','die','der','der','die','Piratenpartei'],    
//AT & CH    
                         'piratenparteiat' => ['#Piratenpartei Österreich','die','der','der','die','EuropeanPirates'],
                         'ppsde' => ['#Piratenpartei Schweiz','die','der','der','die','ppinternational'],
                         'ppinternational' => ['#Pirate Parties International (#PPI)','die','der','der','die','EuropeanPirates'],
                         'EuropeanPirates' => ['European #Pirate Party (#PPEU)','die','der','der','die','EuropeanPirates'],
//Personen    
                         'echo_pbreyer' => ['MdEP Dr. Patrick Breyer (#PIRATEN)','der','des','dem','der','EuropeanPirates'],
//                         'AnjaHirschel' => ' von Anja Hirschel (#PIRATEN)',
//AGs    
                         'PiratenAGDrogen' => ['#PIRATEN AG Drogen- und Suchtpolitik','die','der','der','die','Piratenpartei'], 
                         'AGAussenpolitik' => ['#PIRATEN AG Aussen- und Sicherheitspolitik','die','der','der','die','Piratenpartei'],
                         'ag_wandel' => ['#PIRATEN AG Digitaler Wandel','die','der','der','die','Piratenpartei'],
                         'AGUmwelt' => ['#PIRATEN AG Umwelt','die','der','der','die','Piratenpartei'],
                         'Pflegestimme' => ['#PIRATEN AG Gesundheit und Pflege','die','der','der','die','Piratenpartei'],
                         'AGBildung' => ['#PIRATEN AG Bildung','die','der','der','die','Piratenpartei'],
                         'AG_Datenschutz' => ['#PIRATEN AG Datenschutz','die','der','der','die','Piratenpartei'],
                         'Queeraten' => ['#QUEERATEN','die','der','der','die','Piratenpartei'],
                         'sozialpiraten' => ['Sozial #PIRATEN','die','der','der','die','Piratenpartei'], 
//                         'AG_KOMBB' => ['#PIRATEN AG KOMBB','die','der','der','die','Piratenpartei'],
//BuVo    
//                         'sebulino' => 'Sebastian Alscher (#PIRATEN Bundesvorsitzender)',
//                         '_rony' => 'Dennis Deutschkämer (#PIRATEN 2V)',
//                         'derborys' => 'Borys Sobieski (#PIRATEN GenSek)',
//                         'DE_escalate' => 'Tobias Stenzel (stv. #PIRATEN GenSek)',
//                         'pr02' => 'Daniel Mönch (#PIRATEN PolGF)',
//                         'lorycamoo' => 'Lorena May (stv. #PIRATEN PolGF)',
//                         'NetterPC' => 'Detlef Netter (#PIRATEN Schatzmeister)',
//                         'seacaptain62' => 'Andreas Lange (stv. #PIRATEN Schatzmeister)',
//KVs BE
                         'MittePiraten' => ['#PIRATEN Berlin Mitte','die','der','den','die','PiratenBerlin'],
                         'PiratenBVVMitte' => ['#PIRATEN Berlin Mitte','die','der','den','die','PiratenBerlin'],
                         'PankowPiraten' => ['#PIRATEN Berlin Pankow','die','der','den','die','PiratenBerlin'],
                         'pprdf' => ['#PIRATEN Berlin Reinickendorf','die','der','den','die','PiratenBerlin'],
                         'ppfspd' => ['#PIRATEN Berlin Spandau','die','der','den','die','PiratenBerlin'],
                         'Piraten_TK' => ['#PIRATEN Berlin Treptow-Köpenick','die','der','den','die','PiratenBerlin'],
                         'bvvpiratenlbg' => ['#PIRATEN Berlin Lichtenberg','die','der','den','die','PiratenBerlin'],
                         'Piraten_MaHe' => ['#PIRATEN Berlin Marzahn-Hellersdorf','die','der','den','die','PiratenBerlin'],
//KVs BW
                         'Piraten_S' => ['#PIRATEN Stuttgart','die','der','den','die','PiratenBW'],
//KVs BY
                         'piratenLAU' => ['#PIRATEN Nürnberger Land','die','der','den','die','PiratenBayern'],
                         'PiratenHOFWUN' => ['#PIRATEN Hof/Wunsiedel','die','der','den','die','PiratenBayern'],
                         'Piraten_WUG' => ['#PIRATEN Ansbach/Weißenburg-Gunzenhausen','die','der','den','die','PiratenBayern'],
                         'Piraten_Muc' => ['#PIRATEN München','die','der','den','die','PiratenBayern'],
                         'RO_Piraten' => ['#PIRATEN Rosenheim','die','der','den','die','PiratenBayern'],
//KVs HE
                         'Piraten_FFM' => ['#PIRATEN Frankfurt','die','der','den','die','PiratenHessen'],
                         'PiratenMarburg' => ['#PIRATEN Marburg','die','der','den','die','PiratenHessen'],
                         'Piraten_OF' => ['#PIRATEN Offenbach','die','der','den','die','PiratenHessen'],
//KVs NDS
                         'PiratenHannover' => ['#PIRATEN Hannover','die','der','den','die','PiratenNDS'],
                         'piratenGOE' => ['#PIRATEN Göttingen','die','der','den','die','PiratenNDS'],
//KVs NRW
                         'PiratenBonn' => ['#PIRATEN Bonn','die','der','den','die','PiratenNRW'],
                         'PiratenDN' => ['#PIRATEN Düren','die','der','den','die','PiratenNRW'],
                         'PiratenDdorf' => ['#PIRATEN Düsseldorf','die','der','den','die','PiratenNRW'],
                         'PiratenKR' => ['#PIRATEN Krefeld','die','der','den','die','PiratenNRW'],
                         'PiratenCOE' => ['#PIRATEN Coesfeld','die','der','den','die','PiratenNRW'],
                         'piraten_marl' => ['#PIRATEN Marl','die','der','den','die','PiratenNRW'],
                         'PP_Meerbusch' => ['#PIRATEN Meerbusch','die','der','den','die','PiratenNRW'],
                         'piratengladbach' => ['#PIRATEN Mönchengladbach','die','der','den','die','PiratenNRW'],
                         'PiratenMS' => ['#PIRATEN Münster','die','der','den','die','PiratenNRW'],
                         'PiratenOB' => ['#PIRATEN Oberhausen','die','der','den','die','PiratenNRW'],
                         'Piraten_REK' => ['#PIRATEN Rhein-Erft-Kreis','die','der','den','die','PiratenNRW'],
                         'PiratenNeuss' => ['#PIRATEN Neuss','die','der','den','die','PiratenNRW'],
                         'DU_Piraten' => ['#PIRATEN Duisburg','die','der','den','die','PiratenNRW'],
//KVs RLP
                         "PiratenMainz" => ["#PIRATEN Mainz",'die','der','den','die','piratenrlp'],
                         "PiratenWP" => ["#PIRATEN Westpfalz",'die','der','den','die','piratenrlp'],
//KVs SH
                         'PiratenStormarn' => ['#PIRATEN Stornmarn','die','der','den','die','PiratenparteiSH'],
//KVs TH
                         'Piraten_Erfurt' => ['#PIRATEN Erfurt','die','der','den','die','PiratenTH'],
);

$mainAuthor = "RicSti";
$otherAuthors = array_keys($hashtags_array);
$mainAuthorOffset = array_search($mainAuthor,$otherAuthors,true);
if ($mainAuthorOffset !== false) { unset($otherAuthors[$mainAuthorOffset]); }

$templates = array (
    "Neues {{GEN}} {{NAME}}",
    "Neuigkeiten {{GEN}} {{NAME}}",
    "News {{GEN}} {{NAME}}",
    "Update {{GEN}} {{NAME}}",
    "Neuer Tweet {{GEN}} {{NAME}}",
    "Neuer Beitrag {{GEN}} {{NAME}}",
    "Neue Meldung {{GEN}} {{NAME}}",
    "Aktuelles {{GEN}} {{NAME}}",
    "Aktueller Tweet {{GEN}} {{NAME}}",
    "Folgt {{DAT}} {{NAME}}",
    "Frisches Getwitter vom Account {{GEN}} {{NAME}}",
);

//get and output "<item>" elements
$length = $x->length;
if ( $length > 0 ) {
    for ($i=0; $i<=min($length,20); $i++) {
        $item_title = $x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
        $title_array = explode ( " @ " , $item_title );
        $item_author = $title_array[0];
        $desc_array = explode ( " $$$ " , preg_replace( "/<[^>]*>/" , "" , $x->item($i)->getElementsByTagName('encoded')->item(0)->childNodes->item(0)->nodeValue ) );
        $item_desc = $desc_array[1];
        if (in_array($item_author,$otherAuthors) == true && preg_match("/#PCS/",$item_desc) !== 0) { continue; }
        preg_match_all("/(?<!&)([#][^\s[:punct:]]{2,})/",$item_desc,$item_hashtags);
        foreach($item_hashtags as $key => $value) {
            $dist_hastags = array_unique($value);
            foreach($dist_hastags as $ht_key => $ht_value){
                if (preg_match("/#piraten|#mumble/i",$ht_value)){
                    unset($dist_hastags[$ht_key]);
                }
            }
        }
        $item_desc = preg_replace( "/http[^\s]*/", "" , $item_desc );
        preg_match_all("/\s(?<!\.\s|\n|#)([A-Z][^\s[:punct:]]{7,})/",$item_desc,$results);
        foreach($results as $key => $value) {
            $dist_values = array_unique($value);
            foreach($dist_values as $dv_key => $dv_value){
                if (preg_match("/piraten|mumble/i",$dv_value)){
                    unset($dist_values[$dv_key]);
                }
            }
        }
        if (sizeof($dist_values) == 0){
            $item_desc = "\x0ACC @" . $item_author . " @" . $hashtags_array[$item_author][5];
        } else {
            $item_desc = implode(" ",array_slice($dist_hastags, 0, 1)) . " #" . implode(" #",array_slice($dist_values, 0, 1)) . "\x0ACC @" . $item_author . " @" . $hashtags_array[$item_author][5];
        }
        
        if (array_key_exists ($item_author , $hashtags_array)){
            $item_desc = str_replace("{{NOM}}",$hashtags_array[$item_author][1],
                            str_replace("{{GEN}}",$hashtags_array[$item_author][2],
                                str_replace("{{DAT}}",$hashtags_array[$item_author][3],
                                    str_replace("{{AKK}}",$hashtags_array[$item_author][4],
                                        str_replace("{{NAME}}",$hashtags_array[$item_author][0],$templates[rand(0,count($templates)-1)])
                                    )
                                )
                            )
                        ) 
                . "!\x0A" . trim($item_desc) . "\x0A";
        } else {
            continue;
        }
        $item_link = $desc_array[2];
        
        $date_array = date_parse($title_array[1]);
        $item_time = mktime($date_array['hour'], $date_array['minute'], $date_array['second'], $date_array['month'], $date_array['day'], $date_array['year']);
        $item_pubDate = date('D, d M Y H:i:s +0100', $item_time);
        
        $rssfeed .= '<item>';
        $rssfeed .= '<title>'.$item_title.'</title>';
        $rssfeed .= '<author><![CDATA[' . $item_author . ']]></author>';
        $rssfeed .= '<description>'.$item_desc.'</description>';
        $rssfeed .= '<link>'.$item_link.'</link>';
        $rssfeed .= '<pubDate>' . $item_pubDate . '</pubDate>';
        $rssfeed .= '<guid isPermaLink="false">'.$item_author . '-' . $item_time.'</guid>';
        $rssfeed .= '</item>
';
    }
}
$rssfeed .= '</channel>';
$rssfeed .= '</rss>';
print_r ($rssfeed);
?>
