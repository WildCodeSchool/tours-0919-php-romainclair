<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200117073014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_subject (user_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_A3C32070A76ED395 (user_id), INDEX IDX_A3C3207023EDC87 (subject_id), PRIMARY KEY(user_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_subject ADD CONSTRAINT FK_A3C32070A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_subject ADD CONSTRAINT FK_A3C3207023EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE meeting CHANGE subject_id subject_id INT DEFAULT NULL, CHANGE participating participating INT DEFAULT NULL');
        $this->addSql('ALTER TABLE theme CHANGE image image VARCHAR(80) DEFAULT NULL, CHANGE description description VARCHAR(80) DEFAULT NULL');
        $this->addSql('ALTER TABLE subject CHANGE theme_id theme_id INT DEFAULT NULL, CHANGE description description VARCHAR(80) DEFAULT NULL, CHANGE requirements requirements VARCHAR(80) DEFAULT NULL, CHANGE image image VARCHAR(80) DEFAULT NULL, CHANGE participation participation TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_subject');
        $this->addSql('ALTER TABLE meeting CHANGE subject_id subject_id INT DEFAULT NULL, CHANGE participating participating INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subject CHANGE theme_id theme_id INT DEFAULT NULL, CHANGE description description VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE requirements requirements VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE participation participation TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE theme CHANGE image image VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
