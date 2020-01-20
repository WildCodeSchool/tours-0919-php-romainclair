<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200120103117 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, theme_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(80) DEFAULT NULL, requirements VARCHAR(80) DEFAULT NULL, image VARCHAR(80) DEFAULT NULL, participation TINYINT(1) DEFAULT NULL, INDEX IDX_FBCE3E7A59027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meeting (id INT AUTO_INCREMENT NOT NULL, subject_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, required LONGTEXT DEFAULT NULL, participating INT DEFAULT NULL, INDEX IDX_F515E13923EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meeting_meeting (meeting_source INT NOT NULL, meeting_target INT NOT NULL, INDEX IDX_6DC7A9B45FE24E31 (meeting_source), INDEX IDX_6DC7A9B446071EBE (meeting_target), PRIMARY KEY(meeting_source, meeting_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_subject (user_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_A3C32070A76ED395 (user_id), INDEX IDX_A3C3207023EDC87 (subject_id), PRIMARY KEY(user_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, image VARCHAR(80) DEFAULT NULL, description VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7A59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E13923EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE meeting_meeting ADD CONSTRAINT FK_6DC7A9B45FE24E31 FOREIGN KEY (meeting_source) REFERENCES meeting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meeting_meeting ADD CONSTRAINT FK_6DC7A9B446071EBE FOREIGN KEY (meeting_target) REFERENCES meeting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_subject ADD CONSTRAINT FK_A3C32070A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_subject ADD CONSTRAINT FK_A3C3207023EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E13923EDC87');
        $this->addSql('ALTER TABLE user_subject DROP FOREIGN KEY FK_A3C3207023EDC87');
        $this->addSql('ALTER TABLE meeting_meeting DROP FOREIGN KEY FK_6DC7A9B45FE24E31');
        $this->addSql('ALTER TABLE meeting_meeting DROP FOREIGN KEY FK_6DC7A9B446071EBE');
        $this->addSql('ALTER TABLE user_subject DROP FOREIGN KEY FK_A3C32070A76ED395');
        $this->addSql('ALTER TABLE subject DROP FOREIGN KEY FK_FBCE3E7A59027487');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE meeting');
        $this->addSql('DROP TABLE meeting_meeting');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_subject');
        $this->addSql('DROP TABLE theme');
    }
}
