<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FichePv
 *
 * @ORM\Table(name="fiche_pv")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FichePvRepository")
 */
class FichePv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cin_pass", type="integer")
     */
    private $cinPass;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pass", type="string", length=255)
     */
    private $nomPass;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_pass", type="string", length=255)
     */
    private $prenomPass;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_pass", type="string", length=255)
     */
    private $adressePass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pv", type="datetime")
     */
    private $datePv;

    /**
     * @var int
     *
     * @ORM\Column(name="num_train", type="integer")
     */
    private $numTrain;

    /**
     * @var float
     *
     * @ORM\Column(name="montant_pv", type="float")
     */
    private $montantPv;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule_cont", type="string", length=255)
     */
    private $matriculeCont;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_controle", type="string", length=255)
     */
    private $lieuControle;

    /**
     * @var int
     *
     * @ORM\Column(name="classe", type="integer", nullable=true)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="distination_reele", type="string", length=255, nullable=true)
     */
    private $distinationReele;

    /**
     * @var string
     *
     * @ORM\Column(name="type_abonn", type="string", length=255, nullable=true)
     */
    private $typeAbonn;

    /**
     * @var int
     *
     * @ORM\Column(name="dure_stationnement", type="integer", nullable=true)
     */
    private $dureStationnement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_abon", type="date", nullable=true)
     */
    private $dateFinAbon;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cinPass
     *
     * @param integer $cinPass
     *
     * @return FichePv
     */
    public function setCinPass($cinPass)
    {
        $this->cinPass = $cinPass;

        return $this;
    }

    /**
     * Get cinPass
     *
     * @return int
     */
    public function getCinPass()
    {
        return $this->cinPass;
    }

    /**
     * Set nomPass
     *
     * @param string $nomPass
     *
     * @return FichePv
     */
    public function setNomPass($nomPass)
    {
        $this->nomPass = $nomPass;

        return $this;
    }

    /**
     * Get nomPass
     *
     * @return string
     */
    public function getNomPass()
    {
        return $this->nomPass;
    }

    /**
     * Set prenomPass
     *
     * @param string $prenomPass
     *
     * @return FichePv
     */
    public function setPrenomPass($prenomPass)
    {
        $this->prenomPass = $prenomPass;

        return $this;
    }

    /**
     * Get prenomPass
     *
     * @return string
     */
    public function getPrenomPass()
    {
        return $this->prenomPass;
    }

    /**
     * Set adressePass
     *
     * @param string $adressePass
     *
     * @return FichePv
     */
    public function setAdressePass($adressePass)
    {
        $this->adressePass = $adressePass;

        return $this;
    }

    /**
     * Get adressePass
     *
     * @return string
     */
    public function getAdressePass()
    {
        return $this->adressePass;
    }

    /**
     * Set datePv
     *
     * @param \DateTime $datePv
     *
     * @return FichePv
     */
    public function setDatePv($datePv)
    {
        $this->datePv = $datePv;

        return $this;
    }

    /**
     * Get datePv
     *
     * @return \DateTime
     */
    public function getDatePv()
    {
        return $this->datePv;
    }

    /**
     * Set numTrain
     *
     * @param integer $numTrain
     *
     * @return FichePv
     */
    public function setNumTrain($numTrain)
    {
        $this->numTrain = $numTrain;

        return $this;
    }

    /**
     * Get numTrain
     *
     * @return int
     */
    public function getNumTrain()
    {
        return $this->numTrain;
    }

    /**
     * Set montantPv
     *
     * @param float $montantPv
     *
     * @return FichePv
     */
    public function setMontantPv($montantPv)
    {
        $this->montantPv = $montantPv;

        return $this;
    }

    /**
     * Get montantPv
     *
     * @return float
     */
    public function getMontantPv()
    {
        return $this->montantPv;
    }

    /**
     * Set matriculeCont
     *
     * @param string $matriculeCont
     *
     * @return FichePv
     */
    public function setMatriculeCont($matriculeCont)
    {
        $this->matriculeCont = $matriculeCont;

        return $this;
    }

    /**
     * Get matriculeCont
     *
     * @return string
     */
    public function getMatriculeCont()
    {
        return $this->matriculeCont;
    }

    /**
     * Set lieuControle
     *
     * @param string $lieuControle
     *
     * @return FichePv
     */
    public function setLieuControle($lieuControle)
    {
        $this->lieuControle = $lieuControle;

        return $this;
    }

    /**
     * Get lieuControle
     *
     * @return string
     */
    public function getLieuControle()
    {
        return $this->lieuControle;
    }

    /**
     * Set classe
     *
     * @param integer $classe
     *
     * @return FichePv
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return int
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set distinationReele
     *
     * @param string $distinationReele
     *
     * @return FichePv
     */
    public function setDistinationReele($distinationReele)
    {
        $this->distinationReele = $distinationReele;

        return $this;
    }

    /**
     * Get distinationReele
     *
     * @return string
     */
    public function getDistinationReele()
    {
        return $this->distinationReele;
    }

    /**
     * Set typeAbonn
     *
     * @param string $typeAbonn
     *
     * @return FichePv
     */
    public function setTypeAbonn($typeAbonn)
    {
        $this->typeAbonn = $typeAbonn;

        return $this;
    }

    /**
     * Get typeAbonn
     *
     * @return string
     */
    public function getTypeAbonn()
    {
        return $this->typeAbonn;
    }

    /**
     * Set dureStationnement
     *
     * @param integer $dureStationnement
     *
     * @return FichePv
     */
    public function setDureStationnement($dureStationnement)
    {
        $this->dureStationnement = $dureStationnement;

        return $this;
    }

    /**
     * Get dureStationnement
     *
     * @return int
     */
    public function getDureStationnement()
    {
        return $this->dureStationnement;
    }

    /**
     * Set dateFinAbon
     *
     * @param \DateTime $dateFinAbon
     *
     * @return FichePv
     */
    public function setDateFinAbon($dateFinAbon)
    {
        $this->dateFinAbon = $dateFinAbon;

        return $this;
    }

    /**
     * Get dateFinAbon
     *
     * @return \DateTime
     */
    public function getDateFinAbon()
    {
        return $this->dateFinAbon;
    }
}

