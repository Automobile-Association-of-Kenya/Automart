{{--@extends('layouts.main')
@section('content')
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    <!-- show error messages -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="col-6 col-md-4" style="background-color: #FFFFFF; padding-top:10px;">
        <!-- Pills content -->
        {{-- <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <span class="badge bg-info"
                    style="width: 100%; padding-top:10px;padding-bottom:10px; background-color: #FFFFFF !Important;">SEARCH
                    VEHICLES</span>
                <form action="{{ route('search') }}" method="POST">
                    <!-- show success message -->
                    @if (session('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    <!-- show error messages -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    {{ csrf_field() }}
                    <div class="col-md-12" style="padding-bottom:5px; padding-top:5px;">
                        <select class="" id="make_search" name="make" aria-hidden="true"
                            style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                            <option value="Any Make" selected>Select Make</option>
                            <option value="TOYOTA">TOYOTA</option>
                            <option value="NISSAN">NISSAN</option>
                            <option value="HONDA">HONDA</option>
                            <option value="MITSUBISHI">MITSUBISHI</option>
                            <option value="MERCEDES BENZ">MERCEDES BENZ</option>
                            <option value="BMW">BMW</option>
                            <option value="MAZDA">MAZDA</option>
                            <option value="SUBARU">SUBARU</option>
                            <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                            <option value="SUZUKI">SUZUKI</option>
                            <option value="LAND ROVER">LAND ROVER</option>
                            <option value="AUDI">AUDI</option>
                            <option value="LEXUS">LEXUS</option>
                            <option value="CHEVROLET">CHEVROLET</option>
                            <option value="FERRARI">FERRARI</option>
                            <option value="FIAT">FIAT</option>
                            <option value="FORD">FORD</option>
                            <option value="GM">GM</option>
                            <option value="GMC">GMC</option>
                            <option value="HANIX">HANIX</option>
                            <option value="HINO">HINO</option>
                            <option value="HITACHI">HITACHI</option>
                            <option value="HUMMER">HUMMER</option>
                            <option value="HYUNDAI">HYUNDAI</option>
                            <option value="INFINITI">INFINITI</option>
                            <option value="ISEKI">ISEKI</option>
                            <option value="ISUZU">ISUZU</option>
                            <option value="JAGUAR">JAGUAR</option>
                            <option value="JEEP">JEEP</option>
                            <option value="KAWASAKI">KAWASAKI</option>
                            <option value="KOBELCO">KOBELCO</option>
                            <option value="KOMATSU">KOMATSU</option>
                            <option value="KUBOTA">KUBOTA</option>
                            <option value="LAMBORGHINI">LAMBORGHINI</option>
                            <option value="LANCIA">LANCIA</option>
                            <option value="LINCOLN">LINCOLN</option>
                            <option value="LOTUS">LOTUS</option>
                            <option value="MASERATI">MASERATI</option>
                            <option value="MAYBACH">MAYBACH</option>
                            <option value="MG">MG</option>
                            <option value="MINI">MINI</option>
                            <option value="MITSUOKA">MITSUOKA</option>
                            <option value="OPEL">OPEL</option>
                            <option value="OTHERS">OTHERS</option>
                            <option value="PEUGEOT">PEUGEOT</option>
                            <option value="PORSCHE">PORSCHE</option>
                            <option value="RENAULT">RENAULT</option>
                            <option value="ROLLS ROYCE">ROLLS ROYCE</option>
                            <option value="ROVER">ROVER</option>
                            <option value="SAAB">SAAB</option>
                            <option value="SMART">SMART</option>
                            <option value="SUMITOMO">SUMITOMO</option>
                            <option value="TADANO">TADANO</option>
                            <option value="TCM">TCM</option>
                            <option value="TESLA">TESLA</option>
                            <option value="TRIUMPH">TRIUMPH</option>
                            <option value="VOLVO">VOLVO</option>
                            <option value="WINNEBAGO">WINNEBAGO</option>
                            <option value="YAMAHA">YAMAHA</option>
                            <option value="YANMAR">YANMAR</option>
                            <option value="ACURA">ACURA</option>
                            <option value="ALFAROMEO">ALFAROMEO</option>
                            <option value="ASTON MARTIN">ASTON MARTIN</option>
                            <option value="BENTLEY">BENTLEY</option>
                            <option value="BMW ALPINA">BMW ALPINA</option>
                            <option value="CADILLAC">CADILLAC</option>
                            <option value="CHRYSLER">CHRYSLER</option>
                            <option value="CITROEN">CITROEN</option>
                            <option value="DAIHATSU">DAIHATSU</option>
                            <option value="DAIMLER">DAIMLER</option>
                            <option value="DODGE">DODGE</option>
                        </select>
                    </div>


                    <select class="" name="model" id="model" required aria-hidden="true"
                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                        <option value="Select model" selected>Select Model</option>
                        <option value="147">147</option>
                        <option value="155">155</option>
                        <option value="159">159</option>
                        <option value="GIULIA">GIULIA</option>
                        <option value="GIULIETTA">GIULIETTA</option>
                        <option value="MITO">MITO</option>
                        <option value="A1">A1</option>
                        <option value="A3">A3</option>
                        <option value="A4">A4</option>
                        <option value="A5">A5</option>
                        <option value="A6">A6</option>
                        <option value="A7">A7</option>
                        <option value="A8">A8</option>
                        <option value="ALLROAD">ALLROAD</option>
                        <option value="OTHER">OTHER</option>
                        <option value="Q2">Q2</option>
                        <option value="Q3">Q3</option>
                        <option value="Q5">Q5</option>
                        <option value="Q7">Q7</option>
                        <option value="RS6">RS6</option>
                        <option value="RS7">RS7</option>
                        <option value="S1">S1</option>
                        <option value="S3">S3</option>
                        <option value="S4">S4</option>
                        <option value="S5">S5</option>
                        <option value="S7">S7</option>
                        <option value="SQ5">SQ5</option>
                        <option value="TT">TT</option>
                        <option value="1 SERIES">1 SERIES</option>
                        <option value="2 SERIES">2 SERIES</option>
                        <option value="3 SERIES">3 SERIES</option>
                        <option value="4 SERIES">4 SERIES</option>
                        <option value="5 SERIES">5 SERIES</option>
                        <option value="6 SERIES">6 SERIES</option>
                        <option value="7 SERIES">7 SERIES</option>
                        <option value="8 SERIES">8 SERIES</option>
                        <option value="i3">i3</option>
                        <option value="M3">M3</option>
                        <option value="M4">M4</option>
                        <option value="M5">M5</option>
                        <option value="MINI">MINI</option>
                        <option value="OTHER">OTHER</option>
                        <option value="X1">X1</option>
                        <option value="X2">X2</option>
                        <option value="X3">X3</option>
                        <option value="X4">X4</option>
                        <option value="X5 SERIES">X5 SERIES</option>
                        <option value="X6">X6</option>
                        <option value="Z3 SERIES">Z3 SERIES</option>
                        <option value="Z4">Z4</option>
                        <option value="300">300</option>
                        <option value="300C">300C</option>
                        <option value="GRAND VOYAGE">GRAND VOYAGE</option>
                        <option value="JEEP CHEROKEE">JEEP CHEROKEE</option>
                        <option value="JEEP COMPASS">JEEP COMPASS</option>
                        <option value="JEEP GRAND CHEROKEE">JEEP GRAND CHEROKEE</option>
                        <option value="JEEP RENEGADE">JEEP RENEGADE</option>
                        <option value="JEEP WRANGLER">JEEP WRANGLER</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PT CRUISER">PT CRUISER</option>
                        <option value="YPSILON">YPSILON</option>
                        <option value="C3">C3</option>
                        <option value="C4">C4</option>
                        <option value="C5">C5</option>
                        <option value="DS5">DS5</option>
                        <option value="GRAND C4">GRAND C4</option>
                        <option value="ATRAI SEVEN">ATRAI SEVEN</option>
                        <option value="ATRAI VAN">ATRAI VAN</option>
                        <option value="ATRAI WAGON">ATRAI WAGON</option>
                        <option value="BEGO">BEGO</option>
                        <option value="BOON">BOON</option>
                        <option value="CAST">CAST</option>
                        <option value="COO">COO</option>
                        <option value="COPEN">COPEN</option>
                        <option value="DELTA TRUCK">DELTA TRUCK</option>
                        <option value="ESSE">ESSE</option>
                        <option value="HIJET CADDIE">HIJET CADDIE</option>
                        <option value="HIJET TRUCK">HIJET TRUCK</option>
                        <option value="HIJET VAN">HIJET VAN</option>
                        <option value="MAX">MAX</option>
                        <option value="MEBIUS">MEBIUS</option>
                        <option value="MIDJET II">MIDJET II</option>
                        <option value="MIRA">MIRA</option>
                        <option value="MIRA E S">MIRA E S</option>
                        <option value="MIRA TOCOT">MIRA TOCOT</option>
                        <option value="MOVE">MOVE</option>
                        <option value="MOVE CANBUS">MOVE CANBUS</option>
                        <option value="MOVE CONTE">MOVE CONTE</option>
                        <option value="MOVE LATTE">MOVE LATTE</option>
                        <option value="NAKED">NAKED</option>
                        <option value="OPTI">OPTI</option>
                        <option value="OTHER">OTHER</option>
                        <option value="ROCKY">ROCKY</option>
                        <option value="RUGGER">RUGGER</option>
                        <option value="SONICA">SONICA</option>
                        <option value="TANTO">TANTO</option>
                        <option value="TANTO EXE">TANTO EXE</option>
                        <option value="TERIOS">TERIOS</option>
                        <option value="TERIOS KID">TERIOS KID</option>
                        <option value="THOR">THOR</option>
                        <option value="WAKE">WAKE</option>
                        <option value="YRV">YRV</option>
                        <option value="OTHER">OTHER</option>
                        <option value="CHARGER">CHARGER</option>
                        <option value="DURANGO">DURANGO</option>
                        <option value="NITRO">NITRO</option>
                        <option value="500">500</option>
                        <option value="500C">500C</option>
                        <option value="BARCHETTA">BARCHETTA</option>
                        <option value="MULTIPLA">MULTIPLA</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PANDA">PANDA</option>
                        <option value="BRONCO">BRONCO</option>
                        <option value="ESCAPE">ESCAPE</option>
                        <option value="EXPLORER">EXPLORER</option>
                        <option value="FIESTA">FIESTA</option>
                        <option value="LINCOLN">LINCOLN</option>
                        <option value="LINCOLN NAVIGATOR">LINCOLN NAVIGATOR</option>
                        <option value="MUSTANG">MUSTANG</option>
                        <option value="OTHER">OTHER</option>
                        <option value="BUICK REGAL">BUICK REGAL</option>
                        <option value="CADILLAC CTS">CADILLAC CTS</option>
                        <option value="CADILLAC ESCALADE">CADILLAC ESCALADE</option>
                        <option value="CADILLAC SRX">CADILLAC SRX</option>
                        <option value="CHEVROLET CAMARO">CHEVROLET CAMARO</option>
                        <option value="CHEVROLET SUBURBAN">CHEVROLET SUBURBAN</option>
                        <option value="GMC YUKON">GMC YUKON</option>
                        <option value="OTHER">OTHER</option>
                        <option value="DUTORO">DUTORO</option>
                        <option value="LIESSE">LIESSE</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PROFIA">PROFIA</option>
                        <option value="RAINBOW">RAINBOW</option>
                        <option value="RANGER">RANGER</option>
                        <option value="SEREGA">SEREGA</option>
                        <option value="TRUCK">TRUCK</option>
                        <option value="OTHER">OTHER</option>
                        <option value="ACCORD">ACCORD</option>
                        <option value="ACCORD WAGON">ACCORD WAGON</option>
                        <option value="ACTY TRUCK">ACTY TRUCK</option>
                        <option value="ACTY VAN">ACTY VAN</option>
                        <option value="AIRWAVE">AIRWAVE</option>
                        <option value="AVANCIER">AVANCIER</option>
                        <option value="CITY">CITY</option>
                        <option value="CIVIC">CIVIC</option>
                        <option value="CIVIC COUPE">CIVIC COUPE</option>
                        <option value="CIVIC HYBRID">CIVIC HYBRID</option>
                        <option value="CR-V">CR-V</option>
                        <option value="CR-Z">CR-Z</option>
                        <option value="CROSSROAD">CROSSROAD</option>
                        <option value="EDIX">EDIX</option>
                        <option value="ELEMENT">ELEMENT</option>
                        <option value="ELYSION">ELYSION</option>
                        <option value="FIT">FIT</option>
                        <option value="FIT SHUTTLE">FIT SHUTTLE</option>
                        <option value="FREED">FREED</option>
                        <option value="FREED SPIKE">FREED SPIKE</option>
                        <option value="GRACE">GRACE</option>
                        <option value="HR-V">HR-V</option>
                        <option value="INSIGHT">INSIGHT</option>
                        <option value="INSPIRE">INSPIRE</option>
                        <option value="INTEGRA">INTEGRA</option>
                        <option value="JADE">JADE</option>
                        <option value="LEGEND">LEGEND</option>
                        <option value="LIFE">LIFE</option>
                        <option value="LIFE DUNK">LIFE DUNK</option>
                        <option value="MOBILIO">MOBILIO</option>
                        <option value="N BOX">N BOX</option>
                        <option value="N BOX PLUS">N BOX PLUS</option>
                        <option value="N BOX SLASH">N BOX SLASH</option>
                        <option value="N BOX+">N BOX+</option>
                        <option value="N ONE">N ONE</option>
                        <option value="N VAN">N VAN</option>
                        <option value="N WGN">N WGN</option>
                        <option value="NSX">NSX</option>
                        <option value="ODYSSEY">ODYSSEY</option>
                        <option value="ORTHIA">ORTHIA</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PARTNER">PARTNER</option>
                        <option value="PRELUDE">PRELUDE</option>
                        <option value="S-MX">S-MX</option>
                        <option value="S2000">S2000</option>
                        <option value="S660">S660</option>
                        <option value="SHUTTLE">SHUTTLE</option>
                        <option value="SPIKE">SPIKE</option>
                        <option value="STEP WAGON">STEP WAGON</option>
                        <option value="STREAM">STREAM</option>
                        <option value="STREET">STREET</option>
                        <option value="THATS">THATS</option>
                        <option value="TODAY">TODAY</option>
                        <option value="TODAY VAN">TODAY VAN</option>
                        <option value="TORNEO">TORNEO</option>
                        <option value="VAMOS">VAMOS</option>
                        <option value="VEZEL">VEZEL</option>
                        <option value="Z">Z</option>
                        <option value="ZEST">ZEST</option>
                        <option value="OTHER">OTHER</option>
                        <option value="BIGHORN">BIGHORN</option>
                        <option value="COMO">COMO</option>
                        <option value="ELF">ELF</option>
                        <option value="FARGO VAN">FARGO VAN</option>
                        <option value="FORWARD">FORWARD</option>
                        <option value="GALA">GALA</option>
                        <option value="GIGA">GIGA</option>
                        <option value="JUSTON">JUSTON</option>
                        <option value="MU">MU</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PIAZZA">PIAZZA</option>
                        <option value="TRUCK">TRUCK</option>
                        <option value="WIZARD">WIZARD</option>
                        <option value="F-PACE">F-PACE</option>
                        <option value="X TYPE">X TYPE</option>
                        <option value="XF SERIES">XF SERIES</option>
                        <option value="XJ SERIES">XJ SERIES</option>
                        <option value="BAYOU">BAYOU</option>
                        <option value="WHEELLOADER">WHEELLOADER</option>
                        <option value="OTHER">OTHER</option>
                        <option value="FORKLIFT">FORKLIFT</option>
                        <option value="OTHER">OTHER</option>
                        <option value="WHEELLOADER">WHEELLOADER</option>
                        <option value="OTHER">OTHER</option>
                        <option value="HURACAN">HURACAN</option>
                        <option value="OTHER">OTHER</option>
                        <option value="DEFENDER">DEFENDER</option>
                        <option value="CT">CT</option>
                        <option value="ES250">ES250</option>
                        <option value="GS">GS</option>
                        <option value="HS">HS</option>
                        <option value="IS">IS</option>
                        <option value="LC">LC</option>
                        <option value="LEXUA UX">LEXUA UX</option>
                        <option value="LS">LS</option>
                        <option value="LX">LX</option>
                        <option value="NX">NX</option>
                        <option value="RC">RC</option>
                        <option value="RC F">RC F</option>
                        <option value="RX">RX</option>
                        <option value="SC">SC</option>
                        <option value="GHIBLI">GHIBLI</option>
                        <option value="LEVANTE">LEVANTE</option>
                        <option value="QUATTROPORTE">QUATTROPORTE</option>
                        <option value="6">6</option>
                        <option value="ATENZA SEDAN">ATENZA SEDAN</option>
                        <option value="ATENZA SPORT">ATENZA SPORT</option>
                        <option value="ATENZA WAGON">ATENZA WAGON</option>
                        <option value="AXELA">AXELA</option>
                        <option value="AZ WAGON">AZ WAGON</option>
                        <option value="AZ-OFFROAD">AZ-OFFROAD</option>
                        <option value="BIANTE">BIANTE</option>
                        <option value="BONGO">BONGO</option>
                        <option value="BONGO BRAWNY AFT">BONGO BRAWNY AFT</option>
                        <option value="BONGO BRAWNY TRUCK">BONGO BRAWNY TRUCK</option>
                        <option value="BONGO BRAWNY VAN">BONGO BRAWNY VAN</option>
                        <option value="BONGO FRIENDEE">BONGO FRIENDEE</option>
                        <option value="BONGO VAN">BONGO VAN</option>
                        <option value="BONGO WAGON">BONGO WAGON</option>
                        <option value="CAROL">CAROL</option>
                        <option value="CX-3">CX-3</option>
                        <option value="CX-5">CX-5</option>
                        <option value="CX-7">CX-7</option>
                        <option value="CX-8">CX-8</option>
                        <option value="DEMIO">DEMIO</option>
                        <option value="FAMILIA">FAMILIA</option>
                        <option value="FAMILIA S WAGON">FAMILIA S WAGON</option>
                        <option value="FAMILIA VAN">FAMILIA VAN</option>
                        <option value="FLAIR">FLAIR</option>
                        <option value="FLAIR WAGON">FLAIR WAGON</option>
                        <option value="LAPUTA">LAPUTA</option>
                        <option value="MAZDA3">MAZDA3</option>
                        <option value="MPV">MPV</option>
                        <option value="PORTER-CAB">PORTER-CAB</option>
                        <option value="PREMACY">PREMACY</option>
                        <option value="ROADSTER">ROADSTER</option>
                        <option value="RX-7">RX-7</option>
                        <option value="RX-8">RX-8</option>
                        <option value="SCRUM">SCRUM</option>
                        <option value="SCRUM TRUCK">SCRUM TRUCK</option>
                        <option value="SPIANO">SPIANO</option>
                        <option value="TITAN">TITAN</option>
                        <option value="TRIBUTE">TRIBUTE</option>
                        <option value="VERISA">VERISA</option>
                        <option value="A CLASS">A CLASS</option>
                        <option value="AMG">AMG</option>
                        <option value="B CLASS">B CLASS</option>
                        <option value="C CLASS">C CLASS</option>
                        <option value="C CLASS WAGON">C CLASS WAGON</option>
                        <option value="CL CLASS">CL CLASS</option>
                        <option value="CLA CLASS">CLA CLASS</option>
                        <option value="CLK CLASS">CLK CLASS</option>
                        <option value="CLS">CLS</option>
                        <option value="E CLASS">E CLASS</option>
                        <option value="E CLASS WAGON">E CLASS WAGON</option>
                        <option value="G CLASS">G CLASS</option>
                        <option value="GLA CLASS">GLA CLASS</option>
                        <option value="GLC CLASS">GLC CLASS</option>
                        <option value="GLS">GLS</option>
                        <option value="ML CLASS">ML CLASS</option>
                        <option value="OTHER">OTHER</option>
                        <option value="S CLASS">S CLASS</option>
                        <option value="SL SERIES">SL SERIES</option>
                        <option value="SLC">SLC</option>
                        <option value="SLK CLASS">SLK CLASS</option>
                        <option value="V CLASS">V CLASS</option>
                        <option value="VANEO">VANEO</option>
                        <option value="VIANO">VIANO</option>
                        <option value="AERO QUENN">AERO QUENN</option>
                        <option value="AIRTREK">AIRTREK</option>
                        <option value="CANTER">CANTER</option>
                        <option value="CHARIOT">CHARIOT</option>
                        <option value="CHARIOT GRANDIS">CHARIOT GRANDIS</option>
                        <option value="COLT">COLT</option>
                        <option value="COLT PLUS">COLT PLUS</option>
                        <option value="DELICA">DELICA</option>
                        <option value="DELICA D2">DELICA D2</option>
                        <option value="DELICA D5">DELICA D5</option>
                        <option value="DELICA TRUCK">DELICA TRUCK</option>
                        <option value="DINGO">DINGO</option>
                        <option value="DION">DION</option>
                        <option value="ECLIPSE">ECLIPSE</option>
                        <option value="ECLIPSE CROSS">ECLIPSE CROSS</option>
                        <option value="EK ACTIVE">EK ACTIVE</option>
                        <option value="EK CUSTOM">EK CUSTOM</option>
                        <option value="EK SPACE">EK SPACE</option>
                        <option value="EK SPORTS">EK SPORTS</option>
                        <option value="EK WAGON">EK WAGON</option>
                        <option value="EK X">EK X</option>
                        <option value="FORKLIFT">FORKLIFT</option>
                        <option value="FUSO FIGHTER">FUSO FIGHTER</option>
                        <option value="FUSO TRUCK">FUSO TRUCK</option>
                        <option value="GALANT">GALANT</option>
                        <option value="GALANT FORTIS">GALANT FORTIS</option>
                        <option value="GRANDIS">GRANDIS</option>
                        <option value="GREAT">GREAT</option>
                        <option value="GTO">GTO</option>
                        <option value="I">I</option>
                        <option value="I-MIEV">I-MIEV</option>
                        <option value="JEEP">JEEP</option>
                        <option value="LANCER">LANCER</option>
                        <option value="LANCER VAN">LANCER VAN</option>
                        <option value="LEGNUM">LEGNUM</option>
                        <option value="MINICA">MINICA</option>
                        <option value="MINICAB TRUCK">MINICAB TRUCK</option>
                        <option value="MINICAB VAN">MINICAB VAN</option>
                        <option value="MINIKA TOPPO">MINIKA TOPPO</option>
                        <option value="MIRAGE">MIRAGE</option>
                        <option value="MITUBISHI">MITUBISHI</option>
                        <option value="OTHER">OTHER</option>
                        <option value="OUTLANDER">OUTLANDER</option>
                        <option value="OUTLANDER PHEV">OUTLANDER PHEV</option>
                        <option value="PAJERO">PAJERO</option>
                        <option value="PAJERO IO">PAJERO IO</option>
                        <option value="PAJERO JR">PAJERO JR</option>
                        <option value="PAJERO MINI">PAJERO MINI</option>
                        <option value="ROSA">ROSA</option>
                        <option value="RVR">RVR</option>
                        <option value="SUPER GREAT">SUPER GREAT</option>
                        <option value="TOPPO">TOPPO</option>
                        <option value="TOPPO BJ">TOPPO BJ</option>
                        <option value="TOPPO BJ VAN">TOPPO BJ VAN</option>
                        <option value="TOWNBOX">TOWNBOX</option>
                        <option value="WHEELLOADER">WHEELLOADER</option>
                        <option value="NOUERA">NOUERA</option>
                        <option value="VIEWT">VIEWT</option>
                        <option value="180 SX">180 SX</option>
                        <option value="AD">AD</option>
                        <option value="ATLAS">ATLAS</option>
                        <option value="AVENIR WAGON">AVENIR WAGON</option>
                        <option value="BASSARA">BASSARA</option>
                        <option value="BIGTHUMB">BIGTHUMB</option>
                        <option value="BLUEBIRD">BLUEBIRD</option>
                        <option value="BLUEBIRD SYLPHY">BLUEBIRD SYLPHY</option>
                        <option value="BUS">BUS</option>
                        <option value="CARAVAN">CARAVAN</option>
                        <option value="CARAVAN BUS">CARAVAN BUS</option>
                        <option value="CARAVAN VAN">CARAVAN VAN</option>
                        <option value="CEDRIC">CEDRIC</option>
                        <option value="CEDRIC WAGON">CEDRIC WAGON</option>
                        <option value="CEFIRO">CEFIRO</option>
                        <option value="CIMA">CIMA</option>
                        <option value="CIVILIAN">CIVILIAN</option>
                        <option value="CLIPPER RIO">CLIPPER RIO</option>
                        <option value="CLIPPER TRUCK">CLIPPER TRUCK</option>
                        <option value="CLIPPER VAN">CLIPPER VAN</option>
                        <option value="CONDOR">CONDOR</option>
                        <option value="CUBE">CUBE</option>
                        <option value="CUBECUBIC">CUBECUBIC</option>
                        <option value="DATSUN PICKUP">DATSUN PICKUP</option>
                        <option value="DAYZ">DAYZ</option>
                        <option value="DAYZ ROOX">DAYZ ROOX</option>
                        <option value="DUALIS">DUALIS</option>
                        <option value="ELGRAND">ELGRAND</option>
                        <option value="EXPERT">EXPERT</option>
                        <option value="FAIRLADYZ">FAIRLADYZ</option>
                        <option value="FORKLIFT">FORKLIFT</option>
                        <option value="FUGA">FUGA</option>
                        <option value="GLORIA">GLORIA</option>
                        <option value="GT-R">GT-R</option>
                        <option value="HOMY CORCH">HOMY CORCH</option>
                        <option value="INFINITI Q45">INFINITI Q45</option>
                        <option value="JUKE">JUKE</option>
                        <option value="KIX">KIX</option>
                        <option value="LAFESTA">LAFESTA</option>
                        <option value="LARGO">LARGO</option>
                        <option value="LATIO">LATIO</option>
                        <option value="LAUREL">LAUREL</option>
                        <option value="LEAF">LEAF</option>
                        <option value="LEOPARD">LEOPARD</option>
                        <option value="LIBERTY">LIBERTY</option>
                        <option value="MARCH">MARCH</option>
                        <option value="MICRA">MICRA</option>
                        <option value="MOCO">MOCO</option>
                        <option value="MURANO">MURANO</option>
                        <option value="NOTE">NOTE</option>
                        <option value="NV200">NV200</option>
                        <option value="OTHER">OTHER</option>
                        <option value="OTTI">OTTI</option>
                        <option value="PAO">PAO</option>
                        <option value="PINO">PINO</option>
                        <option value="PRESAGE">PRESAGE</option>
                        <option value="PRESEA">PRESEA</option>
                        <option value="PRESIDENT">PRESIDENT</option>
                        <option value="PRIMERA">PRIMERA</option>
                        <option value="PRIMERA WAGON">PRIMERA WAGON</option>
                        <option value="PULSAR">PULSAR</option>
                        <option value="PULSAR SERIES">PULSAR SERIES</option>
                        <option value="RASHEEN">RASHEEN</option>
                        <option value="ROOX">ROOX</option>
                        <option value="SAFARI">SAFARI</option>
                        <option value="SERENA">SERENA</option>
                        <option value="SILVIA">SILVIA</option>
                        <option value="SKYLINE">SKYLINE</option>
                        <option value="SKYLINE CROSSOVER">SKYLINE CROSSOVER</option>
                        <option value="STAGEA">STAGEA</option>
                        <option value="SUNNY">SUNNY</option>
                        <option value="SUNNY TRUCK">SUNNY TRUCK</option>
                        <option value="TEANA">TEANA</option>
                        <option value="TERRANO">TERRANO</option>
                        <option value="TERRANO REGULUS">TERRANO REGULUS</option>
                        <option value="TIIDA">TIIDA</option>
                        <option value="TIIDA LATIO">TIIDA LATIO</option>
                        <option value="TRUCK">TRUCK</option>
                        <option value="UD SERIES">UD SERIES</option>
                        <option value="VANETTE TRUCK">VANETTE TRUCK</option>
                        <option value="VANETTE VAN">VANETTE VAN</option>
                        <option value="WINGROAD">WINGROAD</option>
                        <option value="X-TRAIL">X-TRAIL</option>
                        <option value="VECTRA WAGON">VECTRA WAGON</option>
                        <option value="AICHI">AICHI</option>
                        <option value="BOMAG">BOMAG</option>
                        <option value="CAT">CAT</option>
                        <option value="CAT WHEELLOADER">CAT WHEELLOADER</option>
                        <option value="DENYO">DENYO</option>
                        <option value="FJ CURISER">FJ CURISER</option>
                        <option value="FORWARD">FORWARD</option>
                        <option value="FUJI">FUJI</option>
                        <option value="FURUKAWA">FURUKAWA</option>
                        <option value="FURUKAWA WHEELLOADER">FURUKAWA WHEELLOADER</option>
                        <option value="GIGA">GIGA</option>
                        <option value="HANTA">HANTA</option>
                        <option value="HOKUETSU">HOKUETSU</option>
                        <option value="IHI">IHI</option>
                        <option value="IWAFUJI">IWAFUJI</option>
                        <option value="IWATA">IWATA</option>
                        <option value="JOURNEY">JOURNEY</option>
                        <option value="KATO">KATO</option>
                        <option value="MAEDA">MAEDA</option>
                        <option value="MEIWA">MEIWA</option>
                        <option value="MIKASA">MIKASA</option>
                        <option value="MIRA E:S">MIRA E:S</option>
                        <option value="MOROOKA">MOROOKA</option>
                        <option value="NICHIYU FORKLIFT">NICHIYU FORKLIFT</option>
                        <option value="NIPPON SHARYO">NIPPON SHARYO</option>
                        <option value="NPK">NPK</option>
                        <option value="OTHER">OTHER</option>
                        <option value="OTHER JAPAN">OTHER JAPAN</option>
                        <option value="RX">RX</option>
                        <option value="SAKAI">SAKAI</option>
                        <option value="SIENNA">SIENNA</option>
                        <option value="TAIKYOKU">TAIKYOKU</option>
                        <option value="US PRIUS">US PRIUS</option>
                        <option value="1007">1007</option>
                        <option value="2008">2008</option>
                        <option value="206">206</option>
                        <option value="207">207</option>
                        <option value="208">208</option>
                        <option value="3008">3008</option>
                        <option value="306">306</option>
                        <option value="307">307</option>
                        <option value="308">308</option>
                        <option value="407">407</option>
                        <option value="5008">5008</option>
                        <option value="508">508</option>
                        <option value="OTHER">OTHER</option>
                        <option value="RCZ">RCZ</option>
                        <option value="911">911</option>
                        <option value="CAYENNE">CAYENNE</option>
                        <option value="CAYMAN">CAYMAN</option>
                        <option value="MACAN">MACAN</option>
                        <option value="PANAMERA">PANAMERA</option>
                        <option value="OTHER">OTHER</option>
                        <option value="CAPTUR">CAPTUR</option>
                        <option value="KANGOO">KANGOO</option>
                        <option value="LUTECIA">LUTECIA</option>
                        <option value="MEGANE">MEGANE</option>
                        <option value="TWINGO">TWINGO</option>
                        <option value="DEFENDER">DEFENDER</option>
                        <option value="DISCOVERY">DISCOVERY</option>
                        <option value="FREELANDER">FREELANDER</option>
                        <option value="MINI">MINI</option>
                        <option value="RANGE ROVER">RANGE ROVER</option>
                        <option value="9-3 SERIES">9-3 SERIES</option>
                        <option value="9-5 SERIES">9-5 SERIES</option>
                        <option value="FORFOUR">FORFOUR</option>
                        <option value="FORTWO">FORTWO</option>
                        <option value="SMART">SMART</option>
                        <option value="ALCYONE SVX">ALCYONE SVX</option>
                        <option value="BRZ">BRZ</option>
                        <option value="DEX">DEX</option>
                        <option value="EXIGA">EXIGA</option>
                        <option value="FORESTER">FORESTER</option>
                        <option value="GOLF ALLTRACK">GOLF ALLTRACK</option>
                        <option value="IMPREZA">IMPREZA</option>
                        <option value="IMPREZA G4">IMPREZA G4</option>
                        <option value="JUSTY">JUSTY</option>
                        <option value="LEGACY">LEGACY</option>
                        <option value="LEGACY B4">LEGACY B4</option>
                        <option value="LEVORG">LEVORG</option>
                        <option value="LUCRA">LUCRA</option>
                        <option value="OUTBACK">OUTBACK</option>
                        <option value="PLEO">PLEO</option>
                        <option value="PLEO PLUS">PLEO PLUS</option>
                        <option value="R1">R1</option>
                        <option value="R2">R2</option>
                        <option value="SAMBAR">SAMBAR</option>
                        <option value="STELLA">STELLA</option>
                        <option value="TRAVIQ">TRAVIQ</option>
                        <option value="TREZIA">TREZIA</option>
                        <option value="VIVIO">VIVIO</option>
                        <option value="WRX">WRX</option>
                        <option value="XV">XV</option>
                        <option value="FORKLIFT">FORKLIFT</option>
                        <option value="OTHER">OTHER</option>
                        <option value="AERIO">AERIO</option>
                        <option value="ALTO">ALTO</option>
                        <option value="ALTO ECO">ALTO ECO</option>
                        <option value="ALTO LAPIN">ALTO LAPIN</option>
                        <option value="ALTO VAN">ALTO VAN</option>
                        <option value="BALENO">BALENO</option>
                        <option value="CAPTINO">CAPTINO</option>
                        <option value="CARRY TRUCK">CARRY TRUCK</option>
                        <option value="CERVO">CERVO</option>
                        <option value="CERVO CLASSIC">CERVO CLASSIC</option>
                        <option value="CHEVROLET CRUZE">CHEVROLET CRUZE</option>
                        <option value="CHEVROLET MW">CHEVROLET MW</option>
                        <option value="ESCUDO">ESCUDO</option>
                        <option value="EVERY">EVERY</option>
                        <option value="EVERY LANDY">EVERY LANDY</option>
                        <option value="EVERY WAGON">EVERY WAGON</option>
                        <option value="HUSTLER">HUSTLER</option>
                        <option value="IGNIS">IGNIS</option>
                        <option value="JIMNY">JIMNY</option>
                        <option value="JIMNY SIERRA">JIMNY SIERRA</option>
                        <option value="JIMNY WIDE">JIMNY WIDE</option>
                        <option value="KEI">KEI</option>
                        <option value="LANDY">LANDY</option>
                        <option value="MIGHTY BOY">MIGHTY BOY</option>
                        <option value="MRWAGON">MRWAGON</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PALETTE">PALETTE</option>
                        <option value="SOLIO">SOLIO</option>
                        <option value="SPACIA">SPACIA</option>
                        <option value="SPACIA GEAR">SPACIA GEAR</option>
                        <option value="SPLASH">SPLASH</option>
                        <option value="SWIFT">SWIFT</option>
                        <option value="SX-4">SX-4</option>
                        <option value="TWIN">TWIN</option>
                        <option value="WAGON R">WAGON R</option>
                        <option value="XBEE">XBEE</option>
                        <option value="OTHER">OTHER</option>
                        <option value="BOBCAT">BOBCAT</option>
                        <option value="FORKLIFT">FORKLIFT</option>
                        <option value="WHEELLOADER">WHEELLOADER</option>
                        <option value="86">86</option>
                        <option value="ALLEX">ALLEX</option>
                        <option value="ALLION">ALLION</option>
                        <option value="ALPHARD">ALPHARD</option>
                        <option value="ALTEZZA">ALTEZZA</option>
                        <option value="ALTEZZA WAGON">ALTEZZA WAGON</option>
                        <option value="AQUA">AQUA</option>
                        <option value="ARISTO">ARISTO</option>
                        <option value="AURIS">AURIS</option>
                        <option value="AVENSIS SEDAN">AVENSIS SEDAN</option>
                        <option value="AVENSIS WAGON">AVENSIS WAGON</option>
                        <option value="BB">BB</option>
                        <option value="BELTA">BELTA</option>
                        <option value="BLADE">BLADE</option>
                        <option value="BREVIS">BREVIS</option>
                        <option value="C-HR">C-HR</option>
                        <option value="CALDINA">CALDINA</option>
                        <option value="CAMI">CAMI</option>
                        <option value="CAMRY">CAMRY</option>
                        <option value="CARINA">CARINA</option>
                        <option value="CELICA">CELICA</option>
                        <option value="CELSIOR">CELSIOR</option>
                        <option value="CENTURY">CENTURY</option>
                        <option value="CHASER">CHASER</option>
                        <option value="COASTER">COASTER</option>
                        <option value="COMS">COMS</option>
                        <option value="COPEN">COPEN</option>
                        <option value="COROLLA">COROLLA</option>
                        <option value="COROLLA AXIO">COROLLA AXIO</option>
                        <option value="COROLLA FIELDER">COROLLA FIELDER</option>
                        <option value="COROLLA LEVIN">COROLLA LEVIN</option>
                        <option value="COROLLA RUMION">COROLLA RUMION</option>
                        <option value="COROLLA RUNX">COROLLA RUNX</option>
                        <option value="COROLLA SPACIO">COROLLA SPACIO</option>
                        <option value="COROLLA SPORT">COROLLA SPORT</option>
                        <option value="COROLLA TOURING WAGON">COROLLA TOURING WAGON</option>
                        <option value="COROLLA VAN">COROLLA VAN</option>
                        <option value="CORONA PREMIO">CORONA PREMIO</option>
                        <option value="CORSA">CORSA</option>
                        <option value="CRESTA">CRESTA</option>
                        <option value="CROWN">CROWN</option>
                        <option value="CROWN COMFORT">CROWN COMFORT</option>
                        <option value="CROWN ESTATE">CROWN ESTATE</option>
                        <option value="CROWN WAGON">CROWN WAGON</option>
                        <option value="DUET">DUET</option>
                        <option value="DYNA">DYNA</option>
                        <option value="ESQUIRE">ESQUIRE</option>
                        <option value="ESTIMA">ESTIMA</option>
                        <option value="ESTIMA HYBRID">ESTIMA HYBRID</option>
                        <option value="FJ CRUISER">FJ CRUISER</option>
                        <option value="FORKLIFT">FORKLIFT</option>
                        <option value="FUNCARGO">FUNCARGO</option>
                        <option value="GAIA">GAIA</option>
                        <option value="GRANVIA">GRANVIA</option>
                        <option value="HARRIER">HARRIER</option>
                        <option value="HIACE">HIACE</option>
                        <option value="HIACE REGIUS">HIACE REGIUS</option>
                        <option value="HIACE TRUCK">HIACE TRUCK</option>
                        <option value="HIACE VAN">HIACE VAN</option>
                        <option value="HILUX">HILUX</option>
                        <option value="HILUX SURF">HILUX SURF</option>
                        <option value="IPSUM">IPSUM</option>
                        <option value="IQ">IQ</option>
                        <option value="ISIS">ISIS</option>
                        <option value="IST">IST</option>
                        <option value="KLUGER">KLUGER</option>
                        <option value="LAND CRUISER">LAND CRUISER</option>
                        <option value="LAND CRUISER PRADO">LAND CRUISER PRADO</option>
                        <option value="LITE ACE NOAH">LITE ACE NOAH</option>
                        <option value="LITE ACE TRUCK">LITE ACE TRUCK</option>
                        <option value="LITE ACE VAN">LITE ACE VAN</option>
                        <option value="LS">LS</option>
                        <option value="MARK II">MARK II</option>
                        <option value="MARK II WAGON">MARK II WAGON</option>
                        <option value="MARK X">MARK X</option>
                        <option value="MARK X ZIO">MARK X ZIO</option>
                        <option value="MARK2 BLIT">MARK2 BLIT</option>
                        <option value="MARK2 QUALIS">MARK2 QUALIS</option>
                        <option value="MINIACE">MINIACE</option>
                        <option value="MR-S">MR-S</option>
                        <option value="MR2">MR2</option>
                        <option value="NOAH">NOAH</option>
                        <option value="NX">NX</option>
                        <option value="OPA">OPA</option>
                        <option value="PASSO">PASSO</option>
                        <option value="PASSO SETTE">PASSO SETTE</option>
                        <option value="PIXIS EPOCH">PIXIS EPOCH</option>
                        <option value="PIXIS JOY">PIXIS JOY</option>
                        <option value="PIXIS MEGA">PIXIS MEGA</option>
                        <option value="PIXIS SPACE">PIXIS SPACE</option>
                        <option value="PIXIS TRUCK">PIXIS TRUCK</option>
                        <option value="PIXIS VAN">PIXIS VAN</option>
                        <option value="PLATZ">PLATZ</option>
                        <option value="PORTE">PORTE</option>
                        <option value="PREMIO">PREMIO</option>
                        <option value="PRIUS">PRIUS</option>
                        <option value="PRIUS ALPHA">PRIUS ALPHA</option>
                        <option value="PRIUS PHV">PRIUS PHV</option>
                        <option value="PROBOX">PROBOX</option>
                        <option value="PROBOX VAN">PROBOX VAN</option>
                        <option value="PROGRES">PROGRES</option>
                        <option value="QUICKDELIVERY VAN">QUICKDELIVERY VAN</option>
                        <option value="RACTIS">RACTIS</option>
                        <option value="RAIZE">RAIZE</option>
                        <option value="RAUM">RAUM</option>
                        <option value="RAV4">RAV4</option>
                        <option value="REGIUS ACE VAN">REGIUS ACE VAN</option>
                        <option value="ROOMY">ROOMY</option>
                        <option value="RUSH">RUSH</option>
                        <option value="SAI">SAI</option>
                        <option value="SIENTA">SIENTA</option>
                        <option value="SOARER">SOARER</option>
                        <option value="SPADE">SPADE</option>
                        <option value="SPRINTER">SPRINTER</option>
                        <option value="SPRINTER CARIB">SPRINTER CARIB</option>
                        <option value="SPRINTER MARINO">SPRINTER MARINO</option>
                        <option value="SUCCEED">SUCCEED</option>
                        <option value="SUCCEED VAN">SUCCEED VAN</option>
                        <option value="SUPRA">SUPRA</option>
                        <option value="TANK">TANK</option>
                        <option value="TERCEL">TERCEL</option>
                        <option value="TOWN ACE">TOWN ACE</option>
                        <option value="TOWN ACE NOAH">TOWN ACE NOAH</option>
                        <option value="TOWN ACE TRUCK">TOWN ACE TRUCK</option>
                        <option value="TOWN ACE VAN">TOWN ACE VAN</option>
                        <option value="TOYOACE">TOYOACE</option>
                        <option value="VANGUARD">VANGUARD</option>
                        <option value="VELLFIRE">VELLFIRE</option>
                        <option value="VEROSSA">VEROSSA</option>
                        <option value="VISTA ARDEO">VISTA ARDEO</option>
                        <option value="VITZ">VITZ</option>
                        <option value="VOLTZ">VOLTZ</option>
                        <option value="VOXY">VOXY</option>
                        <option value="WHEELLOADER">WHEELLOADER</option>
                        <option value="WILL">WILL</option>
                        <option value="WILL VI">WILL VI</option>
                        <option value="WINDOM">WINDOM</option>
                        <option value="WISH">WISH</option>
                        <option value="BORA">BORA</option>
                        <option value="CROSS GOLF">CROSS GOLF</option>
                        <option value="CROSS POLO">CROSS POLO</option>
                        <option value="EOS">EOS</option>
                        <option value="GOLF">GOLF</option>
                        <option value="GOLF ALLTRACK">GOLF ALLTRACK</option>
                        <option value="GOLF TOURAN">GOLF TOURAN</option>
                        <option value="GOLF VARIANT">GOLF VARIANT</option>
                        <option value="GOLF WAGON">GOLF WAGON</option>
                        <option value="JETTA">JETTA</option>
                        <option value="NEW BEETLE">NEW BEETLE</option>
                        <option value="OTHER">OTHER</option>
                        <option value="PASSAT">PASSAT</option>
                        <option value="PASSAT VARIANT">PASSAT VARIANT</option>
                        <option value="PASSAT WAGON">PASSAT WAGON</option>
                        <option value="POLO">POLO</option>
                        <option value="RUPO">RUPO</option>
                        <option value="SCIROCCO">SCIROCCO</option>
                        <option value="SHARAN">SHARAN</option>
                        <option value="THE BEETLE">THE BEETLE</option>
                        <option value="TIGUAN">TIGUAN</option>
                        <option value="TOUAREG">TOUAREG</option>
                        <option value="UP">UP</option>
                        <option value="240 SERIES">240 SERIES</option>
                        <option value="850 SERIES">850 SERIES</option>
                        <option value="C30">C30</option>
                        <option value="C70 SERIES">C70 SERIES</option>
                        <option value="OTHER">OTHER</option>
                        <option value="S40">S40</option>
                        <option value="S60">S60</option>
                        <option value="V40">V40</option>
                        <option value="V50">V50</option>
                        <option value="V60">V60</option>
                        <option value="V70">V70</option>
                        <option value="XC60">XC60</option>
                        <option value="XC90">XC90</option>
                        <option value="OTHER">OTHER</option>
                    </select>
                    <div class="row">
                        <div class="col-6">
                            <label>Year of Manufacture From:</label>
                            <select class="" name="from_year" aria-hidden="true"
                                style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                <option data-select2-id="7" selected>From Year</option>
                                <option value="2006">2000</option>
                                <option value="2006">2001</option>
                                <option value="2006">2002</option>
                                <option value="2006">2003</option>
                                <option value="2006">2004</option>
                                <option value="2006">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2020">2021</option>
                            </select><span class="select2-selection select2-selection--single" role="combobox"
                                aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                aria-labelledby="select2-from_year-87-container"><span class="select2-selection__arrow"
                                    role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <div class="col-6">
                            <label>Year of Manufacture To:</label>
                            <select class="" name="to_year" data-select2-id="8" tabindex="-1" aria-hidden="true"
                                style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                <option data-select2-id="10" selected="selected">To Year</option>
                                <option value="2006">2000</option>
                                <option value="2006">2001</option>
                                <option value="2006">2002</option>
                                <option value="2006">2003</option>
                                <option value="2006">2004</option>
                                <option value="2006">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2020">2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Min Mileage</label>
                            <select class="" name="min_mileage" data-select2-id="11" tabindex="-1"
                                aria-hidden="true"
                                style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                <option disabled="disabled">Mileage (km)</option>
                                <option value="0" selected="selected" data-select2-id="13">0</option>
                                <option value="10000">10,000</option>
                                <option value="30000">30,000</option>
                                <option value="50000">50,000</option>
                                <option value="100000">100,000</option>
                                <option value="150000">150,000</option>
                                <option value="250000">250,000</option>
                                <option value="350000">350,000</option>
                                <option value="450000">450,000</option>
                                <option value="500000">500,000</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Max Mileage</label>
                            <select class="" name="max_mileage" data-select2-id="14" tabindex="-1"
                                aria-hidden="true"
                                style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                <option disabled="disabled">Mileage (km)</option>
                                <option value="0" selected="selected" data-select2-id="16">0</option>
                                <option value="10000">10,000</option>
                                <option value="30000">30,000</option>
                                <option value="50000">50,000</option>
                                <option value="100000">100,000</option>
                                <option value="150000">150,000</option>
                                <option value="250000">250,000</option>
                                <option value="350,000">350,000</option>
                                <option value="450,000">450,000</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Min Engine CC</label>
                            <input class="form-control" type="number" name="min_engine" placeholder="Min Engine (cc)">
                        </div>
                        <div class="col-6">
                            <label>Max Engine CC</label>
                            <input class="form-control" type="number" name="max_engine" placeholder="Max Engine (cc)">
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-6">
                            <label>Min Price</label>
                            <input class="form-control" type="number" name="min_price" placeholder="Min Price">
                        </div>
                        <div class="col-6">
                            <label>Max Price</label>
                            <input class="form-control" type="number" name="max_price" placeholder="Max Price">
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4"
                        style="background-color : rgba(0, 101, 68, 0.9) !Important;"><i class="fa fa-search"
                            aria-hidden=""></i>&nbsp;SEARCH</button>
                </form>
            </div>
        </div> 
        <!-- <div class="row" style="padding-left: 20px; padding-top: 10px; padding-bottom: 20px; color: #fff;">
                    <div class="col-6 col-md-4" style="background-color : rgba(0,0,0, 0.3) !Important;"> -->
        <span class="badge bg-info"
            style="width: 100%; padding-top:10px;
             padding-bottom:10px; background-color: rgba(254,217,37, 0.8) !Important;">DEAL
            OF THE WEEK</span>
                 <!-- Deal of the week start -->
                  <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp" class="img-fluid" />
                <a href="#">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
            <div class="card-body" style="color: #000">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">More Details</a>
            </div>
            <!-- </div>
                    Deal of the week end -->
        </div>

        <!-- Pills content -->
    </div>
    <div class="col-md-8" style="padding-left : 20px; padding-right : 20px;">

        <div class="row">
            <!-- image card 1 line 1 start -->
            @if (!empty($vehicles) && $vehicles->count())
                @foreach ($vehicles->all() as $vehicle)
                    <!-- use this for slideshow -->
                    <!-- @foreach (json_decode($vehicle->images, true) as $image)
    -->
                    <!-- <a href="{{ url('public/images/' . json_decode($vehicle->images, true)[0]) }}" class="portfolio-box">
                            <img src="{{ url('public/images/' . json_decode($vehicle->images, true)[0]) }}" class="img-responsive" alt="--">
                    @endforeach -->
                    <div class="col-6 col-md-4" style="padding-bottom: 15px;">
                        <div class="card" style="color: #000">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{ url('images/' . json_decode($vehicle->images, true)[0]) }}" style=""
                                    class="img-fluide" width="100%" height="300px" />
                                <a href="{{ route('details', $vehicle->id) }}">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Year of Manufacture: <b>{{ $vehicle->year }}</b></h6>
                                <h6 class="card-title">Price: <b>Ksh. {{ number_format("$vehicle->price") }}</b></h6>
                                <h6 class="card-title">Make&Model: <b>{{ ucwords($vehicle->make) }} /
                                        {{ ucwords($vehicle->model) }}</b></h6>
                                <h6 class="card-title">Mileage: <b>{{ number_format("$vehicle->miles", 1) }} Kms</b></h6>
                                <h6 class="card-title">Dealer/Yard: <b>{{ $vehicle->firstname }}</b></h6>
                                <i class="fas fa-phone fa-1x"></i>&nbsp;{{ $vehicle->phone }}
                                <i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->county }}
                                <a href="{{ route('details', $vehicle->id) }}" class="btn btn-primary">More Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-success" role="alert">
                    Sorry. No Records Found. Try a Different Search.
                </div>
            @endif
        </div>
        <div class="pagination" style="color:#fff;">
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection --}}
@extends('layouts.new')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>All Cars</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">All Cars</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Featured car start -->
    <div class="featured-car content-area" style="background-color:#FFFFFF">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>You are currently viewing all</h5>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-12">

                            </div>
                        </div>
                    </div>
                    
                    </div>
                 </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (!empty($vehicles) && $vehicles->count())
                            @foreach ($vehicles->all() as $vehicle)
                                <div class="col-lg-4 col-md-4">
                                    <a href="{{ route('details', $vehicle->id) }}" class="car-img">
                                        <div class="car-box-3">
                                            <div class="car-thumbnail">

                                                <div class="for">For Sale</div>
                                                <div class="price-box">

                                                    <span>Ksh. {{ number_format("$vehicle->price") }}</span>
                                                </div>
                                                <img class="d-block w-100"
                                                    src="{{ url('images/' . json_decode($vehicle->images, true)[0]) }}"
                                                    width="280" height="340" alt="car">

                                                <div class="carbox-overlap-wrapper">
                                                    <div class="overlap-box">
                                                        {{-- <div class="overlap-btns-area">
                                                        <a class="overlap-btn" data-bs-toggle="modal"
                                                            data-bs-target="#carOverviewModal">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </a>
                                                        <a class="overlap-btn wishlist-btn">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a class="overlap-btn compare-btn">
                                                            <i class="fa fa-balance-scale"></i>
                                                        </a>
                                                        <div class="car-magnify-gallery">
                                                            <a href="{{ url('assets/img/car/car-1.jpg')}}" class="overlap-btn"
                                                                data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <i class="fa fa-expand"></i>
                                                                <img class="hidden" src="{{ url('assets/img/car/car-1.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-2.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-2.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-3.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-3.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-4.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-4.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-5.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-5.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                        </div>
                                                    </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <h1 class="title">
                                                    <a style="color:black"
                                                        href="{{ route('details', $vehicle->id) }}">{{ $vehicle->carmodel ? $vehicle->carmodel->car_model_name : '' }}</a>
                                                </h1>
                                                <ul class="custom-list">
                                                    <li>
                                                        <a
                                                            href="{{ route('details', $vehicle->id) }}">{{ $vehicle->carmake ? $vehicle->carmake->car_make_name : '' }}</a>
                                                    </li>

                                                </ul>
                                                <ul class="facilities-list clearfix">
                                                    <li>
                                                        <i class="flaticon-fuel"></i> {{ $vehicle->firstname }}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-way"></i>
                                                        {{ number_format("$vehicle->miles") }} Kms
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-manual-transmission"></i>
                                                        {{ $vehicle->county }}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-car"></i> {{ $vehicle->phone }}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-gear"></i> Ksh.
                                                        {{ number_format("$vehicle->price" )}}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-calendar-1"></i>{{ $vehicle->year }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="footer clearfix" style="background-color:#00472F">
                                                <div class="pull-left ratings">
                                                    <i class="fa fa-phone"></i>
                                                    <span style="color:white">Call or Chat with the owner</span>
                                                    <i class="fa fa-envelope"></i>
                                                    <a href="https://wa.me/{{$vehicle->phone}}" style="color: #00472F; margin-left:5px">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Page navigation start -->
                    <div class="pagination-box text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{ $vehicles->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured car end -->
@endsection
