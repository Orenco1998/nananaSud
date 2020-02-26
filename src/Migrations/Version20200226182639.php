<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200226182639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE purchase CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE id_service id_service INT DEFAULT NULL');
        $this->addSql('ALTER TABLE basket CHANGE id_purchase id_purchase INT DEFAULT NULL, CHANGE id_product id_product INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paragraphe_entreprise CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE compagny_basket CHANGE id_compagny id_compagny INT DEFAULT NULL, CHANGE id_service id_service INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE basket CHANGE id_purchase id_purchase INT NOT NULL, CHANGE id_product id_product INT NOT NULL');
        $this->addSql('ALTER TABLE compagny_basket CHANGE id_service id_service INT NOT NULL, CHANGE id_compagny id_compagny INT NOT NULL');
        $this->addSql('ALTER TABLE paragraphe_entreprise CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE purchase CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE id_service id_service INT NOT NULL');
    }
}
