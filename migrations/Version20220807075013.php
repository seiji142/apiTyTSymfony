<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220807075013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conexion ADD origen_id INT NOT NULL, ADD destino_id INT NOT NULL');
        $this->addSql('ALTER TABLE conexion ADD CONSTRAINT FK_847691C193529ECD FOREIGN KEY (origen_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE conexion ADD CONSTRAINT FK_847691C1E4360615 FOREIGN KEY (destino_id) REFERENCES pais (id)');
        $this->addSql('CREATE INDEX IDX_847691C193529ECD ON conexion (origen_id)');
        $this->addSql('CREATE INDEX IDX_847691C1E4360615 ON conexion (destino_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conexion DROP FOREIGN KEY FK_847691C193529ECD');
        $this->addSql('ALTER TABLE conexion DROP FOREIGN KEY FK_847691C1E4360615');
        $this->addSql('DROP INDEX IDX_847691C193529ECD ON conexion');
        $this->addSql('DROP INDEX IDX_847691C1E4360615 ON conexion');
        $this->addSql('ALTER TABLE conexion DROP origen_id, DROP destino_id');
    }
}
