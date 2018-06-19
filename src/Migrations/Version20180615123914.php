<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180615123914 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE association (id_association INT AUTO_INCREMENT NOT NULL, email_association VARCHAR(100) NOT NULL, mdp_association VARCHAR(20) NOT NULL, raison_social_association VARCHAR(100) NOT NULL, siret_association VARCHAR(100) NOT NULL, adresse_association VARCHAR(100) NOT NULL, cp_association INT NOT NULL, ville_association VARCHAR(100) NOT NULL, tel_association INT NOT NULL, statut_association VARCHAR(1) NOT NULL, PRIMARY KEY(id_association)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, id_association INT NOT NULL, id_professionnel INT NOT NULL, description VARCHAR(255) NOT NULL, date_entree DATETIME NOT NULL, reserver VARCHAR(255) NOT NULL, heure_collecte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE don');
    }
}
