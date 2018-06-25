<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180623145457 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, id_membre INT NOT NULL, ville LONGTEXT NOT NULL, description LONGTEXT NOT NULL, date_entree DATETIME NOT NULL, reservation LONGTEXT NOT NULL, commentaires LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id_membre INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, mdp VARCHAR(100) NOT NULL, raison_social VARCHAR(100) NOT NULL, siret VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(100) NOT NULL, tel VARCHAR(20) NOT NULL, statut VARCHAR(1) NOT NULL, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id_membre)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE membre');
    }
}
