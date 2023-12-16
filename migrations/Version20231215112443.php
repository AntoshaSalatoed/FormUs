<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215112443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_email (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_figure (id INT AUTO_INCREMENT NOT NULL, figure VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_image (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_table (id INT AUTO_INCREMENT NOT NULL, text_id INT NOT NULL, email_id INT NOT NULL, color_id INT NOT NULL, figure_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_14EB741E698D3548 (text_id), INDEX IDX_14EB741EA832C1C9 (email_id), INDEX IDX_14EB741E7ADA1FB5 (color_id), INDEX IDX_14EB741E5C011B5 (figure_id), INDEX IDX_14EB741E3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_text (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_table ADD CONSTRAINT FK_14EB741E698D3548 FOREIGN KEY (text_id) REFERENCES user_text (id)');
        $this->addSql('ALTER TABLE user_table ADD CONSTRAINT FK_14EB741EA832C1C9 FOREIGN KEY (email_id) REFERENCES user_email (id)');
        $this->addSql('ALTER TABLE user_table ADD CONSTRAINT FK_14EB741E7ADA1FB5 FOREIGN KEY (color_id) REFERENCES user_color (id)');
        $this->addSql('ALTER TABLE user_table ADD CONSTRAINT FK_14EB741E5C011B5 FOREIGN KEY (figure_id) REFERENCES user_figure (id)');
        $this->addSql('ALTER TABLE user_table ADD CONSTRAINT FK_14EB741E3DA5256D FOREIGN KEY (image_id) REFERENCES user_image (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_table DROP FOREIGN KEY FK_14EB741E698D3548');
        $this->addSql('ALTER TABLE user_table DROP FOREIGN KEY FK_14EB741EA832C1C9');
        $this->addSql('ALTER TABLE user_table DROP FOREIGN KEY FK_14EB741E7ADA1FB5');
        $this->addSql('ALTER TABLE user_table DROP FOREIGN KEY FK_14EB741E5C011B5');
        $this->addSql('ALTER TABLE user_table DROP FOREIGN KEY FK_14EB741E3DA5256D');
        $this->addSql('DROP TABLE user_color');
        $this->addSql('DROP TABLE user_email');
        $this->addSql('DROP TABLE user_figure');
        $this->addSql('DROP TABLE user_image');
        $this->addSql('DROP TABLE user_table');
        $this->addSql('DROP TABLE user_text');
    }
}
