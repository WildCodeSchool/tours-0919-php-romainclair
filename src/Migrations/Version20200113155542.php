<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200113155542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE meetings_meetings (meetings_source INT NOT NULL, meetings_target INT NOT NULL, INDEX IDX_C97543AA90B2A764 (meetings_source), INDEX IDX_C97543AA8957F7EB (meetings_target), PRIMARY KEY(meetings_source, meetings_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meetings_meetings ADD CONSTRAINT FK_C97543AA90B2A764 FOREIGN KEY (meetings_source) REFERENCES meetings (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meetings_meetings ADD CONSTRAINT FK_C97543AA8957F7EB FOREIGN KEY (meetings_target) REFERENCES meetings (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE meetings_meetings');
    }
}
