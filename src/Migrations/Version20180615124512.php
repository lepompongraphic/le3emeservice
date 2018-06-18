<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180615124512 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, id_association INT NOT NULL, id_professionnel INT NOT NULL, description VARCHAR(255) NOT NULL, date_entree DATETIME NOT NULL, reserver VARCHAR(255) NOT NULL, heure_collecte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnel (id_professionnel INT AUTO_INCREMENT NOT NULL, email_professionnel VARCHAR(100) NOT NULL, mdp_professionnel VARCHAR(100) NOT NULL, raison_social_professionnel VARCHAR(100) NOT NULL, siret_professionnel VARCHAR(100) NOT NULL, adresse_professionnel VARCHAR(100) NOT NULL, cp_professionnel VARCHAR(5) NOT NULL, ville_professionnel VARCHAR(100) NOT NULL, tel_professionnel VARCHAR(20) NOT NULL, statut_professionnel VARCHAR(1) NOT NULL, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id_professionnel)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE professionnel');
    }
}
