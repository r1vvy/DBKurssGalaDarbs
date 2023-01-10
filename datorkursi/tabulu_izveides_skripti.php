<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <?php include('nav.php'); ?>
        <div class="container">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">stadioni</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`stadioni` (
                    `StadionsID` INT(11) NOT NULL AUTO_INCREMENT,
                    `Nosaukums` VARCHAR(30) NOT NULL DEFAULT 'NONE',
                    `Pilseta` VARCHAR(30) NOT NULL DEFAULT 'NONE',
                    `Adrese` VARCHAR(400) NOT NULL,
                    `Ietilpiba` INT(10) NOT NULL,
                    `Segums` TINYTEXT NOT NULL DEFAULT 'NONE',
                    PRIMARY KEY (`StadionsID`))
                    ENGINE = InnoDB
                    AUTO_INCREMENT = 12
                    DEFAULT CHARACTER SET = utf8
                    COLLATE = utf8_bin;
                </pre>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">treneri</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`treneri` (
                    `TrenerisID` INT(11) NOT NULL AUTO_INCREMENT,
                    `Uzvards` VARCHAR(45) NOT NULL DEFAULT 'NONE',
                    `Vards` VARCHAR(45) NOT NULL DEFAULT 'NONE',
                    `Valsts` VARCHAR(150) NOT NULL DEFAULT 'NONE',
                    PRIMARY KEY (`TrenerisID`))
                    ENGINE = InnoDB
                    AUTO_INCREMENT = 7
                    DEFAULT CHARACTER SET = utf8;
                </pre>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">klubi</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`klubi` (
                        `KlubsID` INT(11) NOT NULL AUTO_INCREMENT,
                        `Nosaukums` VARCHAR(45) NOT NULL DEFAULT 'NONE',
                        `Abreviacija` TINYTEXT NOT NULL DEFAULT 'NONE',
                        `StadionsID` INT(11) NOT NULL,
                        `TrenerisID` INT(11) NOT NULL,
                        `Talrunis` INT(11) NOT NULL DEFAULT 0,
                        `Epasts` TINYTEXT NOT NULL DEFAULT 'NONE',
                        PRIMARY KEY (`KlubsID`),
                        UNIQUE INDEX `TrenerisID` (`TrenerisID` ASC) VISIBLE,
                        INDEX `StadionsID` (`StadionsID` ASC) VISIBLE,
                        CONSTRAINT `StadionsID`
                            FOREIGN KEY (`StadionsID`)
                            REFERENCES `kajasbumba`.`stadioni` (`StadionsID`)
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE,
                        CONSTRAINT `TrenerisID`
                            FOREIGN KEY (`TrenerisID`)
                            REFERENCES `kajasbumba`.`treneri` (`TrenerisID`)
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE)
                        ENGINE = InnoDB
                        AUTO_INCREMENT = 9
                        DEFAULT CHARACTER SET = utf8;
                </pre>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">ligas</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`ligas` (
                    `LigaID` INT(11) NOT NULL AUTO_INCREMENT,
                    `Nosaukums` VARCHAR(20) NOT NULL DEFAULT 'NONE',
                    `Abreviacija` VARCHAR(5) NOT NULL DEFAULT 'NONE',
                    `Valsts` TINYTEXT NOT NULL DEFAULT 'NONE',
                    `Sezona` YEAR(4) NULL DEFAULT NULL,
                    `Sakums` DATE NULL DEFAULT NULL,
                    `Beigas` DATE NULL DEFAULT NULL,
                    PRIMARY KEY (`LigaID`))
                    ENGINE = InnoDB
                    AUTO_INCREMENT = 4
                    DEFAULT CHARACTER SET = utf8;
                </pre>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">ligas_klubi</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`ligas_klubi` (
                        `SarakstsID` INT(11) NOT NULL AUTO_INCREMENT,
                        `LigasID` INT(11) NOT NULL,
                        `KlubsID` INT(11) NOT NULL,
                        `Uzvaras` TINYINT(4) NOT NULL DEFAULT 0,
                        `Neizskirti` TINYINT(4) NOT NULL DEFAULT 0,
                        `Zaudes` TINYINT(4) NOT NULL DEFAULT 0,
                        `Punkti` INT(11) NOT NULL DEFAULT 0,
                        `Vartu_attieciba` INT(11) NOT NULL DEFAULT 0,
                        `Vieta` INT(11) NOT NULL DEFAULT 0,
                        PRIMARY KEY (`SarakstsID`),
                        INDEX `KlubsID` (`KlubsID` ASC) VISIBLE,
                        INDEX `LigasID` (`LigasID` ASC) VISIBLE,
                        CONSTRAINT `KlubsID`
                            FOREIGN KEY (`KlubsID`)
                            REFERENCES `kajasbumba`.`klubi` (`KlubsID`)
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE,
                        CONSTRAINT `LigasID`
                            FOREIGN KEY (`LigasID`)
                            REFERENCES `kajasbumba`.`ligas` (`LigaID`)
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE)
                        ENGINE = InnoDB
                        AUTO_INCREMENT = 10
                        DEFAULT CHARACTER SET = utf8;
                </pre>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">speletaji</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`speletaji` (
                    `SpeletajsID` INT(11) NOT NULL AUTO_INCREMENT,
                    `Uzvards` VARCHAR(100) NULL DEFAULT 'NONE',
                    `Vards` VARCHAR(100) NULL DEFAULT 'NONE',
                    `Dzimums` ENUM('M', 'F') NULL DEFAULT NULL,
                    `Dzimsanas_diena` DATE NOT NULL,
                    `Valsts` VARCHAR(100) NOT NULL DEFAULT 'NONE',
                    `Pozicija` ENUM('GK', 'DEF', 'MID', 'FWD') NOT NULL,
                    `KlubsID` INT(11) NULL DEFAULT NULL,
                    PRIMARY KEY (`SpeletajsID`),
                    INDEX `KlubsIDSpeletaji` (`KlubsID` ASC) VISIBLE,
                    CONSTRAINT `KlubsIDSpeletaji`
                        FOREIGN KEY (`KlubsID`)
                        REFERENCES `kajasbumba`.`klubi` (`KlubsID`)
                        ON DELETE NO ACTION
                        ON UPDATE CASCADE)
                    ENGINE = InnoDB
                    AUTO_INCREMENT = 169
                    DEFAULT CHARACTER SET = utf8;
                </pre>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h1 class="display-5 text-center">speletajs_statistika</h1>
                <pre>
                    CREATE TABLE IF NOT EXISTS `kajasbumba`.`speletajs_statistika` (
                    `StatistikaID` INT(11) NOT NULL AUTO_INCREMENT,
                    `SpeletajsID` INT(11) NOT NULL,
                    `Ligas_nosaukums` VARCHAR(150) NOT NULL DEFAULT 'NONE',
                    `Sezona` VARCHAR(45) NOT NULL DEFAULT 'NONE',
                    `Nospeletas_minutes` INT(11) NOT NULL DEFAULT 0,
                    `Speles` INT(11) NOT NULL DEFAULT 0,
                    `Varti` INT(11) NOT NULL DEFAULT 0,
                    `Piespeles` INT(11) NOT NULL DEFAULT 0,
                    `Pendeles_iesistas` INT(11) NOT NULL DEFAULT 0,
                    `Pendeles_nesekmigas` INT(11) NOT NULL DEFAULT 0,
                    `Bezvartu_speles` INT(11) NOT NULL DEFAULT 0,
                    `Ielaisti_varti` INT(11) NOT NULL DEFAULT 0,
                    `Dzeltenas_kartites` INT(11) NOT NULL DEFAULT 0,
                    `Sarkanas_kartites` INT(11) NOT NULL DEFAULT 0,
                    PRIMARY KEY (`StatistikaID`),
                    INDEX `SpeletajsID` (`SpeletajsID` ASC) VISIBLE,
                    CONSTRAINT `SpeletajsID`
                        FOREIGN KEY (`SpeletajsID`)
                        REFERENCES `kajasbumba`.`speletaji` (`SpeletajsID`)
                        ON DELETE NO ACTION
                        ON UPDATE CASCADE)
                    ENGINE = InnoDB
                    AUTO_INCREMENT = 209
                    DEFAULT CHARACTER SET = utf8
                    COLLATE = utf8_bin;
                </pre>
            </div>
        </div>
    </body>
</html>