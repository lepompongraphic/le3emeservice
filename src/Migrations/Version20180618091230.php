<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180618091230 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE membre (id_membre INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, mdp VARCHAR(100) NOT NULL, raison_social VARCHAR(100) NOT NULL, siret VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(100) NOT NULL, tel VARCHAR(20) NOT NULL, statut VARCHAR(1) NOT NULL, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id_membre)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('ALTER TABLE don ADD id_membre INT NOT NULL, DROP id_association, DROP id_professionnel');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE professionnel (id_professionnel INT AUTO_INCREMENT NOT NULL, email_professionnel VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, mdp_professionnel VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, raison_social_professionnel VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, siret_professionnel VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, adresse_professionnel VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, cp_professionnel VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, ville_professionnel VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, tel_professionnel VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, statut_professionnel VARCHAR(1) NOT NULL COLLATE utf8mb4_unicode_ci, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', PRIMARY KEY(id_professionnel)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE membre');
        $this->addSql('ALTER TABLE don ADD id_professionnel INT NOT NULL, CHANGE id_membre id_association INT NOT NULL');
    }
}
