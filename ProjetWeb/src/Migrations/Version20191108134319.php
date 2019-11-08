<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191108134319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, auteur_id INT NOT NULL, contenu VARCHAR(255) NOT NULL, visible TINYINT(1) NOT NULL, date DATETIME NOT NULL, INDEX IDX_67F068BCFD02F13 (evenement_id), INDEX IDX_67F068BC60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME NOT NULL, date_creation DATETIME NOT NULL, visible TINYINT(1) NOT NULL, prix INT NOT NULL, statut VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_utilisateur (evenement_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_8C897598FD02F13 (evenement_id), INDEX IDX_8C897598FB88E14F (utilisateur_id), PRIMARY KEY(evenement_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, chemin VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, visible TINYINT(1) NOT NULL, INDEX IDX_C53D045FFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix INT NOT NULL, image_chemin VARCHAR(50) NOT NULL, quantite_vendu INT, INDEX IDX_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_utilisateur (produit_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_63042737F347EFB (produit_id), INDEX IDX_63042737FB88E14F (utilisateur_id), PRIMARY KEY(produit_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE evenement_utilisateur ADD CONSTRAINT FK_8C897598FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_utilisateur ADD CONSTRAINT FK_8C897598FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit_utilisateur ADD CONSTRAINT FK_63042737F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_utilisateur ADD CONSTRAINT FK_63042737FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCFD02F13');
        $this->addSql('ALTER TABLE evenement_utilisateur DROP FOREIGN KEY FK_8C897598FD02F13');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FFD02F13');
        $this->addSql('ALTER TABLE produit_utilisateur DROP FOREIGN KEY FK_63042737F347EFB');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC60BB6FE6');
        $this->addSql('ALTER TABLE evenement_utilisateur DROP FOREIGN KEY FK_8C897598FB88E14F');
        $this->addSql('ALTER TABLE produit_utilisateur DROP FOREIGN KEY FK_63042737FB88E14F');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE evenement_utilisateur');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_utilisateur');
        $this->addSql('DROP TABLE utilisateur');
    }
}
