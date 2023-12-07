<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115133236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_right DROP FOREIGN KEY FK_56088E4CB196EE6E');
        $this->addSql('ALTER TABLE user_right DROP FOREIGN KEY FK_56088E4CA76ED395');
        $this->addSql('DROP TABLE user_right');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_right (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', user_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', rights_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_56088E4CA76ED395 (user_id), INDEX IDX_56088E4CB196EE6E (rights_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_right ADD CONSTRAINT FK_56088E4CB196EE6E FOREIGN KEY (rights_id) REFERENCES rights (id)');
        $this->addSql('ALTER TABLE user_right ADD CONSTRAINT FK_56088E4CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }
}
