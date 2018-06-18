<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180615140208 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE association');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE association (id_association INT AUTO_INCREMENT NOT NULL, email_association VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, mdp_association VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, raison_social_association VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, siret_association VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, adresse_association VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, cp_association INT NOT NULL, ville_association VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, tel_association INT NOT NULL, statut_association VARCHAR(1) NOT NULL COLLATE utf8mb4_unicode_ci, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', PRIMARY KEY(id_association)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }
}
