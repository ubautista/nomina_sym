<?php
namespace Nomina\NominaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $nombre;
	/**
	 * @ORM\Column(type="string", length=20)
	 *
	 */
	protected $apellidos;
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $cedula;
	/**
	 * @ORM\Column(type="string", length=100)
	 *
	 */
	protected $direccion;
	/**
	 * @ORM\Column(type="string", length=10)
	 */
	protected $telefono;
	/**
	 * @ORM\Column(type="string", length=15)
	 */
	protected $correo;


	/**
	 * @ORM\ManyToOne(targetEntity="Nomina", inversedBy="usuario")
	 * @ORM\JoinColumn(name="id_nomina", referencedColumnName="id")
	 */
	protected $id_nomina;	

	public function getNombreCompleto(){
		return $this->nombre." ".$this->apellidos;
	}

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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Usuario
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set id_nomina
     *
     * @param \Nomina\NominaBundle\Entity\Nomina $idNomina
     * @return Usuario
     */
    public function setIdNomina(\Nomina\NominaBundle\Entity\Nomina $idNomina = null)
    {
        $this->id_nomina = $idNomina;
    
        return $this;
    }

    /**
     * Get id_nomina
     *
     * @return \Nomina\NominaBundle\Entity\Nomina 
     */
    public function getIdNomina()
    {
        return $this->id_nomina;
    }
}