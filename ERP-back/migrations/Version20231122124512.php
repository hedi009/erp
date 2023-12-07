<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122124512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `group` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', created_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', deleted_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description VARCHAR(255) DEFAULT NULL, deleted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted SMALLINT DEFAULT NULL, INDEX IDX_6DC044C5B03A8386 (created_by_id), INDEX IDX_6DC044C5C76F1F52 (deleted_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_rights (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', group_id_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', rights_id_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', description LONGTEXT DEFAULT NULL, INDEX IDX_D2E609D32F68B530 (group_id_id), INDEX IDX_D2E609D3FD99CBB8 (rights_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5C76F1F52 FOREIGN KEY (deleted_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE group_rights ADD CONSTRAINT FK_D2E609D32F68B530 FOREIGN KEY (group_id_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE group_rights ADD CONSTRAINT FK_D2E609D3FD99CBB8 FOREIGN KEY (rights_id_id) REFERENCES rights (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5B03A8386');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5C76F1F52');
        $this->addSql('ALTER TABLE group_rights DROP FOREIGN KEY FK_D2E609D32F68B530');
        $this->addSql('ALTER TABLE group_rights DROP FOREIGN KEY FK_D2E609D3FD99CBB8');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE group_rights');
    }
}
