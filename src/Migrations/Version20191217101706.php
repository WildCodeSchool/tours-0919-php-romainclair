<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191217101706 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meetings ADD subjects_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE meetings ADD CONSTRAINT FK_44FE52E294AF957A FOREIGN KEY (subjects_id) REFERENCES subjects (id)');
        $this->addSql('CREATE INDEX IDX_44FE52E294AF957A ON meetings (subjects_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meetings DROP FOREIGN KEY FK_44FE52E294AF957A');
        $this->addSql('DROP INDEX IDX_44FE52E294AF957A ON meetings');
        $this->addSql('ALTER TABLE meetings DROP subjects_id');
    }
}
