<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PedidoRepository")
 */
class Pedido
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

   

    /**
     * @var int
     *
     * @ORM\Column(name="estado_id", type="integer")
     */
    private $estadoId;

    /**
     * @var int
     *
     * @ORM\Column(name="android_id", type="integer", nullable=true)
     */
    private $android_id;

    /**
     * @var string
     *
     * @ORM\Column(name="subtotal", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $subtotal;

    

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $monto;
    
    
   
    /**
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;
    
    
    public function getCliente()
    {
        return $this->cliente;
    }
    
    
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    
    /**
     * @ORM\ManyToOne(targetEntity="Empleado")
     * @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     */
    private $empleado;
    
    public function getEmpleado()
    {
        return $this->empleado;
    }
    
    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
        
    }


     /**
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
     */
    private $empresa;
    
    public function getEmpresa()
    {
        return $this->empresa;
    }
    
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
        
    }
    
     /**
    * @ORM\OneToMany(targetEntity="Pedidodetalle", mappedBy="pedido_id",cascade={"all"})
    */
    private $pedidodetalles;

    public function __construct()
    {
        $this->pedidodetalles = new ArrayCollection();
    }
    
    public function getPedidodetalles(){
        return $this->pedidodetalles;
    }
    
    public function addPedidodetalle(Pedidodetalle $pd){
        $this->pedidodetalles->add($pd);
        $pd->setPedido($this);


    }
    
    
    
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pedido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    

    /**
     * Set estadoId
     *
     * @param integer $estadoId
     *
     * @return Pedido
     */
    public function setEstadoId($estadoId)
    {
        $this->estadoId = $estadoId;

        return $this;
    }

    /**
     * Get estadoId
     *
     * @return int
     */
    public function getEstadoId()
    {
        return $this->estadoId;
    }

    /**
     * Set android_id
     *
     * @param integer $android_id
     *
     * @return Pedido
     */
    public function setAndroid_id($android_id)
    {
        $this->android_id = $android_id;

        return $this;
    }

    /**
     * Get android_id
     *
     * @return int
     */
    public function getAndroid_id()
    {
        return $this->android_id;
    }

    /**
     * Set subtotal
     *
     * @param string $subtotal
     *
     * @return Pedido
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return string
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

   

    /**
     * Set monto
     *
     * @param string $monto
     *
     * @return Pedido
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }
    


    
    
    
    

    
    
    
}

