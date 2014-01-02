<?php

/*
MediaID
MediaName
MediaLogo
MediaStream
MediaFile
MediaDescription
MediaIcon
*/

class media {
    public $id;
    public $name;
    public $logo;
    public $stream;
    public $file;
    public $description;
    public $icon;
}

class model_media extends model {

    public $error;

    public function __construct() {
        parent::__construct();
    }

    public function install() {

        //var_dump($this->db);

        $sql[] = "DROP TABLE IF EXISTS `stb_media_radio`";
        $sql[] = "DROP TABLE IF EXISTS `stb_media_tv`";
        $sql[] = "DROP TABLE IF EXISTS `stb_media_vod`";
        $sql[] = "DROP TABLE IF EXISTS `stb_media`";
        $sql[] = "CREATE TABLE IF NOT EXISTS `stb_media` (
                  `id` INT(11) UNSIGNED NOT NULL,
                  `name` VARCHAR(100) NOT NULL,
                  `description` MEDIUMTEXT NULL,
                  `file` VARCHAR(200) NULL,
                  `stream` VARCHAR(200) NULL,
                  `logo` VARCHAR(200) NULL,
                  `icon` VARCHAR(200) NULL,
                  `status` TINYINT(1) NOT NULL DEFAULT 1,
                  PRIMARY KEY (`id`))
                  ENGINE = InnoDB";
        $sql[] = "CREATE TABLE IF NOT EXISTS `stb_media_radio` (
                  `id` INT(11) UNSIGNED NOT NULL,
                  PRIMARY KEY (`id`),
                  CONSTRAINT `FK_MEDIA_RADIO`
                    FOREIGN KEY (`id`)
                    REFERENCES `stb_media` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                  ENGINE = InnoDB";
        $sql[] = "CREATE TABLE IF NOT EXISTS `stb_media_tv` (
                  `id` INT(11) UNSIGNED NOT NULL,
                  PRIMARY KEY (`id`),
                  CONSTRAINT `FK_MEDIA_TV`
                    FOREIGN KEY (`id`)
                    REFERENCES `stb_media` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                  ENGINE = InnoDB";
        $sql[] = "CREATE TABLE IF NOT EXISTS `stb_media_vod` (
                  `id` INT(11) UNSIGNED NOT NULL,
                  PRIMARY KEY (`id`),
                  CONSTRAINT `FK_MEDIA_VOD`
                    FOREIGN KEY (`id`)
                    REFERENCES `stb_media` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                  ENGINE = InnoDB";
        $s = 0;
        $f = 0;
        foreach($sql as $s) {
            $result = $this->db->query($s); //var_dump($result);
            if(!$this->db->getLastError())
                $s++;
            else $f++;
        }

        if($s) return true;

        $this->error = $this->db->getLastError();
        return false;
    }

    public function save() {
        var_dump($_POST);
    }

}