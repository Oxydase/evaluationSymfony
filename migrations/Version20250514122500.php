<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250514122500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, parcours_id INT DEFAULT NULL, descriptif LONGTEXT NOT NULL, consignes LONGTEXT NOT NULL, position INT NOT NULL, INDEX IDX_285F75DD6E38C0DB (parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE etape_rendu_activite (etape_id INT NOT NULL, rendu_activite_id INT NOT NULL, INDEX IDX_36B6DEA94A8CA2AD (etape_id), INDEX IDX_36B6DEA919FF918B (rendu_activite_id), PRIMARY KEY(etape_id, rendu_activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, emet_id INT DEFAULT NULL, recoit_id INT DEFAULT NULL, reponse_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, date_heure DATETIME NOT NULL, INDEX IDX_B6BD307FDC07736C (emet_id), INDEX IDX_B6BD307FAD48400 (recoit_id), UNIQUE INDEX UNIQ_B6BD307FCF18BB82 (reponse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, choisi_par_id INT DEFAULT NULL, objet VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_99B1DEE3589C5D77 (choisi_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE rendu_activite (id INT AUTO_INCREMENT NOT NULL, depose_par_id INT DEFAULT NULL, url_document VARCHAR(255) NOT NULL, date_heure DATETIME NOT NULL, INDEX IDX_88D477C9DCFF0FC4 (depose_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE rendu_activite_etape (rendu_activite_id INT NOT NULL, etape_id INT NOT NULL, INDEX IDX_99628E1419FF918B (rendu_activite_id), INDEX IDX_99628E144A8CA2AD (etape_id), PRIMARY KEY(rendu_activite_id, etape_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, presentation LONGTEXT NOT NULL, support VARCHAR(50) NOT NULL, nature VARCHAR(50) NOT NULL, url_document_physique VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ressource_etape (ressource_id INT NOT NULL, etape_id INT NOT NULL, INDEX IDX_BCCBF159FC6CD52A (ressource_id), INDEX IDX_BCCBF1594A8CA2AD (etape_id), PRIMARY KEY(ressource_id, etape_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ressource_rendu_activite (ressource_id INT NOT NULL, rendu_activite_id INT NOT NULL, INDEX IDX_F96CABD0FC6CD52A (ressource_id), INDEX IDX_F96CABD019FF918B (rendu_activite_id), PRIMARY KEY(ressource_id, rendu_activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE etape ADD CONSTRAINT FK_285F75DD6E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE etape_rendu_activite ADD CONSTRAINT FK_36B6DEA94A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE etape_rendu_activite ADD CONSTRAINT FK_36B6DEA919FF918B FOREIGN KEY (rendu_activite_id) REFERENCES rendu_activite (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDC07736C FOREIGN KEY (emet_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT FK_B6BD307FAD48400 FOREIGN KEY (recoit_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message ADD CONSTRAINT FK_B6BD307FCF18BB82 FOREIGN KEY (reponse_id) REFERENCES message (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE3589C5D77 FOREIGN KEY (choisi_par_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendu_activite ADD CONSTRAINT FK_88D477C9DCFF0FC4 FOREIGN KEY (depose_par_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendu_activite_etape ADD CONSTRAINT FK_99628E1419FF918B FOREIGN KEY (rendu_activite_id) REFERENCES rendu_activite (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendu_activite_etape ADD CONSTRAINT FK_99628E144A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_etape ADD CONSTRAINT FK_BCCBF159FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_etape ADD CONSTRAINT FK_BCCBF1594A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_rendu_activite ADD CONSTRAINT FK_F96CABD0FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_rendu_activite ADD CONSTRAINT FK_F96CABD019FF918B FOREIGN KEY (rendu_activite_id) REFERENCES rendu_activite (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD nom VARCHAR(100) NOT NULL, ADD prenom VARCHAR(100) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD6E38C0DB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE etape_rendu_activite DROP FOREIGN KEY FK_36B6DEA94A8CA2AD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE etape_rendu_activite DROP FOREIGN KEY FK_36B6DEA919FF918B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FDC07736C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FAD48400
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FCF18BB82
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE3589C5D77
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendu_activite DROP FOREIGN KEY FK_88D477C9DCFF0FC4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendu_activite_etape DROP FOREIGN KEY FK_99628E1419FF918B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendu_activite_etape DROP FOREIGN KEY FK_99628E144A8CA2AD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_etape DROP FOREIGN KEY FK_BCCBF159FC6CD52A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_etape DROP FOREIGN KEY FK_BCCBF1594A8CA2AD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_rendu_activite DROP FOREIGN KEY FK_F96CABD0FC6CD52A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressource_rendu_activite DROP FOREIGN KEY FK_F96CABD019FF918B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE etape
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE etape_rendu_activite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE message
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE parcours
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE rendu_activite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE rendu_activite_etape
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ressource
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ressource_etape
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ressource_rendu_activite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP nom, DROP prenom
        SQL);
    }
}
