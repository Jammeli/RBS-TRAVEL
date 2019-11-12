<!DOCTYPE html>
<html lang="en">

            <?php include("connexion.php");?>
<head><title>RBS Travel </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONT CSS-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link type="text/css" rel="stylesheet" href="assets/font/font-icon/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="assets/font/font-icon/font-flaticon/flaticon.css">
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/animate/animate.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/slick-slider/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/slick-slider/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/selectbox/css/jquery.selectbox.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/please-wait/please-wait.css">
    <!-- STYLE CSS-->
    <link type="text/css" rel="stylesheet" href="assets/css/layout.css">
    <link type="text/css" rel="stylesheet" href="assets/css/components.css">
    <link type="text/css" rel="stylesheet" href="assets/css/responsive.css">
</head>
<body onLoad=" <?php if(isset($_GET['type']) && $_GET['type']=='retour') echo 'montre(2)';?>">
<div class="body-wrapper"><!-- MENU MOBILE-->
    <?php include("header_responsive.php");?>
    <!-- WRAPPER CONTENT-->
    <div class="wrapper-content"><!-- HEADER-->
            <?php include("header.php");?>

        <!-- WRAPPER-->
        <div id="wrapper-content"><!-- MAIN CONTENT-->
            <div class="main-content">
                <section class="page-banner about-us-page" style="background-image:url(assets/images/vols.jpg); background-attachment: local;">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link"> Billetterie</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions"> Billetterie</h2></div>
                        </div>
                    </div>
                </section>
                <section class="about-us layout-2 padding-top padding-bottom about-us-4 mmmm">
                    <div class="container">
                        <div class="row">
                            <div class="wrapper-contact-style">
                                <div class="col-lg-8 col-md-8"><h3 class="title-style-2"> Billetterie</h3>

                                    <div class="about-us-wrapper">
                                    
                            <div class="booking-section travelo-box ">

  
<div class="alert alert-error" id="erreurG" style="display:none;">
                                <strong>Erreur!</strong>
                                <div  id="erreur"></div>
                            </div>
                            
<?php if(!isset($_POST['suivant']) && empty($_GET['etape']) ){ ?>
                            
                        <input <?php if((isset($_GET['type']) && $_GET['type']=='aller') || empty($_GET['type'])) echo ' checked ';?> onChange="montre(1)" type="radio" name="vol" value="1">Aller simple
                        <input  <?php if(isset($_GET['type']) && $_GET['type']=='retour') echo ' checked ';?>  onChange="montre(2)" type="radio" name="vol" value="2">Aller et retour
                           <div id="flights-tab">
                            <form action="vols.html?etape=2" method="post" onSubmit="return test();">
                            
                            
<table>
<tr><td><label>Partir de </label></td><td>

<select name="depart" id="dapart"   class="tb-input">            
                           <option value='' selected >selectionner un pays </option>
                           <option value='Tunisie'  >Tunisie </option>
                           
                          <option value='Allemagne'>Allemagne </option>
                          <option value='Australie'>Australie </option>
                          <option value='Belgique'>Belgique </option>
                          <option value='Canada'>Canada </option>
                          <option value='Danemark'>Danemark </option>
                          <option value='Espagne'>Espagne </option>
                          <option value='USA'>Etats-Unis d'Amerique </option>
                          <option value='France'>France </option>
                          <option value='Italie'>Italie </option>
                          <option value='Japon'>Japon </option>
                          <option value='Pays_Bas '>Pays-Bas </option>
                          <option value='Royaume_Uni'>Royaume-Uni </option>
                          <option value='Suède'>Suède </option>
                          <option value='Suisse'>Suisse </option>
                          <option value='Afghanistan'>Afghanistan </option>
                          <option value='Afrique_du_Sud '>Afrique du Sud </option>
                          <option value='Albanie'>Albanie </option>
                          <option value='Alg&eacute;rie'>Alg&eacute;rie </option>
                          <option value='Andorre'>Andorre </option>
                          <option value='Angola'>Angola </option>
                          <option value='Anguilla'>Anguilla </option>
                          <option value='Antarctique'>Antarctique </option>
                          <option value='Antigua_et_Barbuda '>Antigua et Barbuda </option>
                          <option value='Antilles_N&eacute;erlandaises'>Antilles N&eacute;erlandaises </option>
                          <option value='Arabie_Saoudite'>Arabie Saoudite </option>
                          <option value='Argentine'>Argentine </option>
                          <option value='Arm&eacute;nie'>Arm&eacute;nie </option>
                          <option value='Aruba'>Aruba </option>
                          <option value='Ascension'>Ascension </option>
                          <option value='Autriche'>Autriche </option>
                          <option value='Azerbaidjan'>Azerbaidjan </option>
                          <option value='Bahamas'>Bahamas </option>
                          <option value='Bahrein'>Bahrein </option>
                          <option value='Bangladesh'>Bangladesh </option>
                          <option value='Barbade'>Barbade </option>
                          <option value='Belarus'>Belarus </option>
                          <option value='Belize'>Belize </option>
                          <option value='B&eacute;nin'>B&eacute;nin </option>
                          <option value='Bermudes'>Bermudes </option>
                          <option value='Bhoutan'>Bhoutan </option>
                          <option value='Bolivie'>Bolivie </option>
                          <option value='Bosnie_Herz&eacute;govine'>Bosnie-Herz&eacute;govine </option>
                          <option value='Botswana'>Botswana </option>
                          <option value='Br&eacute;sil'>Br&eacute;sil </option>
                          <option value='Brunei'>Brunei </option>
                          <option value='Bulgarie'>Bulgarie </option>
                          <option value='Burkina_Faso'>Burkina Faso </option>
                          <option value='Burundi'>Burundi </option>
                          <option value='Cambodge'>Cambodge </option>
                          <option value='Cameroun'>Cameroun </option>
                          <option value='Cap_Vert'>Cap-Vert </option>
                          <option value='Cayman_Iles'>Cayman (Iles) </option>
                          <option value='Centrafricaine_Rep'>Centrafricaine (Rep.) </option>
                          <option value='Chili'>Chili </option>
                          <option value='Chine'>Chine </option>
                          <option value='Chypre'>Chypre </option>
                          <option value='Chypre'>Chypre </option>
                          <option value='Comores'>Comores </option>
                          <option value='Congo'>Congo </option>
                          <option value='Congo_Zaïre_Rep_Dem'>Congo Zaïre (Rep. Dem.) </option>
                          <option value='Cook_Iles'>Cook (Iles) </option>
                          <option value='Cor&eacute;e_Rep_de'>Cor&eacute;e (Rep. de) </option>
                          <option value='Cor&eacute;e_Rep_Dem_Pop'>Cor&eacute;e (Rep. Dem. Pop.) </option>
                          <option value='Costa_Rica'>Costa Rica </option>
                          <option value='Côte_Ivoire'>Côte d'Ivoire </option>
                          <option value='Croatie'>Croatie </option>
                          <option value='Cuba'>Cuba </option>
                          <option value='Djibouti'>Djibouti </option>
                          <option value='Dominicaine_Rep'>Dominicaine (Rep.) </option>
                          <option value='Dominique'>Dominique </option>
                          <option value='Egypte'>Egypte </option>
                          <option value='El_Salvador'>El Salvador </option>
                          <option value='Emirats_Arabes_Unis'>Emirats Arabes Unis </option>
                          <option value='Equateur'>Equateur </option>
                          <option value='Erythr&eacute;e'>Erythr&eacute;e </option>
                          <option value='Estonie'>Estonie </option>
                          <option value='Ethiopie'>Ethiopie </option>
                          <option value='Falkland_Iles'>Falkland (Iles) </option>
                          <option value='Feroë_Iles'>Feroë (Iles) </option>
                          <option value='Fidji'>Fidji </option>
                          <option value='Finlande'>Finlande </option>
                          <option value='Gabon'>Gabon </option>
                          <option value='Gambie'>Gambie </option>
                          <option value='G&eacute;orgie'>G&eacute;orgie </option>
                          <option value='Ghana'>Ghana </option>
                          <option value='Gibraltar'>Gibraltar </option>
                          <option value='Grêce'>Grêce </option>
                          <option value='Grenade'>Grenade </option>
                          <option value='Groënland'>Groënland </option>
                          <option value='Guadeloupe'>Guadeloupe </option>
                          <option value='Guam'>Guam </option>
                          <option value='Guatemala'>Guatemala </option>
                          <option value='Guin&eacute;e'>Guin&eacute;e </option>
                          <option value='Guin&eacute;e_Equatoriale'>Guin&eacute;e Equatoriale </option>
                          <option value='Guin&eacute;e_Française'>Guin&eacute;e Française </option>
                          <option value='Guin&eacute;e_Bissau'>Guin&eacute;e-Bissau </option>
                          <option value='Guyana'>Guyana </option>
                          <option value='Haïti'>Haïti </option>
                          <option value='Hawaï'>Hawaï </option>
                          <option value='Honduras'>Honduras </option>
                          <option value='Hong_Kong'>Hong-Kong </option>
                          <option value='Hongrie'>Hongrie </option>
                          <option value='Inde'>Inde </option>
                          <option value='Indon&eacute;sie'>Indon&eacute;sie </option>
                          <option value='Irak'>Irak </option>
                          <option value='Iran_Rep_Isl'>Iran (Rep. Isl.) </option>
                          <option value='Irlande'>Irlande </option>
                          <option value='Islande'>Islande </option>
                        
                          <option value='Jamaïque'>Jamaïque </option>
                          <option value='Jersey_Ile'>Jersey (Ile) </option>
                          <option value='Jordanie'>Jordanie </option>
                          <option value='Kazakhstan'>Kazakhstan </option>
                          <option value='Kenya'>Kenya </option>
                          <option value='Kirghizistan'>Kirghizistan </option>
                          <option value='Kiribati'>Kiribati </option>
                          <option value='Koweït'>Koweït </option>
                          <option value='Laos_Rep_Dem_Pop'>Laos (Rep. Dem. Pop. du) </option>
                          <option value='Lesotho'>Lesotho </option>
                          <option value='Lettonie'>Lettonie </option>
                          <option value='Liban'>Liban </option>
                          <option value='Liberia'>Liberia </option>
                          <option value='Libye'>Libye </option>
                          <option value='Liechtenstein'>Liechtenstein </option>
                          <option value='Lituanie'>Lituanie </option>
                          <option value='Luxembourg'>Luxembourg </option>
                          <option value='Macao'>Macao </option>
                          <option value='Mac&eacute;doine'>Mac&eacute;doine </option>
                          <option value='Madagascar'>Madagascar </option>
                          <option value='Malaisie'>Malaisie </option>
                          <option value='Malawi'>Malawi </option>
                          <option value='Maldives'>Maldives </option>
                          <option value='Mali'>Mali </option>
                          <option value='Malte'>Malte </option>
                          <option value='Mariannes_Iles'>Mariannes (Iles) </option>
                          <option value='Maroc'>Maroc </option>
                          <option value='Marshall_Iles'>Marshall (Iles) </option>
                          <option value='Martinique'>Martinique </option>
                          <option value='Maurice'>Maurice </option>
                          <option value='Mauritanie'>Mauritanie </option>
                          <option value='Mexique'>Mexique </option>
                          <option value='Micron&eacute;sie'>Micron&eacute;sie </option>
                          <option value='Moldovie'>Moldovie </option>
                          <option value='Monaco'>Monaco </option>
                          <option value='Mongolie'>Mongolie </option>
                          <option value='Montserrat'>Montserrat </option>
                          <option value='Mozambique'>Mozambique </option>
                          <option value='Myanmar'>Myanmar </option>
                          <option value='Namibie'>Namibie </option>
                          <option value='Nauru'>Nauru </option>
                          <option value='N&eacute;pal'>N&eacute;pal </option>
                          <option value='Nicaragua'>Nicaragua </option>
                          <option value='Niger'>Niger </option>
                          <option value='Nigeria'>Nigeria </option>
                          <option value='Niue'>Niue </option>
                          <option value='Norfolk_Ile'>Norfolk (Ile) </option>
                          <option value='Norvège'>Norvège </option>
                          <option value='Nouvelle_Cal&eacute;donie'>Nouvelle Cal&eacute;donie </option>
                          <option value='Nouvelle_Z&eacute;lande'>Nouvelle-Z&eacute;lande </option>
                          <option value='Oman'>Oman </option>
                          <option value='Ouganda'>Ouganda </option>
                          <option value='Ouzbekistan'>Ouzbekistan </option>
                          <option value='Pakistan'>Pakistan </option>
                          <option value='Palau'>Palau </option>
                          <option value='Palestine'>Palestine </option>
                          <option value='Panama'>Panama </option>
                          <option value='Papouasie_Nouvelle_Guin&eacute;e'>Papouasie-Nouvelle-Guin&eacute;e </option>
                          <option value='Paraguay'>Paraguay </option>
                          <option value='P&eacute;rou'>P&eacute;rou </option>
                          <option value='Philippines'>Philippines </option>
                          <option value='Pologne'>Pologne </option>
                          <option value='Polynesie_Francaise'>Polynesie Francaise </option>
                          <option value='Porto_Rico'>Porto Rico </option>
                          <option value='Portugal'>Portugal </option>
                          <option value='Qatar'>Qatar </option>
                          <option value='R&eacute;union'>R&eacute;union </option>
                          <option value='Roumanie'>Roumanie </option>
                          <option value='Russie'>Russie </option>
                          <option value='Rwanda'>Rwanda </option>
                          <option value='Saint_Kitts_et_Nevis'>Saint-Kitts-et-Nevis </option>
                          <option value='Saint_Marin'>Saint-Marin </option>
                          <option value='Saint_Vincent_et_Grenadines'>Saint-Vincent-et-Grenadines </option>
                          <option value='Sainte_H&eacute;lène'>Sainte-H&eacute;lène </option>
                          <option value='Sainte_Lucie'>Sainte-Lucie </option>
                          <option value='Salomon'>Salomon </option>
                          <option value='Samoa_Am&eacute;ricaines '>Samoa Am&eacute;ricaines </option>
                          <option value='Samoa_Occidental'>Samoa-Occidental </option>
                          <option value='Sao_Tome_et_Principe'>Sao Tome-et-Principe </option>
                          <option value='S&eacute;n&eacute;gal'>S&eacute;n&eacute;gal </option>
                          <option value='Seychelles'>Seychelles </option>
                          <option value='Sierra_Leone'>Sierra Leone </option>
                          <option value='Singapour'>Singapour </option>
                          <option value='Slovaque_Rep'>Slovaque (Rep.) </option>
                          <option value='Slov&eacute;nie'>Slov&eacute;nie </option>
                          <option value='Somalie'>Somalie </option>
                          <option value='Soudan'>Soudan </option>
                          <option value='Sri_Lanka'>Sri Lanka </option>
                          <option value='Surinam'>Surinam </option>
                          <option value='Swaziland'>Swaziland </option>
                          <option value='Syrie'>Syrie </option>
                          <option value='Tadjikistan_Rep_du'>Tadjikistan (Rep. du) </option>
                          <option value='Taïwan'>Taïwan </option>
                          <option value='Tanzanie'>Tanzanie </option>
                          <option value='Tchad'>Tchad </option>
                          <option value='Tchèque_Rep'>Tchèque (Rep.) </option>
                          <option value='Thaïlande'>Thaïlande </option>
                          <option value='Timor_Oriental'>Timor Oriental </option>
                          <option value='Togo'>Togo </option>
                          <option value='Tokelau'>Tokelau </option>
                          <option value='Tonga'>Tonga </option>
                          <option value='Trinit&eacute;_et_Tobago'>Trinit&eacute;-et-Tobago </option>
                          <option value='Turkmenistan'>Turkmenistan </option>
                          <option value='Turks_et_Caïcos_Iles'>Turks et Caïcos (Iles) </option>
                          <option value='Turquie'>Turquie </option>
                          <option value='Tuvalu'>Tuvalu </option>
                          <option value='Ukraine'>Ukraine </option>
                          <option value='Uruguay'>Uruguay </option>
                          <option value='Vanuatu'>Vanuatu </option>
                          <option value='Venezuela'>Venezuela </option>
                          <option value='Vierges_Am&eacute;ricaines_Iles'>Vierges Am&eacute;ricaines (Iles) </option>
                          <option value='Vierges_Britanniques_Iles'>Vierges Britanniques (Iles) </option>
                          <option value='Vietnam'>Vietnam </option>
                          <option value='Y&eacute;men_Rep'>Y&eacute;men (Rep.) </option>
                          <option value='Yougoslavie_Rep_Fed_de'>Yougoslavie (Rep. Fed. de) </option>
                          <option value='Zambie'>Zambie </option>
                          <option value='Zimbabwe'>Zimbabwe </option>
                          </select>


</td><td><label>Aller à </label></td><td><select name="destination" id="destination"  class="tb-input">
                           <option value='' selected >selectionner un pays </option>
                           <option value='Tunisie'>Tunisie </option>
                           
                          <option value='Allemagne'>Allemagne </option>
                          <option value='Australie'>Australie </option>
                          <option value='Belgique'>Belgique </option>
                          <option value='Canada'>Canada </option>
                          <option value='Danemark'>Danemark </option>
                          <option value='Espagne'>Espagne </option>
                          <option value='USA'>Etats-Unis d'Amerique </option>
                          <option value='France'>France </option>
                          <option value='Italie'>Italie </option>
                          <option value='Japon'>Japon </option>
                          <option value='Pays_Bas '>Pays-Bas </option>
                          <option value='Royaume_Uni'>Royaume-Uni </option>
                          <option value='Suède'>Suède </option>
                          <option value='Suisse'>Suisse </option>
                          <option value='Afghanistan'>Afghanistan </option>
                          <option value='Afrique_du_Sud '>Afrique du Sud </option>
                          <option value='Albanie'>Albanie </option>
                          <option value='Alg&eacute;rie'>Alg&eacute;rie </option>
                          <option value='Andorre'>Andorre </option>
                          <option value='Angola'>Angola </option>
                          <option value='Anguilla'>Anguilla </option>
                          <option value='Antarctique'>Antarctique </option>
                          <option value='Antigua_et_Barbuda '>Antigua et Barbuda </option>
                          <option value='Antilles_N&eacute;erlandaises'>Antilles N&eacute;erlandaises </option>
                          <option value='Arabie_Saoudite'>Arabie Saoudite </option>
                          <option value='Argentine'>Argentine </option>
                          <option value='Arm&eacute;nie'>Arm&eacute;nie </option>
                          <option value='Aruba'>Aruba </option>
                          <option value='Ascension'>Ascension </option>
                          <option value='Autriche'>Autriche </option>
                          <option value='Azerbaidjan'>Azerbaidjan </option>
                          <option value='Bahamas'>Bahamas </option>
                          <option value='Bahrein'>Bahrein </option>
                          <option value='Bangladesh'>Bangladesh </option>
                          <option value='Barbade'>Barbade </option>
                          <option value='Belarus'>Belarus </option>
                          <option value='Belize'>Belize </option>
                          <option value='B&eacute;nin'>B&eacute;nin </option>
                          <option value='Bermudes'>Bermudes </option>
                          <option value='Bhoutan'>Bhoutan </option>
                          <option value='Bolivie'>Bolivie </option>
                          <option value='Bosnie_Herz&eacute;govine'>Bosnie-Herz&eacute;govine </option>
                          <option value='Botswana'>Botswana </option>
                          <option value='Br&eacute;sil'>Br&eacute;sil </option>
                          <option value='Brunei'>Brunei </option>
                          <option value='Bulgarie'>Bulgarie </option>
                          <option value='Burkina_Faso'>Burkina Faso </option>
                          <option value='Burundi'>Burundi </option>
                          <option value='Cambodge'>Cambodge </option>
                          <option value='Cameroun'>Cameroun </option>
                          <option value='Cap_Vert'>Cap-Vert </option>
                          <option value='Cayman_Iles'>Cayman (Iles) </option>
                          <option value='Centrafricaine_Rep'>Centrafricaine (Rep.) </option>
                          <option value='Chili'>Chili </option>
                          <option value='Chine'>Chine </option>
                          <option value='Chypre'>Chypre </option>
                          <option value='Chypre'>Chypre </option>
                          <option value='Comores'>Comores </option>
                          <option value='Congo'>Congo </option>
                          <option value='Congo_Zaïre_Rep_Dem'>Congo Zaïre (Rep. Dem.) </option>
                          <option value='Cook_Iles'>Cook (Iles) </option>
                          <option value='Cor&eacute;e_Rep_de'>Cor&eacute;e (Rep. de) </option>
                          <option value='Cor&eacute;e_Rep_Dem_Pop'>Cor&eacute;e (Rep. Dem. Pop.) </option>
                          <option value='Costa_Rica'>Costa Rica </option>
                          <option value='Côte_Ivoire'>Côte d'Ivoire </option>
                          <option value='Croatie'>Croatie </option>
                          <option value='Cuba'>Cuba </option>
                          <option value='Djibouti'>Djibouti </option>
                          <option value='Dominicaine_Rep'>Dominicaine (Rep.) </option>
                          <option value='Dominique'>Dominique </option>
                          <option value='Egypte'>Egypte </option>
                          <option value='El_Salvador'>El Salvador </option>
                          <option value='Emirats_Arabes_Unis'>Emirats Arabes Unis </option>
                          <option value='Equateur'>Equateur </option>
                          <option value='Erythr&eacute;e'>Erythr&eacute;e </option>
                          <option value='Estonie'>Estonie </option>
                          <option value='Ethiopie'>Ethiopie </option>
                          <option value='Falkland_Iles'>Falkland (Iles) </option>
                          <option value='Feroë_Iles'>Feroë (Iles) </option>
                          <option value='Fidji'>Fidji </option>
                          <option value='Finlande'>Finlande </option>
                          <option value='Gabon'>Gabon </option>
                          <option value='Gambie'>Gambie </option>
                          <option value='G&eacute;orgie'>G&eacute;orgie </option>
                          <option value='Ghana'>Ghana </option>
                          <option value='Gibraltar'>Gibraltar </option>
                          <option value='Grêce'>Grêce </option>
                          <option value='Grenade'>Grenade </option>
                          <option value='Groënland'>Groënland </option>
                          <option value='Guadeloupe'>Guadeloupe </option>
                          <option value='Guam'>Guam </option>
                          <option value='Guatemala'>Guatemala </option>
                          <option value='Guin&eacute;e'>Guin&eacute;e </option>
                          <option value='Guin&eacute;e_Equatoriale'>Guin&eacute;e Equatoriale </option>
                          <option value='Guin&eacute;e_Française'>Guin&eacute;e Française </option>
                          <option value='Guin&eacute;e_Bissau'>Guin&eacute;e-Bissau </option>
                          <option value='Guyana'>Guyana </option>
                          <option value='Haïti'>Haïti </option>
                          <option value='Hawaï'>Hawaï </option>
                          <option value='Honduras'>Honduras </option>
                          <option value='Hong_Kong'>Hong-Kong </option>
                          <option value='Hongrie'>Hongrie </option>
                          <option value='Inde'>Inde </option>
                          <option value='Indon&eacute;sie'>Indon&eacute;sie </option>
                          <option value='Irak'>Irak </option>
                          <option value='Iran_Rep_Isl'>Iran (Rep. Isl.) </option>
                          <option value='Irlande'>Irlande </option>
                          <option value='Islande'>Islande </option>
                        
                          <option value='Jamaïque'>Jamaïque </option>
                          <option value='Jersey_Ile'>Jersey (Ile) </option>
                          <option value='Jordanie'>Jordanie </option>
                          <option value='Kazakhstan'>Kazakhstan </option>
                          <option value='Kenya'>Kenya </option>
                          <option value='Kirghizistan'>Kirghizistan </option>
                          <option value='Kiribati'>Kiribati </option>
                          <option value='Koweït'>Koweït </option>
                          <option value='Laos_Rep_Dem_Pop'>Laos (Rep. Dem. Pop. du) </option>
                          <option value='Lesotho'>Lesotho </option>
                          <option value='Lettonie'>Lettonie </option>
                          <option value='Liban'>Liban </option>
                          <option value='Liberia'>Liberia </option>
                          <option value='Libye'>Libye </option>
                          <option value='Liechtenstein'>Liechtenstein </option>
                          <option value='Lituanie'>Lituanie </option>

                          <option value='Luxembourg'>Luxembourg </option>
                          <option value='Macao'>Macao </option>
                          <option value='Mac&eacute;doine'>Mac&eacute;doine </option>
                          <option value='Madagascar'>Madagascar </option>
                          <option value='Malaisie'>Malaisie </option>
                          <option value='Malawi'>Malawi </option>
                          <option value='Maldives'>Maldives </option>
                          <option value='Mali'>Mali </option>
                          <option value='Malte'>Malte </option>
                          <option value='Mariannes_Iles'>Mariannes (Iles) </option>
                          <option value='Maroc'>Maroc </option>
                          <option value='Marshall_Iles'>Marshall (Iles) </option>
                          <option value='Martinique'>Martinique </option>
                          <option value='Maurice'>Maurice </option>
                          <option value='Mauritanie'>Mauritanie </option>
                          <option value='Mexique'>Mexique </option>
                          <option value='Micron&eacute;sie'>Micron&eacute;sie </option>
                          <option value='Moldovie'>Moldovie </option>
                          <option value='Monaco'>Monaco </option>
                          <option value='Mongolie'>Mongolie </option>
                          <option value='Montserrat'>Montserrat </option>
                          <option value='Mozambique'>Mozambique </option>
                          <option value='Myanmar'>Myanmar </option>
                          <option value='Namibie'>Namibie </option>
                          <option value='Nauru'>Nauru </option>
                          <option value='N&eacute;pal'>N&eacute;pal </option>
                          <option value='Nicaragua'>Nicaragua </option>
                          <option value='Niger'>Niger </option>
                          <option value='Nigeria'>Nigeria </option>
                          <option value='Niue'>Niue </option>
                          <option value='Norfolk_Ile'>Norfolk (Ile) </option>
                          <option value='Norvège'>Norvège </option>
                          <option value='Nouvelle_Cal&eacute;donie'>Nouvelle Cal&eacute;donie </option>
                          <option value='Nouvelle_Z&eacute;lande'>Nouvelle-Z&eacute;lande </option>
                          <option value='Oman'>Oman </option>
                          <option value='Ouganda'>Ouganda </option>
                          <option value='Ouzbekistan'>Ouzbekistan </option>
                          <option value='Pakistan'>Pakistan </option>
                          <option value='Palau'>Palau </option>
                          <option value='Palestine'>Palestine </option>
                          <option value='Panama'>Panama </option>
                          <option value='Papouasie_Nouvelle_Guin&eacute;e'>Papouasie-Nouvelle-Guin&eacute;e </option>
                          <option value='Paraguay'>Paraguay </option>
                          <option value='P&eacute;rou'>P&eacute;rou </option>
                          <option value='Philippines'>Philippines </option>
                          <option value='Pologne'>Pologne </option>
                          <option value='Polynesie_Francaise'>Polynesie Francaise </option>
                          <option value='Porto_Rico'>Porto Rico </option>
                          <option value='Portugal'>Portugal </option>
                          <option value='Qatar'>Qatar </option>
                          <option value='R&eacute;union'>R&eacute;union </option>
                          <option value='Roumanie'>Roumanie </option>
                          <option value='Russie'>Russie </option>
                          <option value='Rwanda'>Rwanda </option>
                          <option value='Saint_Kitts_et_Nevis'>Saint-Kitts-et-Nevis </option>
                          <option value='Saint_Marin'>Saint-Marin </option>
                          <option value='Saint_Vincent_et_Grenadines'>Saint-Vincent-et-Grenadines </option>
                          <option value='Sainte_H&eacute;lène'>Sainte-H&eacute;lène </option>
                          <option value='Sainte_Lucie'>Sainte-Lucie </option>
                          <option value='Salomon'>Salomon </option>
                          <option value='Samoa_Am&eacute;ricaines '>Samoa Am&eacute;ricaines </option>
                          <option value='Samoa_Occidental'>Samoa-Occidental </option>
                          <option value='Sao_Tome_et_Principe'>Sao Tome-et-Principe </option>
                          <option value='S&eacute;n&eacute;gal'>S&eacute;n&eacute;gal </option>
                          <option value='Seychelles'>Seychelles </option>
                          <option value='Sierra_Leone'>Sierra Leone </option>
                          <option value='Singapour'>Singapour </option>
                          <option value='Slovaque_Rep'>Slovaque (Rep.) </option>
                          <option value='Slov&eacute;nie'>Slov&eacute;nie </option>
                          <option value='Somalie'>Somalie </option>
                          <option value='Soudan'>Soudan </option>
                          <option value='Sri_Lanka'>Sri Lanka </option>
                          <option value='Surinam'>Surinam </option>
                          <option value='Swaziland'>Swaziland </option>
                          <option value='Syrie'>Syrie </option>
                          <option value='Tadjikistan_Rep_du'>Tadjikistan (Rep. du) </option>
                          <option value='Taïwan'>Taïwan </option>
                          <option value='Tanzanie'>Tanzanie </option>
                          <option value='Tchad'>Tchad </option>
                          <option value='Tchèque_Rep'>Tchèque (Rep.) </option>
                          <option value='Thaïlande'>Thaïlande </option>
                          <option value='Timor_Oriental'>Timor Oriental </option>
                          <option value='Togo'>Togo </option>
                          <option value='Tokelau'>Tokelau </option>
                          <option value='Tonga'>Tonga </option>
                          <option value='Trinit&eacute;_et_Tobago'>Trinit&eacute;-et-Tobago </option>
                          
                          <option value='Turkmenistan'>Turkmenistan </option>
                          <option value='Turks_et_Caïcos_Iles'>Turks et Caïcos (Iles) </option>
                          <option value='Turquie'>Turquie </option>
                          <option value='Tuvalu'>Tuvalu </option>
                          <option value='Ukraine'>Ukraine </option>
                          <option value='Uruguay'>Uruguay </option>
                          <option value='Vanuatu'>Vanuatu </option>
                          <option value='Venezuela'>Venezuela </option>
                          <option value='Vierges_Am&eacute;ricaines_Iles'>Vierges Am&eacute;ricaines (Iles) </option>
                          <option value='Vierges_Britanniques_Iles'>Vierges Britanniques (Iles) </option>
                          <option value='Vietnam'>Vietnam </option>
                          <option value='Y&eacute;men_Rep'>Y&eacute;men (Rep.) </option>
                          <option value='Yougoslavie_Rep_Fed_de'>Yougoslavie (Rep. Fed. de) </option>
                          <option value='Zambie'>Zambie </option>
                          <option value='Zimbabwe'>Zimbabwe </option>
                          </select></td></tr>
<tr><td><label>Date de départ </label></td><td><input name="datedepart" id="datedepart" type="text" class="input-text full-width datepicker" placeholder="jj/mm/aaaa" value="<?php if(isset($_GET['datedepart'])  ) echo $_GET['datedepart'];?>"/></td><td><label id="titreaff" style="display:none">Date d'arriver</label></td><td><div  id="dateaff" class="form-group row"  style="display:none">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input name="datearriver" id="datearriver" type="text" class="input-text full-width" placeholder="jj/mm/aaaa"  value="<?php if(isset($_GET['dateretour'])  ) echo $_GET['dateretour'];?>"/>
                                                </div>
                                            </div>
                                            
                                        </div></td></tr>
<tr><td><label>Horraire de départ </label></td><td><select  name="modedepart" id="modedepart" class="input-text full-width">
                                                        <option value="&agrave; tout moment">à tout moment</option>
                                                        <option value="Matin">Matin</option>
                                                    </select></td><td><label id="titreaff2" style="display:none">Horraire d'arrivé</label></td><td><div class="col-xs-6" id="modeaff"  style="display:none">
                                                <div class="selector">
                                                    <select  name="modearriver" id="modearriver" class="input-text full-width">
                                                                                                             <option value="&agrave; tout moment">à tout moment</option>
                                                        <option value="Matin">Matin</option>

                                                    </select>
                                                </div>
                                            </div></td></tr>
                                            </table>
                          
                                <div class="row">
                                    
                                    
                                    
                                    
                                    <div class="col-md-6">
                                      
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Adultes</label>
                                                <div class="selector">
                                                    <select name="adulte"  id="adulte" class="full-width">
                                 <option <?php if(isset($_GET['adultes']) && $_GET['adultes']==0) echo ' selected ';?> value="0">00</option>
                                 <option <?php if(isset($_GET['adultes']) && $_GET['adultes']==1) echo ' selected ';?> value="1">01</option>
                                 <option <?php if(isset($_GET['adultes']) && $_GET['adultes']==2) echo ' selected ';?> value="2">02</option>
                                 <option <?php if(isset($_GET['adultes']) && $_GET['adultes']==3) echo ' selected ';?> value="3">03</option>
                                 <option <?php if(isset($_GET['adultes']) && $_GET['adultes']==4) echo ' selected ';?> value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <label>Enfants</label>
                                                <div class="selector">
                                                    <select  name="enfants" id="enfants" class="full-width">
                                 <option <?php if(isset($_GET['enfants']) && $_GET['enfants']==0) echo ' selected ';?>value="0">00</option>
                                 <option <?php if(isset($_GET['enfants']) && $_GET['enfants']==1) echo ' selected ';?> value="1">01</option>
                                 <option <?php if(isset($_GET['enfants']) && $_GET['enfants']==2) echo ' selected ';?>value="2">02</option>
                                 <option <?php if(isset($_GET['enfants']) && $_GET['enfants']==3) echo ' selected ';?>value="3">03</option>
                                 <option <?php if(isset($_GET['enfants']) && $_GET['enfants']==4) echo ' selected ';?>value="4">04</option>
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                
                    
                    <?php if(empty($_SESSION['id_connect'])){
						
						  ?> 
										<input type="button" onClick="javascript: message('vous devez connecter!')"  value="Etape suivante">

                      
                     
                      
					  <?php }else{?>
						  
				<button name="suivant"class="full-width icon-check">Etape suivante</button>
                      
                     
					
					   
					   
					<?php   }
					   
					   
					   
					   ?>    
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                       		 </div>
                        
                        <?php }?>
    <?php if(isset($_POST['suivant'])&& !empty($_GET['etape']) && $_GET['etape']==2  ){
		
		if(isset($_POST['depart'])){$depart=$_POST['depart'];} else $depart="";
		if(isset($_POST['destination'])){$destination=$_POST['destination'];} else $destination="";
		if(isset($_POST['modedepart'])){$modedepart=$_POST['modedepart'];} else $modedepart="";
		if(isset($_POST['datedepart'])){$datedepart=$_POST['datedepart'];} else $datedepart="";
		if(isset($_POST['datearriver'])){$datearriver=$_POST['datearriver'];} else $datearriver="";
		if(isset($_POST['modearriver'])){$modearriver=$_POST['modearriver'];} else $modearriver="";
		if(isset($_POST['adulte'])){$adulte=$_POST['adulte'];} else $adulte=0;
		if(isset($_POST['enfants'])){$enfants=$_POST['enfants'];} else $enfants=0;
		
		
		?>
                         
                            
        <div class="flights-tab">
                            <form action="vols.html?etape=3" method="post" >
                            
 <input type="hidden" name="depart2" value="<?php echo $depart;?>">                   
         <input type="hidden" name="destination2" value="<?php echo $destination;?>">                   
         <input type="hidden" name="datedepart2" value="<?php echo $datedepart;?>">                   
         <input type="hidden" name="modedepart2" value="<?php echo $modedepart;?>">                   
         <input type="hidden" name="datearriver2" value="<?php echo $datearriver;?>">                   
         <input type="hidden" name="modearriver2" value="<?php echo $modearriver;?>">                   
         <input type="hidden" name="adulte2" value="<?php echo $adulte;?>">                   
         <input type="hidden" name="enfants2" value="<?php echo $enfants;?>">  
                   
                   
                       <?php if($adulte>0){?>
     <h2>Les adultes</h2>
                                <table align="center" width="100%"  class='table table-bordered'  >
	<tr>
	<td   class="cont-tab"><strong>Nom et Pr&eacute;nom </strong></td>
   
	<td   class="cont-tab"><strong>Date de naissance </strong></td>
	<td   class="cont-tab"><strong>Numero de passeport </strong>
	   </td>
    </tr>
     
	<?php
for($i=1;$i<=$adulte;$i++)
{
	$checked="";
	if($i==1) $checked="checked";?>
	<tr>
	<td   >  <div class="form-group">
      <input type="text" class="input-text full-width" name="personne_<?php echo $i;?>" id="personne_<?php echo $i;?>" size="20"  required='' aria-invalid='false'  /> </div></td>
	<td  >
             <div class="selector" style="width:40px; float:left;"><select name="age_jour<?php echo $i;?>" class='input-small'>
            <?php for($j=1; $j<=31; $j++) {
        echo '<option value="'.sprintf("%02d",   $j).'">'.sprintf("%02d",   $j).'</option>';
}
?>
          </select></div>
         <div class="selector" style="width:40px; float:left;">  <select name="age_mois<?php echo $i;?>" class='input-small'>
            <?php for($j=1; $j<=12; $j++) {
        echo '<option value="'.sprintf("%02d",   $j).'">'.sprintf("%02d",   $j).'</option>';
}
?>
          </select></div>
          <div class="selector" style="width:80px; float:left;"> <select name="age_annee<?php echo $i;?>" class='input-small'>
            <?php for($j=1930; $j<=intval(date('Y')); $j++) {
		$select="";
		if ($j==1987) $select=" selected ";
        echo '<option value="'.$j.'"'.$select.'>'.$j.'</option>';
}
?>
          </select></div>
     </td>
<td  >  <div class="form-group">
      <input type="text"  class="input-text full-width"  name="passeport_<?php echo $i;?>" id="passport_<?php echo $i;?>" size="20"   required='' aria-invalid='false' /> </div> </td>
	</tr>
	 
  <?php
	}	
	?>	
	</table>
    <?php }?>
    <?php if($enfants>0){?>
     <h2> Les enfants</h2>
                                <table align="center" width="100%"  class='table table-bordered'  >
	<tr>
	<td   class="cont-tab"><strong>Nom et Pr&eacute;nom </strong></td>
   
	<td   class="cont-tab"><strong>Date de naissance </strong></td>
	<td   class="cont-tab"><strong>Numero de passport </strong>
	   </td>
    </tr>
     
	<?php
for($i=1;$i<=$enfants;$i++)
{
	$checked="";
	if($i==1) $checked="checked";?>
	<tr>
	<td   >  <div class="form-group">
      <input type="text" class="input-text full-width" name="personne_enfant_<?php echo $i;?>" id="personne_enfant_<?php echo $i;?>" size="20"  required='' aria-invalid='false'  /> </div></td>
	<td  >
             <div class="selector" style="width:40px; float:left;"><select name="age_jour_enfant_<?php echo $i;?>" class='input-small'>
            <?php for($j=1; $j<=31; $j++) {
        echo '<option value="'.sprintf("%02d",   $j).'">'.sprintf("%02d",   $j).'</option>';
}
?>
          </select></div>
         <div class="selector" style="width:40px; float:left;">  <select name="age_mois_enfant_<?php echo $i;?>" class='input-small'>
            <?php for($j=1; $j<=12; $j++) {
        echo '<option value="'.sprintf("%02d",   $j).'">'.sprintf("%02d",   $j).'</option>';
}
?>
          </select></div>
          <div class="selector" style="width:80px; float:left;"> <select name="age_annee_enfant_<?php echo $i;?>" class='input-small'>
            <?php for($j=1930; $j<=intval(date('Y')); $j++) {
		$select="";
		if ($j==1987) $select=" selected ";
        echo '<option value="'.$j.'"'.$select.'>'.$j.'</option>';
}
?>
          </select></div>
     </td>
<td  >  <div class="form-group">
      <input type="text"  class="input-text full-width"  name="passeport_enfant_<?php echo $i;?>" id="passeport_enfant_<?php echo $i;?>" size="20"   required='' aria-invalid='false' /> </div> </td>
	</tr>
	 
  <?php
	}	
	?>	
	</table>
    <?php }?>
    
    <div class="form-group row">
                                            
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button name="suivant2"class="full-width icon-check">Etape suivante</button>
                                            </div>
                                        </div>

                            </form>
                        </div>
                        
                        <?php }?> 
                        
                        
    <?php if(isset($_POST['suivant2'])&& !empty($_GET['etape']) && $_GET['etape']==3 ){

		if(isset($_POST['depart2'])){$depart=$_POST['depart2'];} else $depart="";
		if(isset($_POST['destination2'])){$destination=$_POST['destination2'];} else $destination="";
		if(isset($_POST['modedepart2'])){$modedepart=$_POST['modedepart2'];} else $modedepart="";
		if(isset($_POST['datedepart2'])){$datedepart=$_POST['datedepart2'];} else $datedepart="";
		if(isset($_POST['datearriver2'])){$datearriver=$_POST['datearriver2'];} else $datearriver="";
		if(isset($_POST['modearriver2'])){$modearriver=$_POST['modearriver2'];} else $modearriver="";
		if(isset($_POST['adulte2'])){$adulte=$_POST['adulte2'];} else $adulte=0;
		if(isset($_POST['enfants2'])){$enfants=$_POST['enfants2'];} else $enfants=0;
		
		
		?>
        
                         
                            
                           <div class="flights-tab">
                            <form action="enregistrer_billetterie.php" method="post">
                            
 <input type="hidden" name="depart3" value="<?php echo $depart;?>">                   
         <input type="hidden" name="destination3" value="<?php echo $destination;?>">                   
         <input type="hidden" name="datedepart3" value="<?php echo $datedepart;?>">                   
         <input type="hidden" name="modedepart3" value="<?php echo $modedepart;?>">                   
         <input type="hidden" name="datearriver3" value="<?php echo $datearriver;?>">                   
         <input type="hidden" name="modearriver3" value="<?php echo $modearriver;?>">                   
         <input type="hidden" name="adulte3" value="<?php echo $adulte;?>">                   
         <input type="hidden" name="enfants3" value="<?php echo $enfants;?>">  
         

                      
     
	<?php
for($i=1;$i<=$adulte;$i++)
{?>
	
      <input type="hidden"  name="personne_<?php echo $i;?>"  value="<?php echo $_POST['personne_'.$i];?>"  /> 
      <input type="hidden" name="age_jour_<?php echo $i;?>"  value="<?php echo $_POST['age_jour'.$i];?>" /> 
      <input type="hidden" name="age_mois_<?php echo $i;?>"  value="<?php echo $_POST['age_mois'.$i];?>" /> 
      <input type="hidden" name="age_annee_<?php echo $i;?>"  value="<?php echo $_POST['age_annee'.$i];?>" /> 
      <input type="hidden" name="passeport_<?php echo $i;?>"  value="<?php echo $_POST['passeport_'.$i];?>" /> 
<?php }	?>	
	<?php
for($i=1;$i<=$enfants;$i++)
{?>
	
      <input type="hidden"  name="personne_enfant_<?php echo $i;?>"  value="<?php echo $_POST['personne_enfant_'.$i];?>"   /> 
      <input type="hidden" name="age_jour_enfant_<?php echo $i;?>"  value="<?php echo $_POST['age_jour_enfant_'.$i];?>" /> 
      <input type="hidden" name="age_mois_enfant_<?php echo $i;?>"  value="<?php echo $_POST['age_mois_enfant_'.$i];?>" /> 
      <input type="hidden" name="age_annee_enfant_<?php echo $i;?>"  value="<?php echo $_POST['age_annee_enfant_'.$i];?>" /> 
      <input type="hidden" name="passeport_enfant_<?php echo $i;?>"  value="<?php echo $_POST['passeport_enfant_'.$i];?>" /> 
<?php }	?>	    
    
     
     <h1>Détails de votre demande</h1>
     <table>
     <tr><td>Date de départ le <strong><?php echo $datedepart;?></strong> <strong> <?php echo $modedepart;?></strong></de  ><strong> <?php echo $depart;?></strong> à  <strong><?php echo $destination;?></strong></td> </tr>
   <?php if($datearriver!=""){?>  
          <tr><td>Date de retour le <strong> <?php echo  $datearriver;?></strong> <strong><?php echo $modearriver;?></strong>de  <strong><?php echo $destination;?></strong> à  <strong><?php echo $depart;?></strong></td> </tr>
          
          <?php }?>
</table>
<h1>Liste des personnes</h1>

                       <?php if($adulte>0){?>

<h2>Adultes</h2>
<table style="font-size:14px; width:100%;">
<tr><td> <strong>Nom et prenom</strong> </td><td> <strong>Date de naissance</strong></td><td> <strong>Num passeport</strong></td></tr>
<?php for($i=1;$i<=$adulte;$i++)
{?>
	<tr>
    <td><?php echo $_POST['personne_'.$i];?></td>
    <td><?php echo $_POST['age_jour'.$i]."/".$_POST['age_mois'.$i]."/".$_POST['age_annee'.$i];?></td>
    <td><?php echo $_POST['passeport_'.$i];?></td>
   </tr>
<?php }	?>	
</table>
<?php }?>
                       <?php if($enfants>0){?>

<h2>Enfants</h2>
<table style="font-size:14px; width:100%;">
<tr><td> <strong>Nom et prenom</strong> </td><td> <strong>Date de naissance</strong></td><td> <strong>Num passeport</strong></td></tr>

<?php for($i=1;$i<= $enfants;$i++)
{?>
	<tr>
    <td><?php echo $_POST['personne_enfant_'.$i];?></td>
    <td><?php echo $_POST['age_jour_enfant_'.$i]."/".$_POST['age_mois_enfant_'.$i]."/".$_POST['age_annee_enfant_'.$i];?></td>
    <td><?php echo $_POST['passeport_enfant_'.$i];?></td>
   </tr>
<?php }	?>	
	</table>
<?php }?>

          <div class="form-group row">
           <div class="col-xs-6 pull-right">
              <label>&nbsp;</label>
                <button name="terminer"class="full-width icon-check">Terminer</button>
                  </div>
                    </div>
  </form>
                        </div>
                        
                        <?php }?> 
                        
                                                                
                        </div>
    <p class="text">
                                    
                                     

                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                
              
            </div>
            <!-- BUTTON BACK TO TOP-->
            <div id="back-top"><a href="#top" class="link"><i class="fa fa-angle-double-up"></i></a></div>
        </div>
        <!-- FOOTER-->
            <?php include("footer.php");?>

    </div>
</div>
<!-- LIBRARY JS-->
<script src="assets/libs/jquery/jquery-2.2.3.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/libs/detect-browser/browser.js"></script>
<script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
<script src="assets/libs/wow-js/wow.min.js"></script>
<script src="assets/libs/slick-slider/slick.min.js"></script>
<script src="assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
<script src="assets/libs/please-wait/please-wait.min.js"></script>
<!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")--><!-- MAIN JS-->
<script src="assets/js/main.js"></script>
<!-- LOADING JS FOR PAGE-->
<script src="assets/js/pages/about-us.js"></script>
</body><style>.form-group{ height:20px;}</style>

<script  type="text/javascript">

/*

function test2(adulte, enfant){
	i=1;
	
while(i<=adulte) {
			
			var personne=document.getElementById('personne_enfant_'+i).value;
			var passeport=document.getElementById('passeport_enfant_'+i).value;

			if(personne==""){
					document.getElementById("erreur").innerHTML += "Vous avez oublier le nom & prénom "+i+" .<br>";
					test=false;
			
			}
			if(passeport==""){
				document.getElementById("erreur").innerHTML += "Vous avez oublier le numero de passeport "+i+" .<br>";
							test=false;
			}
		
	}
		if(test==false) {					
			document.getElementById("erreurG").style.display="";
			document.location.href="#";
		}else{document.getElementById("erreurG").style.display="none";}
	
	
	return test;
}*/
function test(){
	
	var test=true;
	
	 document.getElementById("erreur").innerHTML="";
	
		var depart=document.getElementById('dapart').value;
		var destination=document.getElementById('destination').value;
		var modedepart=document.getElementById('modedepart').value;
		var datedepart=document.getElementById('datedepart').value;
		var datearriver=document.getElementById('datearriver').value;
		var modearriver=document.getElementById('modearriver').value;
		var adulte=document.getElementById('adulte').value;
		var enfants=document.getElementById('enfants').value;
		
	
	
	if(depart=="") {document.getElementById("erreur").innerHTML += "Vous avez oublier le lieu de départ.<br>";
					test=false;
	}
	if(destination=="") {document.getElementById("erreur").innerHTML += "Vous avez oublier votre destination.<br>";
					test=false;
	}
	
	
	if(datedepart=="") {	
					document.getElementById("erreur").innerHTML += "Vous avez oublier la date de départ!.<br>";
					test=false;
	}
	
	if(enfants==0 && adulte==0) {	
					document.getElementById("erreur").innerHTML += "Vous devez séléctionner au moin une personne.<br>";
					test=false;
	}
	
var sdate2 = document.getElementById('datearriver').value
var date2 = new Date();
date2.setFullYear(sdate2.substr(6,4));
date2.setMonth(sdate2.substr(3,2));
date2.setDate(sdate2.substr(0,2));
date2.setHours(0);
date2.setMinutes(0);
date2.setSeconds(0);
date2.setMilliseconds(0);
var d2=date2.getTime()

var sdate1 = document.getElementById('datedepart').value
var date1 = new Date();
date1.setFullYear(sdate1.substr(6,4));
date1.setMonth(sdate1.substr(3,2));
date1.setDate(sdate1.substr(0,2));
date1.setHours(0);
date1.setMinutes(0);
date1.setSeconds(0);
date1.setMilliseconds(0);
var d1=date1.getTime()	
	
	
	if(d2 <= d1 && datedepart!="" && datearriver!="")
	 {	

					document.getElementById("erreur").innerHTML += "Verifier l'intervale des dates!.<br>";
					test=false;
	}
	


	
	
	
	
		if(test==false) {					
			document.getElementById("erreurG").style.display="";
			
		}else{document.getElementById("erreurG").style.display="none";}
	
	
	return test;
	
	
	
	}
	
	
	function montre(id){
		
		if(id==1){
			document.getElementById("modeaff").style.display="none";
			document.getElementById("titreaff2").style.display="none";
			document.getElementById("titreaff").style.display="none";
			document.getElementById("dateaff").style.display="none";
			
			
			}	
			else if(id==2){
			document.getElementById("modeaff").style.display="";
			document.getElementById("titreaff").style.display="";
			document.getElementById("titreaff2").style.display="";
			document.getElementById("dateaff").style.display="";
			
			
			}			

		
		
		}
		
		function message(msj){
	document.getElementById("erreurG").style.display="";
document.getElementById('erreur').innerHTML = msj;
 setTimeout(function() {
	 document.getElementById("erreurG").style.display="none";
  document.getElementById('msjerreur').innerHTML = "";
},5000);	
	
}
</script>

<style>
#erreurG{ color:#f00;}
 .mmmm table{width: 98%;}
 .mmmm table td {padding:5px;}
 
 
.mmmm input[type=text], .mmmm input[type=date], .mmmm select{ 
width: 100%; margin-top:5px;; height:30px; margin-left:10px; }

 .mmmm label{ 
 margin-top:5px; height:30px;}
 

</style>
</html>