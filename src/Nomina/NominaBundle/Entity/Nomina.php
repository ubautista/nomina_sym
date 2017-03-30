<?php
namespace Nomina\NominaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="nomina")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Nomina\NominaBundle\Entity\NominaRepository")
 */
class Nomina{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $sueldo_base;
	/**
	 * @ORM\Column(type="integer",nullable=true)
	 */
	protected $pension;
	/**
	 * @ORM\Column(type="integer",nullable=true)
	 */
	protected $eps;
	/**
	 * @ORM\Column(type="integer",nullable=true)
	 */
	protected $valor_devengado;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sueldo_base
     *
     * @param integer $sueldoBase
     * @return Nomina
     */
    public function setSueldoBase($sueldoBase)
    {
        $this->sueldo_base = $sueldoBase;
    
        return $this;
    }

    /**
     * Get sueldo_base
     *
     * @return integer 
     */
    public function getSueldoBase()
    {
        return $this->sueldo_base;
    }

    /**
     * Set pension
     *
     * @param integer $pension
     * @return Nomina
     */
    public function setPension($pension)
    {
        $this->pension = $pension;
    
        return $this;
    }

    /**
     * Get pension
     *
     * @return integer 
     */
    public function getPension()
    {
        return $this->pension;
    }

    /**
     * Set eps
     *
     * @param integer $eps
     * @return Nomina
     */
    public function setEps($eps)
    {
        $this->eps = $eps;
    
        return $this;
    }

    /**
     * Get eps
     *
     * @return integer 
     */
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * Set valor_devengado
     *
     * @param integer $valorDevengado
     * @return Nomina
     */
    public function setValorDevengado($valorDevengado)
    {
        $this->valor_devengado = $valorDevengado;
    
        return $this;
    }

    /**
     * Get valor_devengado
     *
     * @return integer 
     */
    public function getValorDevengado()
    {
        return $this->valor_devengado;
    }
}