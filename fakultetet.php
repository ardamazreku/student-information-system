<?php

$myXMLData="<?xml version = '1.0' encoding = 'UTF-8'?>

	<universiteti>
		<fakultetet>
			<departamentet>
					<TIT>Teknologji Informative dhe Telekomunikacion</TIT>
					<SD>Dizajn Softueri</SD>
					<AB>Agrobiznesi</AB>
					<SHPM>Shkencat e Pyjeve dhe Mjedisit</SHPM>
					<FShqip>Programi: Fillor - ShqipProgrami:</FShqip>
					<PShqip>Parashkollor - ShqipProgrami:</PShqip>
					<FTurk>Fillor - Turke Programi:</FTurk>
					<PTurk>Parashkollor - Turke Programi:</PTurk>
					<FBoshnjak> - Boshnjake Programi:</FBoshnjak>
					<PBoshnjak>Parashkollor - Boshnjake</PBoshnjak>
					<FJuridik>Fakulteti Juridikut</FJuridik>
					<FEkonomik>Fakulteti Ekonomik</FEkonomik>
					<Shqip>Gjuhë dhe Letërsi Shqipe</Shqip>
					<Anglisht> Gjuhë dhe Letërsi Angleze</Anglisht>
					<Gjerman> Gjuhë dhe Letërsi Gjermane</Gjerman>
			</departamentet>
		</fakultetet>
</universiteti>";
echo "<table border>";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
$tit=$xml->fakultetet->departamentet->TIT;
$sd=$xml->fakultetet->departamentet->SD;
$AB=$xml->fakultetet->departamentet->AB;
$SHPM=$xml->fakultetet->departamentet->SHPM;
$FShqip=$xml->fakultetet->departamentet->FShqip;
$PShqip=$xml->fakultetet->departamentet->PShqip;
$FTurk=$xml->fakultetet->departamentet->FTurk;
$PTurk=$xml->fakultetet->departamentet->PTurk;
$FBoshnjak=$xml->fakultetet->departamentet->FBoshnjak;
$PBoshnjak=$xml->fakultetet->departamentet->PBoshnjak;
$FJuridik=$xml->fakultetet->departamentet->FJuridik;
$FEkonomik=$xml->fakultetet->departamentet->FEkonomik;
$Shqip=$xml->fakultetet->departamentet->Shqip;
$Anglisht=$xml->fakultetet->departamentet->Anglisht;
$Gjerman=$xml->fakultetet->departamentet->Gjerman;

echo "<th>Departamentet</th>";
echo "<th>Fakultetet</th>";

echo "<tr><td>".$tit."</td>";
echo "<td rowspan='2'>"."Fakulteti i Shkencave Kompjuterike"."</td></tr>";
echo "<tr><td>".$sd."</td></tr>";
echo "<tr><td>".$AB."</td>";
echo "<td rowspan='2'>"."Fakulteti i Shkencave te Jetes dhe Mjedisit"."</td></tr>";
echo "<tr><td>".$SHPM."</tr></td>";
echo "<tr><td>".$FShqip."</td>";
echo "<td rowspan='6'>"."Fakulteti i Shkencave te Jetes dhe Mjedisit"."</td></tr>";
echo "<tr><td>".$PShqip."</td></tr>";
echo "<tr><td>".$FTurk."</td></tr>";
echo "<tr><td>".$PTurk."</td></tr>";
echo "<tr><td>".$FBoshnjak."</td></tr>";
echo "<tr><td>".$PBoshnjak."</td></tr>";
echo "<tr><td>".$FJuridik."</td>";
echo "<td>"."Fakulteti Juridik"."</td></tr>";
echo "<tr><td>".$FEkonomik."</td>";
echo "<td>"."Fakulteti Ekonomik"."</td></tr>";
echo "<tr><td>".$Shqip."</td>";
echo "<td rowspan='3'>"."Fakulteti Filologjik"."</td></tr>";
echo "<tr><td>".$Anglisht."</td></tr>";
echo "<tr><td>".$Gjerman."</td></tr>";

echo "</table>";

?>