<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201027135248 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facturation ADD utilisateurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_17EB513A1E969C5 ON facturation (utilisateurs_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A1E969C5');
        $this->addSql('DROP INDEX IDX_17EB513A1E969C5 ON facturation');
        $this->addSql('ALTER TABLE facturation DROP utilisateurs_id');
    }
}
