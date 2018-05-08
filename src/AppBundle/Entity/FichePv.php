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
     * @ORM\ManyToOne(targetEntity="Passager", inversedBy="fichepvs")
     * @ORM\JoinColumn(name="id_passager", referencedColumnName="id")
     */
    private $idPass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pv", type="datetime")
     */
    private $datePv;

    /**
     * @ORM\ManyToOne(targetEntity="Train", inversedBy="trainidfiche")
     * @ORM\JoinColumn(name="numero_train", referencedColumnName="id")
     */
     private $numeroTrain;

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
     * @ORM\Column(name="destination_reele", type="string", length=255, nullable=true)
     */
    private $destinationReele;

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
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_abon", type="date", nullable=true)
     */
    private $dateFinAbon;

    /**
     * @var \boolean
     *
     * @ORM\Column(name="etat_pv", type="boolean", nullable=true, options={"default":false})
     */
    private $etatPv;



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
     * @param \AppBundle\Entity\Train $numTrain
     *
     * @return Train
     */
    public function setNumTrain(\AppBundle\Entity\Train $numTrain = null)
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
     * Set destinationReele
     *
     * @param string $destinationReele
     *
     * @return FichePv
     */
    public function setDestinationReele($destinationReele)
    {
        $this->destinationReele = $destinationReele;

        return $this;
    }

    /**
     * Get destinationReele
     *
     * @return string
     */
    public function getDestinationReele()
    {
        return $this->destinationReele;
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

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return FichePV
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set idPass
     *
     * @param \AppBundle\Entity\Passager $idPass
     *
     * @return FichePv
     */
    public function setIdPass(\AppBundle\Entity\Passager $idPass = null)
    {
        $this->idPass = $idPass;

        return $this;
    }

    /**
     * Get idPass
     *
     * @return \AppBundle\Entity\Passager
     */
    public function getIdPass()
    {
        return $this->idPass;
    }

    /**
     * Set idTrain
     *
     * @param \AppBundle\Entity\Train $idTrain
     *
     * @return FichePv
     */
    public function setIdTrain(\AppBundle\Entity\Train $idTrain = null)
    {
        $this->idTrain = $idTrain;

        return $this;
    }

    /**
     * Get idTrain
     *
     * @return \AppBundle\Entity\Train
     */
    public function getIdTrain()
    {
        return $this->idTrain;
    }

    /**
     * Set numeroTrain
     *
     * @param \AppBundle\Entity\Train $numeroTrain
     *
     * @return FichePv
     */
    public function setNumeroTrain(\AppBundle\Entity\Train $numeroTrain = null)
    {
        $this->numeroTrain = $numeroTrain;

        return $this;
    }

    /**
     * Get numeroTrain
     *
     * @return \AppBundle\Entity\Train
     */
    public function getNumeroTrain()
    {
        return $this->numeroTrain;
    }

    /**
     * Set etatPv
     *
     * @param boolean $etatPv
     *
     * @return FichePv
     */
    public function setEtatPv($etatPv)
    {
        $this->etatPv = $etatPv;

        return $this;
    }

    /**
     * Get etatPv
     *
     * @return boolean
     */
    public function getEtatPv()
    {
        return $this->etatPv;
    }
}
