<? require_once("\db\db.php")

class Usuario{
    public $nombre;
    public $apellido;
    public $correo;
    public $cedula;
    public $contra;
    public $val_contra;
    public $num_contact;
    public $facultad;

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of cedula
     */ 
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set the value of cedula
     *
     * @return  self
     */ 
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get the value of contra
     */ 
    public function getContra()
    {
        return $this->contra;
    }

    /**
     * Set the value of contra
     *
     * @return  self
     */ 
    public function setContra($contra)
    {
        $this->contra = $contra;

        return $this;
    }

   

    /**
     * Get the value of facultad
     */ 
    public function getFacultad()
    {
        return $this->facultad;
    }

    /**
     * Set the value of facultad
     *
     * @return  self
     */ 
    public function setFacultad($facultad)
    {
        $this->facultad = $facultad;

        return $this;
    }

    /**
     * Get the value of val_contra
     */ 
    public function getVal_contra()
    {
        return $this->val_contra;
    }

    /**
     * Set the value of val_contra
     *
     * @return  self
     */ 
    public function setVal_contra($val_contra)
    {
        $this->val_contra = $val_contra;

        return $this;
    }

    /**
     * Get the value of num_contact
     */ 
    public function getNum_contact()
    {
        return $this->num_contact;
    }

    /**
     * Set the value of num_contact
     *
     * @return  self
     */ 
    public function setNum_contact($num_contact)
    {
        $this->num_contact = $num_contact;

        return $this;
    }

    public function usuario_registro(){

        
    }
}



?>