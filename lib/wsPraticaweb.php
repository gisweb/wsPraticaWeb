<?php
require_once DIR."lib/nusoap/nusoap.php";
$schema="iol";
$server = new nusoap_server; 
$server->soap_defencoding = 'UTF-8';
$server->configureWSDL('praticaweb', 'http://195.88.6.158/wsPraticaweb/sanremo.wsPraticaweb.php?wsdl');

/****************************************************************************************************************************/
/******************************* DEFINIZIONE DEI TIPI DI DATO ***************************************************************/
/****************************************************************************************************************************/

$server->wsdl->addSimpleType('tipopratica','xsd:string','SimpleType','scalar',array_values($tipoPratica));
$server->wsdl->addSimpleType('tipointervento','xsd:string','SimpleType','scalar',array_values($tipoIntervento));
$server->wsdl->addComplexType('soggetto','complexType','struct','all','',Array(
        "albo"=>Array("name"=>"albo","type"=>"xsd:string"),
        "albonumero"=>Array("name"=>"albonumero","type"=>"xsd:string"),
        "alboprov"=>Array("name"=>"alboprov","type"=>"xsd:string"),
        "app"=>Array("name"=>"app","type"=>"xsd:string"),
        "cap"=>Array("name"=>"cap","type"=>"xsd:string"),
        "capd"=>Array("name"=>"capd","type"=>"xsd:string"),
        "ccia"=>Array("name"=>"ccia","type"=>"xsd:string"),
        "cciaprov"=>Array("name"=>"cciaprov","type"=>"xsd:string"),
        "cedile"=>Array("name"=>"cedile","type"=>"xsd:string"),
        "cedileprov"=>Array("name"=>"cedileprov","type"=>"xsd:string"),
        "codfis"=>Array("name"=>"codfis","type"=>"xsd:string"),
        "cognome"=>Array("name"=>"cognome","type"=>"xsd:string"),
        "collaudatore"=>Array("name"=>"collaudatore","type"=>"xsd:int"),
        "collaudatore_ca"=>Array("name"=>"collaudatore_ca","type"=>"xsd:int"),
        "comunato"=>Array("name"=>"comunato","type"=>"xsd:string"),
        "comune"=>Array("name"=>"comune","type"=>"xsd:string"),
        "comuned"=>Array("name"=>"comuned","type"=>"xsd:string"),
        "comunicazioni"=>Array("name"=>"comunicazioni","type"=>"xsd:int"),
        "concessionario"=>Array("name"=>"concessionario","type"=>"xsd:int"),
        "datanato"=>Array("name"=>"datanato","type"=>"xsd:date"),
        "direttore"=>Array("name"=>"direttore","type"=>"xsd:boolean"),
        "economia_diretta"=>Array("name"=>"economia_diretta","type"=>"xsd:boolean"),
        "email"=>Array("name"=>"email","type"=>"xsd:string"),
        "esecutore"=>Array("name"=>"esecutore","type"=>"xsd:boolean"),
        "geologo"=>Array("name"=>"geologo","type"=>"xsd:boolean"),
        "inail"=>Array("name"=>"inail","type"=>"xsd:string"),
        "inailprov"=>Array("name"=>"inailprov","type"=>"xsd:string"),
        "indirizzo"=>Array("name"=>"indirizzo","type"=>"xsd:string"),
        "inps"=>Array("name"=>"inps","type"=>"xsd:string"),
        "inpsprov"=>Array("name"=>"inpsprov","type"=>"xsd:string"),
        "nome"=>Array("name"=>"nome","type"=>"xsd:string"),
        "note"=>Array("name"=>"note","type"=>"xsd:string"),
        "pec"=>Array("name"=>"pec","type"=>"xsd:string"),
        "piva"=>Array("name"=>"piva","type"=>"xsd:string"),
        "progettista"=>Array("name"=>"progettista","type"=>"xsd:boolean"),
        "progettista_ca"=>Array("name"=>"Progettista Cementi Armati","type"=>"xsd:boolean"),
        "proprietario"=>Array("name"=>"proprietario","type"=>"xsd:boolean"),
        "prov"=>Array("name"=>"prov","type"=>"xsd:string"),
        "provd"=>Array("name"=>"provd","type"=>"xsd:string"),
        "provnato"=>Array("name"=>"provnato","type"=>"xsd:string"),
        "ragsoc"=>Array("name"=>"ragsoc","type"=>"xsd:string"),
        "richiedente"=>Array("name"=>"richiedente","type"=>"xsd:int"),
        "sede"=>Array("name"=>"sede","type"=>"xsd:string"),
        "sesso"=>Array("name"=>"sesso","type"=>"xsd:string"),
        "sicurezza"=>Array("name"=>"sicurezza","type"=>"xsd:boolean"),
        "telefono"=>Array("name"=>"telefono","type"=>"xsd:string"),
        "titolo"=>Array("name"=>"titolo","type"=>"xsd:string"),
        "titolo_note"=>Array("name"=>"titolo_note","type"=>"xsd:string"),
        "titolod"=>Array("name"=>"titolod","type"=>"xsd:string"),
        "titolod_note"=>Array("name"=>"titolod_note","type"=>"xsd:string"),
        "voltura"=>Array("name"=>"voltura","type"=>"xsd:boolean")
        )
);

$server->wsdl->addComplexType(
    'soggetti',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:soggetto[]')
    ),
    'tns:soggetto'    
);
$server->wsdl->addComplexType('particella','complexType','struct','all','',Array(
        "sezione"=>Array("name"=>"sezione","type"=>"xsd:string"),
        "foglio"=>Array("name"=>"foglio","type"=>"xsd:string"),
        "mappale"=>Array("name"=>"mappale","type"=>"xsd:string"),
        "sub"=>Array("name"=>"sub","type"=>"xsd:string")
    )
);
$server->wsdl->addComplexType(
    'particelleterreni',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:particella[]')
    ),
    'tns:particella'
);

$server->wsdl->addComplexType(
    'particelleurbano',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:particella[]')
    ),
    'tns:particella'
);

$server->wsdl->addComplexType('indirizzo','complexType','struct','all','',Array(
        "sezione"=>Array("name"=>"via","type"=>"xsd:string"),
        "foglio"=>Array("name"=>"civico","type"=>"xsd:string"),
        "mappale"=>Array("name"=>"interno","type"=>"xsd:string")   
    )
);
$server->wsdl->addComplexType(
    'indirizzi',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:indirizzo[]')
    ),
    'tns:indirizzo'
);

$server->wsdl->addComplexType('elemento','simpleType','array','all','',Array(
        "valore"=>Array("name"=>"valore","type"=>"xsd:string"),
        "nome"=>Array("name"=>"nome","type"=>"xsd:string")
    )
);
$server->wsdl->addComplexType(
    'elencoValori',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:elemento[]')
    ),
    'tns:elemento'
);
 
 
$server->wsdl->schemaTargetNamespace = 'urn:praticaweb';

/****************************************************************************************************************************/
/********************************* DEFINIZIONE DEI METODI DEL WEB SERVICES **************************************************/
/****************************************************************************************************************************/

$server->register('aggiungiPratica',
    Array(
        "tipo"=>"tns:tipopratica",
        "intervento"=>"tns:tipointervento",
        "oggetto"=>"xsd:string",
        "note"=>"xsd:string",
        "destinazione_uso"=>"xsd:string",
        "soggetti"=>"tsn:soggetti",
        "particelle_terreni"=>"tns:particelleterreni",
        "particelle_urbano"=>"tns:particelleurbano",
        "indirizzi"=>"tns:indirizzi",
        "validation"=>"xsd:string"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string",
        "pratica"=>"xsd:int",
        "numero_pratica"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#addPratica',
    'rpc',
    'encoded',
    'Metodo che aggiunge una istanza di pratica edilizia al software Praticaweb 2.0,restituisce la chiave primaria della pratica'
);

$server->register('elencoTipologiePratica',
    Array(
        "validation"=>"xsd:string"
    ),
    Array(
        "success"=>"xsd:int",
        "elenco"=>"tns:elencoValori",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#elencoTipologiePratica',
    'rpc',
    'encoded',
    'Metodo che elenca le tipologie di pratica'
);
$server->register('elencoTipologieIntervento',
    Array("validation"=>"xsd:string"),
    Array(
        "success"=>"xsd:int",
        "elenco"=>"tns:elencoValori",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#elencoTipologieIntervento',
    'rpc',
    'encoded',
    'Metodo che elenca le tipologie di intervento delle pratiche'
);
/*$server->register('aggiornaPratica',
    Array(
        "pratica"=>"xsd:int",
        "tipo"=>"tns:tipopratica",
        "intervento"=>"tns:tipointervento",
        "oggetto"=>"xsd:string",
        "note"=>"xsd:string",
        "destinazione_uso"=>"xsd:string"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#updatePratica',
    'rpc',
    'encoded',
    'Metodo che aggiorna una istanza di pratica edilizia nel software Praticaweb 2.0'
);
$server->register('aggiungiSoggetto',
    Array(
        "pratica"=>"xsd:int",
        "soggetto"=>"tsn:soggetto"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#addSoggetto',
    'rpc',
    'encoded',
    'Metodo che aggiunge un soggetto ad pratica edilizia al software Praticaweb 2.0'
);
$server->register('aggiornaSoggetto',
    Array(
        "pratica"=>"xsd:int",
        "soggetto"=>"tsn:soggetto"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#updateSoggetto',
    'rpc',
    'encoded',
    'Metodo che aggiorna un soggetto di una pratica edilizia nel software Praticaweb 2.0'
);
$server->register('volturaSoggetto',
    Array(
        "pratica"=>"xsd:int",
        "soggetto"=>"tsn:soggetto"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#volturaSoggetto',
    'rpc',
    'encoded',
    'Metodo che voltura un soggetto di una pratica edilizia nel software Praticaweb 2.0'
);
$server->register('rimuoviSoggetto',
    Array(
        "pratica"=>"xsd:int",
        "soggetto"=>"tsn:soggetto"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#deleteSoggetto',
    'rpc',
    'encoded',
    'Metodo che rimuove un soggetto di una pratica edilizia nel software Praticaweb 2.0'
);
$server->register('aggiungiParticellaTerreni',
    Array(
        "pratica"=>"xsd:int",
        "particella"=>"tsn:particellaterreni"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#addParticellaTerreni',
    'rpc',
    'encoded',
    'Metodo che aggiunge una particella del catasto terreni ad pratica edilizia al software Praticaweb 2.0'
);
$server->register('rimuoviParticellaTerreni',
    Array(
        "pratica"=>"xsd:int",
        "particella"=>"tsn:particellaterreni"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#deleteParticellaTerreni',
    'rpc',
    'encoded',
    'Metodo che rimuove una particella del catasto terreni di una pratica edilizia nel software Praticaweb 2.0'
);
$server->register('aggiungiParticellaUrbano',
    Array(
        "pratica"=>"xsd:int",
        "particella"=>"tsn:particellaurbano"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#addParticellaUrbano',
    'rpc',
    'encoded',
    'Metodo che aggiunge una particella del catasto urbano ad pratica edilizia al software Praticaweb 2.0'
);
$server->register('rimuoviParticellaUrbano',
    Array(
        "pratica"=>"xsd:int",
        "particella"=>"tsn:particellaurbano"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#deleteParticellaUrbano',
    'rpc',
    'encoded',
    'Metodo che rimuove una particella del catasto urbano di una pratica edilizia nel software Praticaweb 2.0'
);
$server->register('aggiungiIndirizzo',
    Array(
        "pratica"=>"xsd:int",
        "indirizzo"=>"tsn:indirizzo"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#addIndirizzo',
    'rpc',
    'encoded',
    'Metodo che aggiunge un indirizzo ad pratica edilizia al software Praticaweb 2.0'
);
$server->register('rimuoviIndirizzo',
    Array(
        "pratica"=>"xsd:int",
        "soggetto"=>"tsn:indirizzo"
    ),
    Array(
        "success"=>"xsd:int",
        "message"=>"xsd:string"
    ),
    'urn:praticaweb',
    'urn:praticaweb#deleteIndirizzo',
    'rpc',
    'encoded',
    'Metodo che rimuove un indirizzo di una pratica edilizia nel software Praticaweb 2.0'
);*/

/****************************************************************************************************************************/
/************************************* IMPLEMENTAZIONE  DEI METODI **********************************************************/
/****************************************************************************************************************************/
function elencoTipologiePratica($validation=""){
    if (!utils::checkValidation($validation)){
        return Array(
            "success"=>-1,
            "elenco"=>Array(),
            "message"=>"Non si dispone delle autorizzazioni per interrogare il web services."
        );
    }
    $dbh=new PDO(DSN);
    $result=Array();
    $sqlTipoPratica="SELECT id as valore,nome FROM pe.e_tipopratica WHERE enabled=1 order by 1;";
    $stmt=$dbh->prepare($sqlTipoPratica);
    if($stmt->execute()){
        $r=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $result=Array(
            "success"=>1,
            "elenco"=>$r,
            "message"=>"OK"
        );
    }
    else{
        $err=$stmt->errorInfo();
        $result=Array(
            "success"=>-1,
            "elenco"=>Array(),
            "message"=>$err[2]
        );
    }
    return $result;
}
function elencoTipologieIntervento($validation=""){
    if (!utils::checkValidation($validation)){
        return Array(
            "success"=>-1,
            "elenco"=>Array(),
            "message"=>"Non si dispone delle autorizzazioni per interrogare il web services."
        );
    }
    $dbh=new PDO(DSN);
    $sqlTipoIntervento="SELECT id as valore,descrizione as nome FROM pe.e_intervento;";
    $stmt=$dbh->prepare($sqlTipoIntervento);
    if($stmt->execute()){
        $r=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $result=Array(
            "success"=>1,
            "elenco"=>$r,
            "message"=>"OK"
        );
    }
    else{
        $err=$stmt->errorInfo();
        $result=Array(
            "success"=>-1,
            "elenco"=>Array(),
            "message"=>$err[2]
        );
    }
    return $result;
}
function aggiungiPratica($tipo,$intervento,$oggetto,$note,$destuso,$soggetti,$cterreni,$curbano,$indirizzi,$validation=""){
    if (!utils::checkValidation($validation)){
        return Array(
            "success"=>-1,
            "elenco"=>Array(),
            "message"=>"Non si dispone delle autorizzazioni per interrogare il web services."
        );
    }
    utils::debug(DEBUG_DIR."addPratica.debug", $soggetti);
    $dbh=new PDO(DSN);
    $schema="iol";
    $result=Array();
    $sql="INSERT INTO $schema.avvioproc(tipo,intervento,oggetto,note) values(:tipo,:intervento,:oggetto,:note)";
    //$dbh->beginTransaction();
    $stmt=$dbh->prepare($sql);
    $errors=Array();
    if (!$stmt->execute(Array("tipo"=>$tipo,"intervento"=>$intervento,"oggetto"=>$oggetto,"note"=>$note))){
        $err=$stmt->errorInfo();
        $errors[]=$err[2];
    }
    else{
        $lastID=$dbh->lastInsertId('iol.avvioproc_id_seq');
        $sql="SELECT pratica,numero FROM $schema.avvioproc WHERE id=?;";
        $stmt=$dbh->prepare($sql);
        if (!$stmt->execute(Array($lastID))){
            $err=$stmt->errorInfo();
            $errors[]=sprintf("Errore nell'inserimento dei dati della pratica. Il database ha risposto:\"%s\"",$err[2]);
        }
        else{
            $r=$stmt->fetch(PDO::FETCH_ASSOC);
            $pratica=$r["pratica"];
        }
        
    }
    
    if ($errors){
        $result=Array("success"=>-1,"message"=>implode("\n",$errors));
        return $result;
    }
    
/**************************************************************************************************************************/
/******************************* AGGIUNTA DEI SOGGETTI ********************************************************************/
/**************************************************************************************************************************/    
    
    for($i=0;$i<count($soggetti);$i++){
        $res=aggiungiSoggetto($pratica,$soggetti[$i]);
        if ($res["success"]==-1) $errors[]=$res["message"];
    }
    if ($errors){
        $result=Array("success"=>-1,"message"=>implode("\n",$errors));
        return $result;
    }
    
/***************************************************************************************************************************/
/******************************* AGGIUNTA DEI DATI CATASTALI ***************************************************************/
/***************************************************************************************************************************/

    for($i=0;$i<count($cterreni);$i++){
        $res=aggiungiParticellaTerreni($pratica,$cterreni[$i]);
        if ($res["success"]==-1) $errors[]=$res["message"];
    }
    if ($errors){
        $result=Array("success"=>-1,"message"=>implode("\n",$errors));
        return $result;
    }
    for($i=0;$i<count($curbano);$i++){
        $res=aggiungiParticellaUrbano($pratica,$curbano[$i]);
        if ($res["success"]==-1) $errors[]=$res["message"];
    }
    if ($errors){
        $result=Array("success"=>-1,"message"=>implode("\n",$errors));
        return $result;
    }

/***************************************************************************************************************************/    
/******************************* AGGIUNTA UBICAZIONI DELL'INTERVENTO *******************************************************/    
/***************************************************************************************************************************/
    
    for($i=0;$i<count($indirizzi);$i++){
        $res=aggiungiIndirizzo($pratica,$indirizzi[$i]);
        if ($res["success"]==-1) $errors[]=$res["message"];
    }
    if ($errors){
        $result=Array("success"=>-1,"message"=>implode("\n",$errors));
        return $result;
    }
    
/***************************************************************************************************************************/
/******************************* RESTITUZIONE DEL RISULTATO ****************************************************************/    
/***************************************************************************************************************************/
    
    if ($errors){
        $result=Array("success"=>-1,"message"=>implode("\n",$errors));
    }
    else{
        $result = Array("success"=>1,"message"=>"OK","pratica"=>$r['pratica'],"numero_pratica"=>$r['numero']);
    }
    return $result;
}

function aggiungiSoggetto($pratica,$data){
    $dbh=new PDO(DSN);
    $schema="iol";
    $errors=Array();
    $result=Array();
    $data=utils::checkValues($data);
    utils::debug(DEBUG_DIR."soggetti.debug", $data,'w');
    $sql="INSERT INTO $schema.soggetti(albo,albonumero,alboprov,app,cap,capd,ccia,cciaprov,cedile,cedileprov,codfis,cognome,collaudatore,collaudatore_ca,comunato,comune,comuned,comunicazioni,concessionario,datanato,direttore,economia_diretta,email,esecutore,geologo,inail,inailprov,indirizzo,inps,inpsprov,nome,note,pec,piva,progettista,progettista_ca,proprietario,prov,provd,provnato,ragsoc,richiedente,sede,sesso,sicurezza,telefono,titolo,titolod,titolod_note,titolo_note,voltura) VALUES(:albo,:albonumero,:alboprov,:app,:cap,:capd,:ccia,:cciaprov,:cedile,:cedileprov,:codfis,:cognome,:collaudatore,:collaudatore_ca,:comunato,:comune,:comuned,:comunicazioni,:concessionario,:datanato,:direttore,:economia_diretta,:email,:esecutore,:geologo,:inail,:inailprov,:indirizzo,:inps,:inpsprov,:nome,:note,:pec,:piva,:progettista,:progettista_ca,:proprietario,:prov,:provd,:provnato,:ragsoc,:richiedente,:sede,:sesso,:sicurezza,:telefono,:titolo,:titolod,:titolod_note,:titolo_note,:voltura);";
    $stmt=$dbh->prepare($sql);
    if (!$stmt->execute($data)){
        $err=$stmt->errorInfo();
        $result=Array("success"=>-1,"message"=>sprintf("Errore nell'inserimento dei soggetti. Il database ha risposto:\"%s\"",$err[2]));
    }    
    else{
        $result = Array("success"=>1,"message"=>"OK");
    }
    return $result;
}

function aggiungiParticellaTerreni($pratica,$data){
    $dbh=new PDO(DSN);
    $schema="iol";
    $errors=Array();
    $result=Array();
    $data=utils::checkValues($data);
    utils::debug(DEBUG_DIR."cterreni.debug", $data,'w');
    $sql="INSERT INTO $schema.cterreni(foglio,mappale,sezione,sub) VALUES(:foglio,:mappale,:sezione,:sub);";
    $stmt=$dbh->prepare($sql);
    if (!$stmt->execute($data)){
        $err=$stmt->errorInfo();
        $result=Array("success"=>-1,"message"=>sprintf("Errore nell'inserimento dei dati del catasto terreni. Il database ha risposto:\"%s\"",$err[2]));
    }    
    else{
        $result = Array("success"=>1,"message"=>"OK");
    }
    return $result;
}

function aggiungiParticellaUrbano($pratica,$data){
    $dbh=new PDO(DSN);
    $schema="iol";
    $errors=Array();
    $result=Array();
    $data=utils::checkValues($data);
    utils::debug(DEBUG_DIR."curbano.debug", $data,'w');
    $sql="INSERT INTO $schema.cterreni(foglio,mappale,sezione,sub) VALUES(:foglio,:mappale,:sezione,:sub);";
    $stmt=$dbh->prepare($sql);
    if (!$stmt->execute($data)){
        $err=$stmt->errorInfo();
        $result=Array("success"=>-1,"message"=>sprintf("Errore nell'inserimento dei dati del catasto urbano. Il database ha risposto:\"%s\"",$err[2]));
    }    
    else{
        $result = Array("success"=>1,"message"=>"OK");
    }
    return $result;
}


function aggiungiIndirizzo($pratica,$data){
    $dbh=new PDO(DSN);
    $schema="iol";
    $errors=Array();
    $result=Array();
    $data=utils::checkValues($data);
    utils::debug(DEBUG_DIR."indirizzi.debug", $data,'w');
    $sql="INSERT INTO $schema.indirizzi(civico,interno,via) VALUES(:civico,:interno,:via);";
    $stmt=$dbh->prepare($sql);
    if (!$stmt->execute($data)){
        $err=$stmt->errorInfo();
        $result=Array("success"=>-1,"message"=>sprintf("Errore nell'inserimento delle ubicazioni dell'intervento. Il database ha risposto:\"%s\"",$err[2]));
    }    
    else{
        $result = Array("success"=>1,"message"=>"OK");
    }
    return $result;
}
/*******************************************************************************************************************/
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>