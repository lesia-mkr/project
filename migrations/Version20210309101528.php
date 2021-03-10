<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309101528 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items CHANGE categories_id categories_id INT DEFAULT NULL, CHANGE items_img_id items_img_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE items_has_orders DROP count');
        $this->addSql('ALTER TABLE items_has_orders RENAME INDEX fk_items_has_orders_items1_idx TO IDX_5715D4424B9BDD55');
        $this->addSql('ALTER TABLE items_has_orders RENAME INDEX fk_items_has_orders_orders1_idx TO IDX_5715D442CFFE9AD6');
        $this->addSql('ALTER TABLE items_img CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE orders CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE customer customer INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles CHANGE name name VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE authors_name authors_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE categories_id categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE authors CHANGE name name VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE customers CHANGE idcustomers idcustomers INT NOT NULL');
        $this->addSql('ALTER TABLE items CHANGE categories_id categories_id INT NOT NULL, CHANGE items_img_id items_img_id INT NOT NULL');
        $this->addSql('ALTER TABLE items_has_orders ADD count INT DEFAULT NULL');
        $this->addSql('ALTER TABLE items_has_orders RENAME INDEX idx_5715d4424b9bdd55 TO fk_items_has_orders_items1_idx');
        $this->addSql('ALTER TABLE items_has_orders RENAME INDEX idx_5715d442cffe9ad6 TO fk_items_has_orders_orders1_idx');
        $this->addSql('ALTER TABLE items_img CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE orders CHANGE id id INT NOT NULL, CHANGE customer customer INT NOT NULL');
    }
}
