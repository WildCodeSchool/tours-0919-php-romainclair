<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191217082616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE thematiques (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, image VARCHAR(80) DEFAULT NULL, description VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subjects (id INT AUTO_INCREMENT NOT NULL, thematiques_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(80) DEFAULT NULL, requirements VARCHAR(80) DEFAULT NULL, image VARCHAR(80) DEFAULT NULL, INDEX IDX_AB259917A15F660A (thematiques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subjects ADD CONSTRAINT FK_AB259917A15F660A FOREIGN KEY (thematiques_id) REFERENCES thematiques (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subjects DROP FOREIGN KEY FK_AB259917A15F660A');
        $this->addSql('DROP TABLE thematiques');
        $this->addSql('DROP TABLE subjects');
    }
}
