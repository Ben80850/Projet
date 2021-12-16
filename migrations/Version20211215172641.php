<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215172641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF66A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_DE57CF66A76ED395 ON candidatures (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures DROP FOREIGN KEY FK_DE57CF66A76ED395');
        $this->addSql('DROP INDEX IDX_DE57CF66A76ED395 ON candidatures');
        $this->addSql('ALTER TABLE candidatures DROP user_id');
    }
}
