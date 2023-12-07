<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113143711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_right DROP FOREIGN KEY FK_56088E4CA76ED395');
        $this->addSql('ALTER TABLE user_right DROP FOREIGN KEY FK_56088E4CB196EE6E');
        $this->addSql('DROP TABLE user_right');
        $this->addSql('ALTER TABLE rights CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_right (id INT AUTO_INCREMENT NOT NULL, user_id VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, rights_id INT DEFAULT NULL, INDEX IDX_56088E4CB196EE6E (rights_id), INDEX IDX_56088E4CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_right ADD CONSTRAINT FK_56088E4CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_right ADD CONSTRAINT FK_56088E4CB196EE6E FOREIGN KEY (rights_id) REFERENCES rights (id)');
        $this->addSql('ALTER TABLE rights CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
