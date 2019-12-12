<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212145731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subjects ADD thematiques_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subjects ADD CONSTRAINT FK_AB259917A15F660A FOREIGN KEY (thematiques_id) REFERENCES thematiques (id)');
        $this->addSql('CREATE INDEX IDX_AB259917A15F660A ON subjects (thematiques_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subjects DROP FOREIGN KEY FK_AB259917A15F660A');
        $this->addSql('DROP INDEX IDX_AB259917A15F660A ON subjects');
        $this->addSql('ALTER TABLE subjects DROP thematiques_id');
    }
}
