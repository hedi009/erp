<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115134117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_rights (id INT AUTO_INCREMENT NOT NULL, user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', rights_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_6432CA3EA76ED395 (user_id), INDEX IDX_6432CA3EB196EE6E (rights_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_rights ADD CONSTRAINT FK_6432CA3EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_rights ADD CONSTRAINT FK_6432CA3EB196EE6E FOREIGN KEY (rights_id) REFERENCES rights (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_rights DROP FOREIGN KEY FK_6432CA3EA76ED395');
        $this->addSql('ALTER TABLE user_rights DROP FOREIGN KEY FK_6432CA3EB196EE6E');
        $this->addSql('DROP TABLE user_rights');
    }
}
